<?php


namespace app\modules\api\controllers;


use app\models\Receita;
use common\models\User;
use Yii;
use yii\rest\ActiveController;

class ReceitasController extends ActiveController
{
    public $modelClass = Receita::class;
}