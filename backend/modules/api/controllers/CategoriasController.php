<?php

namespace app\modules\api\controllers;

use yii\rest\ActiveController;
use yii\web\Controller;

/**
 * Default controller for the `api` module
 */
class CategoriasController extends ActiveController
{
    public $modelClass = 'app\models\Categoria';

    /**
     * Renders the index view for the module
     * @return string
     */
    /*public function actionIndex()
    {
        return $this->render('index');
    }*/
}
