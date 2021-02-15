<?php

namespace frontend\controllers;

use app\models\FeedbackForm;
use app\models\Ingrediente;
use app\models\Itensdespensa;
use app\models\Receita;
use common\models\LoginForm;
use common\models\User;
use frontend\models\ContactForm;
use frontend\models\ResendVerificationEmailForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\VerifyEmailForm;
use Symfony\Component\Console\Helper\Dumper;
use Yii;
use yii\db\Query;
use yii\debug\models\search\Debug;
use yii\debug\panels\DumpPanel;
use yii\helpers\VarDumper;
use yii\web\Controller;

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
        Yii::$app->assetManager->forceCopy = true;
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
        $model = new FeedbackForm();

        if ($model->load(Yii::$app->request->post()) && $model->submit()) {
            if ($model->validate()) {
                Yii::$app->session->setFlash('success', 'Thank you for your feedback.');
                return $this->goHome();
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

    public function actionPesquisa($search)
    {
        /*Yii::$app->assetManager->forceCopy = true;*/

        $receitas = Receita::find()->where(['like', 'nome', '%' . $search . '%', false])->all();

        return $this->render('receita', ['receitas' => $receitas]);
    }

    public function actionItemdespensa()
    {
        $despensa = Itensdespensa::find()->andWhere(['idutilizador' => Yii::$app->user->id])->all();
        return $this->render('itemdespensa', ['despensa' => $despensa]);
    }

    public function actionIngredientes($receita)
    {
        $querydisp = (new Query())->select('i.idingrediente, i.nome, CONCAT(i.quantnecessaria, space(1), `p`.`unidade`) as quantstring, i.quantnecessaria, i.tipopreparacao, i.idproduto, i.idreceita')
            ->from('ingredientes i')
            ->innerJoin('produtos p', 'i.idproduto = p.idproduto')
            ->andWhere(['i.idreceita' => $receita])
            ->andWhere(['in', 'i.idproduto', (new Query())->select('idproduto')->from('itensdespensa')->andWhere(['idutilizador' => Yii::$app->user->id])])
            ->all();

        $queryindisp= (new Query())->select('i.idingrediente, i.nome, CONCAT(i.quantnecessaria, space(1), `p`.`unidade`) as quantstring, i.quantnecessaria, i.tipopreparacao, i.idproduto, i.idreceita')
            ->from('ingredientes i')
            ->innerJoin('produtos p', 'i.idproduto = p.idproduto')
            ->andWhere(['i.idreceita' => $receita])
            ->andWhere(['not in', 'i.idproduto', (new Query())->select('idproduto')->from('itensdespensa')->andWhere(['idutilizador' => Yii::$app->user->id])])
            ->all();

        return $this->render('ingredientes', [
            'ingredientesdisp' => $querydisp,
            'ingredientesindisp' => $queryindisp,
            'ingredientes' => Ingrediente::find()->andWhere(['idreceita' => $receita])->all(),
            'receita' => Receita::find()->andWhere(['idreceita' => $receita])->one(),
        ]);
    }


    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }
}

