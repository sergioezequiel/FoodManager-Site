<?php


namespace app\modules\api\controllers;


use app\models\ItemDespensa;
use app\models\Produto;
use common\models\User;
use yii\db\Query;

class ProdutosController extends \yii\rest\ActiveController
{
    public $modelClass = 'app\models\Produto';

    public function actionPelacategoria($categoria) {
        $query = new Query();

        $query->select('p.idproduto, p.nome as nomeproduto, p.unidade, p.imagem, c.nome as nomecategoria, c.idcategoria')
            ->from('produtos p')
            ->innerJoin('categorias c', 'p.idcategoria = c.idcategoria')
            ->having(['like', 'c.nome', $categoria]);

        if(!empty($query->all())) {
            return $query->all();
        }
        else {
            \Yii::$app->response->statusCode = 404;
            return false;
        }
    }
}