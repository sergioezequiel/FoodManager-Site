<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\IngredienteSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ingrediente-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idingrediente') ?>

    <?= $form->field($model, 'nome') ?>

    <?= $form->field($model, 'quantnecessaria') ?>

    <?= $form->field($model, 'tipopreparacao') ?>

    <?= $form->field($model, 'idproduto') ?>

    <?php // echo $form->field($model, 'idreceita') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
