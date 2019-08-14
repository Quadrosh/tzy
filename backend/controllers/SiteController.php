<?php

namespace backend\controllers;

use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;
use Yii;
use common\models\LoginForm;
use yii\helpers\Url;



use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use common\models\PasswordResetRequestForm;
use common\models\ResetPasswordForm;




/**
 * Default controller for the `admin`
 */
class SiteController extends AdminController
{
    public $layout = 'login';

    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        Url::remember();
        if (Yii::$app->user->can('adminPermission', [])) {
            $this->layout = 'main';
        }
        elseif (Yii::$app->user->can('statPermission', [])) {
            $this->layout = 'stat';
        }

        return $this->render('index');
    }
    /**
     * Login action.
     *
     * @return string
     */
    public function actionLogin()
    {
        $this->layout = 'login';
        Url::remember();
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {

            if (Yii::$app->user->can('adminPermission', [])) {
                return $this->redirect('/preorders/lead-quality');
            }
            elseif (Yii::$app->user->can('statPermission', [])) {
                return $this->redirect('/preorders/lead-quality');
            }
            else {
                return $this->redirect('/');
            }

        }
        return $this->render('login', [
            'model' => $model,
        ]);
    }
    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }


    /**
     * Requests password reset.
     *
     * @return mixed
     */
    public function actionRequestPasswordReset()
    {
        $this->layout = 'login';
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Ссылка на восстановление пароля выслана. Проверьте email.');

                return $this->render('unlogged');

            } else {
                Yii::$app->session->setFlash('error', 'Извините, мы не можем выслать ссылку на указанный адрес. Обратитесь к администратору.');
            }
        }

        return $this->render('requestPasswordResetToken', [
            'model' => $model,
        ]);
    }

    /**
     * Resets password.
     *
     * @param string $token
     * @return mixed
     * @throws BadRequestHttpException
     */
    public function actionResetPassword($token)
    {
        $this->layout = 'login';
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidParamException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->session->setFlash('success', 'Пароль изменен, можете войти используя новый пароль.');

            return $this->render('unlogged');
        }

        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }
}
