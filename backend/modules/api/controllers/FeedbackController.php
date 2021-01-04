<?php


namespace app\modules\api\controllers;


use app\models\Feedback;
use common\models\User;
use Yii;
use yii\db\Query;
use yii\rest\ActiveController;

class FeedbackController extends ActiveController
{
    public $modelClass = Feedback::class;

    public function actionUtilizador($apikey) {
        if(User::findIdentityByAccessToken($apikey) == null) {
            Yii::$app->response->statusCode = 401;
            return null;
        }

        return Feedback::find()->andWhere(['idutilizador' => User::findIdentityByAccessToken($apikey)->getId()])->all();
    }

    public function actionTipos($apikey) {
        if(User::findIdentityByAccessToken($apikey) == null) {
            Yii::$app->response->statusCode = 401;
            return null;
        }

        return (new Query())->select('tipo, count(*) as contagem')->from('feedback')->andWhere(['idutilizador' => User::findIdentityByAccessToken($apikey)->getId()])->groupBy('tipo')->all();
    }

    public function actionTiposglobais() {
        return (new Query())->select('tipo, count(*) as contagem')->from('feedback')->groupBy('tipo')->all();
    }
}