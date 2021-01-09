<?php


namespace app\modules\api\controllers;

use app\models\ItemDespensa;
use common\models\User;
use Yii;
use yii\db\Exception;
use yii\db\Query;

class ItensdespensaController extends \yii\rest\ActiveController
{
    public $modelClass = 'app\models\ItemDespensa';

    public function actionDespensa($apikey) {
        if(User::findIdentityByAccessToken($apikey) == null) {
            Yii::$app->response->statusCode = 401;
            return null;
        }

        $query = new Query();

        return $query
            ->select('i.iditemdespensa, i.nome, i.quantidade, i.validade, p.imagem, p.unidade')
            ->from('itensdespensa i')
            ->innerJoin('produtos p', 'i.idproduto = p.idproduto')
            ->andWhere(['idutilizador' => User::findIdentityByAccessToken($apikey)->getId()])
            ->all();
    }

    public function actionAdicionaritem() {
        if(User::findIdentityByAccessToken(Yii::$app->request->post('apikey')) == null) {
            Yii::$app->response->statusCode = 401;
            return null;
        }

        $item = new ItemDespensa();

        $item->nome = Yii::$app->request->post('nome');
        $item->quantidade = Yii::$app->request->post('quantidade');
        $item->validade = Yii::$app->request->post('validade');
        $item->idproduto = Yii::$app->request->post('idproduto');
        $item->idutilizador = User::findIdentityByAccessToken(Yii::$app->request->post('apikey'))->getId();

        if($item->validate()) {
            $item->save();
            return $item;
        }
        else {
            Yii::$app->response->statusCode = 422;
        }

        return null;
    }

    public function actionCount($apikey) {
        if(User::findIdentityByAccessToken($apikey) == null) {
            Yii::$app->response->statusCode = 401;
            return null;
        }

        return ItemDespensa::find()->andWhere(['idutilizador' => User::findIdentityByAccessToken($apikey)->getId()])->count();
    }
}