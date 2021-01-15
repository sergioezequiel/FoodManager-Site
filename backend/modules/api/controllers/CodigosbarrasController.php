<?php


namespace app\modules\api\controllers;


use yii\db\Query;

class CodigosbarrasController extends \yii\rest\ActiveController
{
    public $modelClass = 'app\models\CodigoBarras';

    public function actionCodigocomimagem($codigo) {
        $query = new Query();

        $query
            ->select('c.codigobarras, c.nome, c.marca, c.quantidade, c.idproduto, p.imagem')
            ->from('codigosbarras c')
            ->innerJoin('produtos p', 'c.idproduto = p.idproduto')
            ->andWhere(['c.codigobarras' => $codigo]);

        if($query->one() != false) {
            return $query->one();
        }
        else {
            \Yii::$app->response->statusCode = 404;
            return false;
        }
    }
}