<?php

namespace perevozki_negabarit_su\controllers;

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
        if (!$PageName) {
            $PageName = 'perevozki-negabarit';
        }
        $utm = [];
        $session = Yii::$app->session;
//        $session->destroy();

        if (Yii::$app->request->get('utm_source')) {
            // UTM из GET
            $utm['source'] = Yii::$app->request->get('utm_source');
            $utm['medium'] = Yii::$app->request->get('utm_medium');
            $utm['campaign'] = Yii::$app->request->get('utm_campaign');
            $utm['term'] = Yii::$app->request->get('utm_term');
            $utm['content'] = Yii::$app->request->get('utm_content');

            // сохранение в сессию
            if (Yii::$app->request->get('utm_source')!= null) {
                $session['utm_source'] = $utm['source'];
                $session['utm_medium'] = $utm['medium'];
                $session['utm_campaign'] = $utm['campaign'];
                $session['utm_term'] = $utm['term'];
                $session['utm_content'] = $utm['content'];
            }
        } else {
            if ($session['utm_source']) {
                $utm['source'] = $session['utm_source'];
                $utm['medium'] = $session['utm_medium'];
                $utm['campaign'] = $session['utm_campaign'];
                $utm['term'] = $session['utm_term'];
                $utm['content'] = $session['utm_content'];
            } else { // если там что то есть
                $utm['source'] = Yii::$app->request->get('utm_source');
                $utm['medium'] = Yii::$app->request->get('utm_medium');
                $utm['campaign'] = Yii::$app->request->get('utm_campaign');
                $utm['term'] = Yii::$app->request->get('utm_term');
                $utm['content'] = Yii::$app->request->get('utm_content');
            }
        }

//        var_dump($utm);

        //сохр визита в статистику
        $visit = new Visit();
        $visit['ip'] = Yii::$app->request->userIP;
        $visit['site'] = Yii::$app->params['site'];
        $visit['lp_hrurl'] = $PageName;
        $visit['url'] = 'http://'.$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];
        $visit['utm_source']=$utm['source'];
        $visit['utm_medium']=$utm['medium'];
        $visit['utm_campaign']=$utm['campaign'];
        $visit['utm_term']=$utm['term'];
        $visit['utm_content']=$utm['content'];
        $visit['qnt']=1;
        $visit->save();



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
        $allSections = LandingSection::find()
            ->where(['page_id'=>$this->landingPage->id])
            ->orderBy('order_num')
            ->all();
        $sections = [];

        foreach ($allSections as $allSectionItem) {
            $allSection = $allSectionItem->toArray();
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
            elseif ($allSection['section_type']=='what_we_do'){
                $sections['whatWeDo'] = $allSection;
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



//        Yii::$app->session->setFlash('success', "Your message to display");


        return $this->render($this->landingPage->view,[
            'page' => $this->landingPage,
            'sections' => $sections,
            'preorderForm' => $preorderForm,
            'utm' => $utm,
        ]);
    }






}
