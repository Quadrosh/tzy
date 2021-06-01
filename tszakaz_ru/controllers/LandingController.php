<?php

namespace tszakaz_ru\controllers;

use common\models\ChatItem;
use common\models\ChatMessage;
use common\models\LandingListitem;
use common\models\LandingPage;
use common\models\LandingSection;
use common\models\Preorders;
use common\models\Visit;
use Yii;
use yii\base\Exception;
use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use yii\web\Controller;


class LandingController extends Controller
{
    public $defaultAction = 'page';
    public $landingPage;




    /**
     * @inheritdoc
     */
    public function actions()
    {
        return
            [
                'error' => [
                    'class' => 'yii\web\ErrorAction',
                    'view' => '@app/views/site/custom_error.php',
                ],
                'rateLimiter' => [
                    'class' => \yii\filters\RateLimiter::className(),
                ],

        ];
    }


    /**
     * Displays page.
     *
     */
    public function actionPage()
    {
        Url::remember();

        $PageName = Yii::$app->request->get('landingpage');

        $utm = $this->getUtm();
        $session = Yii::$app->session;
//        $session->destroy();
//


        $this->landingPage = LandingPage::find()
            ->where(['site'=>Yii::$app->params['site']])
            ->andwhere(['hrurl'=>$PageName])
            ->one();
        if ($PageName == null OR $this->landingPage == null)  {
            throw new \yii\web\NotFoundHttpException('Страница не существует');
        }
        if ($this->landingPage->layout == null) {
            $this->layout = 'landing';
        } else {
            $this->layout = $this->landingPage->layout;
        }
        if (trim(strtolower($this->landingPage['seo_logo'])) =='title') {
            $this->landingPage['seo_logo'] = $this->landingPage['title'];
        }
        $this->view->params['meta']=$this->landingPage;


        //секции
        $sections = [];
        if ($this->landingPage->id < 6) { //
            $allSections = LandingSection::find()
                ->where([LandingSection::tableName().'.page_id'=>$this->landingPage->id])
                ->orderBy('order_num')
                ->asArray()
                ->indexBy('section_type')
                ->all();

            $sections['top'] = $allSections['top'];
            $sections['action'] = $allSections['action_permanent'];
            $sections['services'] = $allSections['services'];
            $sections['call2action'] = $allSections['call2action'];
            $sections['whyWe'] = $allSections['why_we'];
            $sections['howWeWork'] = $allSections['how_we_work'];
            $sections['numbers'] = $allSections['numbers'];
            $sections['projects'] = $allSections['projects'];
            $sections['reviews'] = $allSections['reviews'];
            $sections['clients'] = $allSections['clients'];
            $sections['order'] = $allSections['order_form'];
            isset($allSections['map']) ? $sections['map'] = $allSections['map'] : null;

            // list items
            $sections['topListItems']=LandingListitem::find()
                ->where(['section_id'=>$sections['top']['id']])
                ->orderBy('order_num')
                ->all();
            $sections['servicesListItems']=LandingListitem::find()
                ->where(['section_id'=>$sections['services']['id']])
                ->orderBy('order_num')
                ->all();
            $sections['whyWeListItems']=LandingListitem::find()
                ->where(['section_id'=>$sections['whyWe']['id']])
                ->orderBy('order_num')
                ->all();
            $sections['howWeWorkListItems']=LandingListitem::find()
                ->where(['section_id'=>$sections['howWeWork']['id']])
                ->orderBy('order_num')
                ->all();
            $sections['numbersListItems']=LandingListitem::find()
                ->where(['section_id'=>$sections['numbers']['id']])
                ->orderBy('order_num')
                ->all();
            $sections['projectsListItems']=LandingListitem::find()
                ->where(['section_id'=>$sections['projects']['id']])
                ->orderBy('order_num')
                ->all();
            $sections['reviewsListItems']=LandingListitem::find()
                ->where(['section_id'=>$sections['reviews']['id']])
                ->orderBy('order_num')
                ->all();
            $sections['clientsListItems']=LandingListitem::find()
                ->where(['section_id'=>$sections['clients']['id']])
                ->orderBy('order_num')
                ->all();
        } else {
            $allSections = LandingSection::find()
                ->where([LandingSection::tableName().'.page_id'=>$this->landingPage->id])
                ->orderBy('order_num')
//            ->asArray()
                ->indexBy('section_type')
                ->all();

            foreach ($allSections as $allSectionItem) {

                $allSection = $allSectionItem->toArray();
                $allSection['list_items'] = $allSectionItem->listItems;


                if ($allSection['section_type']=='top') {
                    $sections['top'] = $allSection;
                }

                elseif ($allSection['section_type']=='garage'){
                    $sections['garage'] = $allSection;
                }
                elseif ($allSection['section_type']=='action_permanent'){
                    $sections['action'] = $allSection;
                }
                elseif ($allSection['section_type']=='services'){
                    $sections['services'] = $allSection;
                }
                elseif ($allSection['section_type']=='call2action'){
                    $sections['call2action'] = $allSection;
                }
                elseif ($allSection['section_type']=='why_we'){
                    $sections['whyWe'] = $allSection;
                }
                elseif ($allSection['section_type']=='how_we_work'){
                    $sections['howWeWork'] = $allSection;
                }
                elseif ($allSection['section_type']=='numbers'){
                    $sections['numbers'] = $allSection;
                }
                elseif ($allSection['section_type']=='projects'){
                    $sections['projects'] = $allSection;
                }
                elseif ($allSection['section_type']=='reviews'){
                    $sections['reviews'] = $allSection;
                }
                elseif ($allSection['section_type']=='clients'){
                    $sections['clients'] = $allSection;
                }
                elseif ($allSection['section_type']=='order_form'){
                    $sections['order'] = $allSection;
                }
                elseif ($allSection['section_type']=='map'){
                    $sections['map'] = $allSection;
                }

            }
        }


        $preorderForm = new Preorders();



        //  chat
        if (!isset(Yii::$app->request->cookies['userCookiesId'])) {
            $userId = Yii::$app->request->csrfToken;
            Yii::$app->response->cookies->add(new \yii\web\Cookie([
                'name' => 'userCookiesId',
                'value' => $userId,
            ]));
        } else {
            $userId = Yii::$app->request->cookies['userCookiesId'];
        }
        $chat = ChatItem::find()->where(['user_id'=>$userId])->one();
        if ($chat == null) {
            $chat = new ChatItem;
            $chat['user_id'] = $userId;
        }
        $this->view->params['chat'] = $chat;
        // !chat

        Yii::error(['sections'=>$sections]);


//        Yii::$app->session->setFlash('success', "Your message to display");


        return $this->render($this->landingPage->view,[
            'page' => $this->landingPage,
            'sections' => $sections,
            'preorderForm' => $preorderForm,
            'utm' => $utm,
        ]);
    }





    public function getUtm()
    {
        return Visit::setVisitAndGetUtm();
    }

}
