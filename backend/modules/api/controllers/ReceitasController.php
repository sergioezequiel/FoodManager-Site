<?php


namespace app\modules\api\controllers;


use app\models\Receita;
use yii\rest\ActiveController;

class ReceitasController extends ActiveController
{
    public $modelClass = Receita::class;

    public function actionVerificar($apikey) {

    }
}