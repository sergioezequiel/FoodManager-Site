<?php


namespace app\modules\api\controllers;


use app\models\Feedback;
use common\models\User;
use Yii;
use yii\rest\ActiveController;

class FeedbackController extends ActiveController
{
    public $modelClass = Feedback::class;

    public function actionUtilizador($apikey) {
        if(User::findIdentityByAccessToken($apikey) == null) {
            Yii::$app->response->statusCode = 401;
            return null;
        }

        return Feedback::find()->andWhere(['idutilizador' => User::findIdentityByAccessToken($apikey)->getId()]);
    }

    public function actionTipos($apikey) {
        if(User::findIdentityByAccessToken($apikey) == null) {
            Yii::$app->response->statusCode = 401;
            return null;
        }

        return Feedback::find()->select('tipo, count(*)')->andWhere(['idutilizador' => User::findIdentityByAccessToken($apikey)->getId()])->groupBy('tipo');
    }

    public function actionTiposglobais() {
        return Feedback::find()->select('tipo, count(*)')->groupBy('tipo');
    }
}