<?php


namespace app\modules\api\controllers;


use app\models\Receita;
use common\models\User;
use Yii;
use yii\rest\ActiveController;

class ReceitasController extends ActiveController
{
    public $modelClass = Receita::class;

    public function actionCount($apikey) {
        if(User::findIdentityByAccessToken($apikey) == null) {
            Yii::$app->response->statusCode = 401;
            return null;
        }

        return ['contagem' => Receita::find()->andWhere(['idutilizador' => User::findIdentityByAccessToken($apikey)->getId()])->count()];
    }
}