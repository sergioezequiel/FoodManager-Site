<?php
namespace backend\controllers;

use app\models\LoginFormBackend;
use app\models\Receita;
use Yii;
use yii\db\Query;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['login', 'error'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['logout', 'index'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['get'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    public function beforeAction($action)
    {
        // Para mostrar com o layout vazio caso o utilizador não tiver o login feito, porque se não mostrava o layout do backoffice
        if ($action->id == 'error' && Yii::$app->user->isGuest) {
            $this->layout = 'blank';
            return parent::beforeAction($action);
        }

        if(!Yii::$app->user->isGuest) {
            $user = \common\models\User::find()->where(['id' => Yii::$app->user->getId()])->one();
            $this->view->params['username'] = $user->username;
        }

        return parent::beforeAction($action);
    }


    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $numReceitas = (new Query())->select('count(*) as contagem')->from('receitas')->one();
        $numProdutos = (new Query())->select('count(*) as contagem')->from('produtos')->one();
        $numUsers = (new Query())->select('count(*) as contagem')->from('user')->one();
        $numFeedback = (new Query())->select('count(*) as contagem')->from('feedback')->one();

        return $this->render('index', ['numreceitas' => $numReceitas['contagem'], 'numprodutos' => $numProdutos['contagem'], 'numusers' => $numUsers['contagem'], 'numfeedback' => $numFeedback['contagem']]);
    }

    /**
     * Login action.
     *
     * @return string
     */
   public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $this->layout = 'blank';

        $model = new LoginFormBackend();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            $model->password = '';

            return $this->render('login', [
                'model' => $model,
            ]);
        }
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
}
