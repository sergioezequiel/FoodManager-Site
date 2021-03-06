<?php

namespace backend\controllers;

use Yii;
use common\models\User;
use common\models\UserSearch;
use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;
use yii\rbac\Role;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * UserController implements the CRUD actions for User model.
 */
class UserController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],

                ],
            ],
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['index','delete','create','update','view', 'permissions'],
                        'allow' => true,
                        'roles' => ['admin', 'moderador'],
                    ],
                ],
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
     * Lists all User models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new UserSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single User model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Updates an existing User model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);

        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing User model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        $model->status = '0';
        $model->save();
        return $this->redirect(['index']);
    }

    public function actionPermissions($id, $permission) {
        $model = $this->findModel($id);

        $auth = Yii::$app->authManager;
        foreach ($auth->getRoles() as $role) {
            if($auth->checkAccess($id, $role->name)) {
                $auth->revoke($role, $id);
            }
        }

        switch ($permission) {
            case 0:
                $auth->assign($auth->getRole('admin'), $id);
                break;
            case 1:
                $auth->assign($auth->getRole('gestor'), $id);
                break;
            case 2:
                $auth->assign($auth->getRole('moderador'), $id);
                break;
            case 3:
                $auth->assign($auth->getRole('editor'), $id);
                break;
            case 4:
                $auth->assign($auth->getRole('user'), $id);
                break;
        }

        return $this->redirect('index');
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
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }


}
