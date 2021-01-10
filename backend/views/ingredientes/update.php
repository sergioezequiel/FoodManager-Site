<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Ingrediente */

$this->title = 'Update Ingrediente: ' . $model->idingrediente;
$this->params['breadcrumbs'][] = ['label' => 'Ingredientes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idingrediente, 'url' => ['view', 'id' => $model->idingrediente]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="ingrediente-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
