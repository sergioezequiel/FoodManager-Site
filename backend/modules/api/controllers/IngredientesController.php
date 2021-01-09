<?php


namespace app\modules\api\controllers;


use app\models\Ingrediente;
use common\models\User;
use Yii;
use yii\db\Query;
use yii\rest\ActiveController;

class IngredientesController extends ActiveController
{
    public $modelClass = Ingrediente::class;

    public function actionContainingredientes($apikey)
    {
        if(User::findIdentityByAccessToken($apikey) == null) {
            Yii::$app->response->statusCode = 401;
            return null;
        }
        $query = new Query();

        return $query->select('idreceita, count(*) as \'ingredientesuser\', (select count(*) from ingredientes where idreceita = i.idreceita) as \'ingredientesreceita\'')
            ->from('ingredientes i, itensdespensa')
            ->andWhere('i.idproduto = itensdespensa.idproduto')
            ->andWhere(['itensdespensa.idutilizador' => User::findIdentityByAccessToken($apikey)->getId()])
            ->andWhere('itensdespensa.quantidade >= i.quantnecessaria')
            ->groupBy('idreceita')
            ->all();
    }

    public function actionReceitadispo($apikey)
    {
        if(User::findIdentityByAccessToken($apikey) == null) {
            Yii::$app->response->statusCode = 401;
            return null;
        }
        $query = new Query();

        return $query->select('idreceita, count(*) as \'ingredientesuser\', (select count(*) from ingredientes where idreceita = i.idreceita) as \'ingredientesreceita\'')
        ->from('ingredientes i, itensdespensa')
        ->andWhere('i.idproduto = itensdespensa.idproduto')
        ->andWhere(['itensdespensa.idutilizador' => User::findIdentityByAccessToken($apikey)->getId()])
        ->andWhere('itensdespensa.quantidade >= i.quantnecessaria')
        ->groupBy('idreceita')
        ->having('ingredientesuser = ingredientesreceita')
        ->all();
    }

    public function actionIngredientesemfalta($apikey, $receita)
    {
        if(User::findIdentityByAccessToken($apikey) == null) {
            Yii::$app->response->statusCode = 401;
            return null;
        }
        $query = new Query();

        return $query->select('ingredientes.nome')
        ->from('ingredientes')
        ->andWhere(['ingredientes.idreceita' => $receita])
        ->andWhere(['not in','ingredientes.idproduto', (new Query())->select('idproduto')->from('itensdespensa')->andWhere(['idutilizador' => User::findIdentityByAccessToken($apikey)->getId()])])
        ->all();
    }
}