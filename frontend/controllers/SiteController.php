<?php

namespace frontend\controllers;

use app\models\Feedback;
use app\models\Ingrediente;
use app\models\Itensdespensa;
use app\models\Receita;
use app\models\Receitas;
use frontend\models\ResendVerificationEmailForm;
use frontend\models\SignupForm;
use frontend\models\VerifyEmailForm;
use Yii;
use yii\base\InvalidArgumentException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use frontend\models\ResetPasswordForm;
use frontend\models\ContactForm;

/**
 * Site controller
 */
class SiteController extends Controller
{
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    public function actionIndex()
    {
        ///  Yii::$app->assetManager->forceCopy = true;
        return $this->render('index');
    }

    public function actionAboutus()
    {
        return $this->render('aboutus');
    }

    public function actionFaq()
    {
        return $this->render('faq');
    }

    public function actionContactus()
    {
        $model = new Feedback();

        if ($model->load(Yii::$app->request->post())) {
            if ($model->validate()) {
                // form inputs are valid, do something here
                return;
            }
        }

        return $this->render('contactus', [
            'model' => $model,
        ]);
    }

    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            $model->password = '';

            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    public function actionSignup()
    {
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post()) && $model->signup()) {
            Yii::$app->session->setFlash('success', 'Thank you for registration. Please check your inbox for verification email.');
            return $this->goHome();
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }

    public function actionReceita()
    {
        $receitas = Receita::find()->all();
        return $this->render('receita', ['receitas' => $receitas]);
    }

    public function actionItemdespensa()
    {
        $despensa = Itensdespensa::find()->andWhere(['idutilizador' => Yii::$app->user->id])->all();
        return $this->render('itemdespensa', ['despensa' => $despensa]);
    }

    public function actionIngredientes($receita)
    {
        {
            return $this->render('ingredientes', [
                'ingredientes' => Ingrediente::find()->andWhere(['idreceita' => $receita])->all(),
                'receita' => Receita::find()->andWhere(['idreceita' => $receita])->one(),
            ]);
        }
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }
}

