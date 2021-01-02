<?php


namespace app\modules\api\controllers;

use app\models\ItemDespensa;
use common\models\User;
use Yii;
use yii\db\Query;

class ItensdespensaController extends \yii\rest\ActiveController
{
    public $modelClass = 'app\models\ItemDespensa';

    public function actionDespensa($apikey) {
        $query = new Query();

        return $query
            ->select('i.iditemdespensa, i.nome, i.quantidade, i.validade, p.imagem, p.unidade')
            ->from('itensdespensa i')
            ->innerJoin('produtos p', 'i.idproduto = p.idproduto')
            ->andWhere(['idutilizador' => User::findIdentityByAccessToken($apikey)])
            ->all();
    }

    public function actionAdicionaritem() {
        $item = new ItemDespensa();

        $item->nome = Yii::$app->request->post('nome');
        $item->quantidade = Yii::$app->request->post('quantidade');
        $item->validade = Yii::$app->request->post('validade');
        $item->idproduto = Yii::$app->request->post('idproduto');
        $item->idutilizador = User::findIdentityByAccessToken(Yii::$app->request->post('apikey'));

        if($item->validate()) {
            $item->save();
        }
        else {
            Yii::$app->response->statusCode = 404;
        }
    }
}