<?php

namespace backend\controllers;

use common\models\RolesAssignment;
use common\models\SignupAdminForm;
use Yii;
use common\models\User;
use yii\data\ActiveDataProvider;
use yii\db\Expression;
use yii\helpers\Url;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\Response;
use yii\widgets\ActiveForm;

/**
 * UsermanageController implements the CRUD actions for User model.
 */
class UsermanageController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => \yii\filters\AccessControl::className(),
                'except' => ['error','verification'],
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['creatorPermission'],
                    ],
                    [
                        'allow' => false,
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all User models.
     * @return mixed
     */
    public function actionIndex()
    {
        Url::remember();
        $dataProvider = new ActiveDataProvider([
            'query' => User::find(),
        ]);
        $dataProvider->pagination = ['pageSize' => 100];
        $dataProvider->sort = ['defaultOrder'=> ['id' => SORT_DESC]];

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single User model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        Url::remember();
        $roleAssign = RolesAssignment::find()->where(['user_id'=>$id])->one()
            ? RolesAssignment::find()->where(['user_id'=>$id])->one() : new RolesAssignment;
        return $this->render('view', [
            'model' => $this->findModel($id),
            'roleAssign' => $roleAssign,
        ]);
    }

    /**
     * Creates a new User model.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new User();

        if ($model->load(Yii::$app->request->post()) ) {
            $model->password_hash = Yii::$app->security->generatePasswordHash($model->password);
            $model->status = 10;
            $model->status = 10;
            $model->created_at =  new Expression('CURRENT_TIMESTAMP()');
            $model->updated_at = time();


            if ($model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
            print_r($model->getErrors());

        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing User model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing User model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();
        $assigned = RolesAssignment::find()->where(['user_id'=>$id])->one();
        if ($assigned) {
            $assigned->delete();
        }

        return $this->redirect(['index']);
    }

    /**
     * Finds the User model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return User the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = User::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    /**
     * Updates an existing User model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionAssign($id)
    {
        $assigned = RolesAssignment::find()->where(['user_id'=>$id])->one();
        $request = Yii::$app->request->post('RolesAssignment');

        if ($assigned ) {
            $assigned['item_name'] = $request['item_name'];
            $assign = $assigned;
        } else {
            $assign = new RolesAssignment();
            $assign['item_name'] = $request['item_name'];
            $assign['user_id'] = $id;
        }

        if ($assign->save()){
//            Yii::$app->session->setFlash('success', "получилось");
            return $this->redirect(Url::previous());
        } else {
            Yii::$app->session->setFlash('error', "неполучается");
            return $this->redirect(Url::previous());
        }


    }
    public function actionSetPass($id)
    {
        $post = Yii::$app->request->post('User');
        $password = $post['password_hash'];
        $model = $this->findModel($id);
        $model->password_hash = Yii::$app->security->generatePasswordHash($password);

        if ($model->save()) {
            Yii::$app->session->setFlash('success', 'пароль пользователя '.$model->username.' изменен');
            return $this->redirect(Url::previous());
        }
    }

    public function actionInvite()
    {
        $form = Yii::$app->request->post('InviteForm');

        if (User::invite($form['email'],$form['role'])) {
            Yii::$app->session->setFlash('success', 'Инвайт успешно отправлен на адрес '.$form['email']);
        } else {
            Yii::$app->session->setFlash('error', 'что-то пошло не так');
        };

        return $this->redirect(Url::previous());

    }

    public function actionVerification($token)
    {
        $this->layout = 'verification';

        $formModel = new SignupAdminForm();

        $user = User::findByPasswordResetToken($token);


         if  ($formModel->load(Yii::$app->request->post()) && $formModel->validate()) {
            $result = $formModel->signupAdmin($user->id);
            if ( $result ) {
                return $this->render('signup-thanx',[
                    'model' => $user,
                ]);
            } else {
                var_dump($result);
            }


        } else {
            return $this->render('verify-and-signup', [
                'model' => $user,
                'formModel' => $formModel
            ]);
        }


//        var_dump('пилим '.$user->id);

//        return $this->render('verify-and-signup', [
//            'model' => $user,
//        ]);

    }


}
