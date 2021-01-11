<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ItemDespensa */

$this->title = 'Create Item Despensa';
$this->params['breadcrumbs'][] = ['label' => 'Item Despensas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="item-despensa-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
