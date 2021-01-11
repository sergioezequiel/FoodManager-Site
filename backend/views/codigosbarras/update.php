<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\CodigoBarras */

$this->title = 'Editar Codigo Barras: ' . $model->codigobarras;
$this->params['breadcrumbs'][] = ['label' => 'Códigos Barras', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->codigobarras, 'url' => ['view', 'id' => $model->codigobarras]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="codigo-barras-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
