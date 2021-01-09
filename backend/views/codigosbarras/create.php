<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\CodigoBarras */

$this->title = 'Create Codigo Barras';
$this->params['breadcrumbs'][] = ['label' => 'Codigo Barras', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="codigo-barras-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
