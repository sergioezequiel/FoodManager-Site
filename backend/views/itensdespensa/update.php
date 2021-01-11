<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ItemDespensa */

$this->title = 'Update Item Despensa: ' . $model->iditemdespensa;
$this->params['breadcrumbs'][] = ['label' => 'Item Despensas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->iditemdespensa, 'url' => ['view', 'id' => $model->iditemdespensa]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="item-despensa-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
