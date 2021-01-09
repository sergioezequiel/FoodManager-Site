<?php


namespace app\modules\api\controllers;


use common\models\User;
use yii\rest\ActiveController;

class UserController extends ActiveController
{
    public $modelClass = 'common\models\User';

    public function actionLogin() {
        $user = User::findByEmail(\Yii::$app->request->post('email'));

        if($user != null) {
            if($user->validatePassword(\Yii::$app->request->post('password'))) {
                return ['success' => true, 'nome' => $user->username, 'email' => $user->email, 'key' => $user->getAuthKey()];
            }
            else {
                \Yii::$app->response->statusCode = 403;
                return ['success' => false];
            }
        }
        else {
            \Yii::$app->response->statusCode = 404;
            return ['success' => false];
        }
    }
}