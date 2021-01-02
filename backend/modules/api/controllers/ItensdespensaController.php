<?php


namespace app\modules\api\controllers;


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
}