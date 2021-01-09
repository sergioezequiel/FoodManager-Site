<?php


namespace app\modules\api\controllers;


use app\models\ItemDespensa;
use common\models\User;

class ProdutoController extends \yii\rest\ActiveController
{
    public $modelClass = 'app\models\Produto';
}