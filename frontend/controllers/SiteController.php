<?php
namespace frontend\controllers;

use frontend\models\ResendVerificationEmailForm;
use frontend\models\VerifyEmailForm;
use Yii;
use yii\base\InvalidArgumentException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;

/**
 * Site controller
 */
class SiteController extends Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionAboutus() {
        return $this->render('aboutus');
    }

    public function actionFaq() {
        return $this->render('faq');
    }

    public function actionContactus() {
        return $this->render('contactus');
    }

    public function actionLogin() {
        return $this->render('login');
    }
}
