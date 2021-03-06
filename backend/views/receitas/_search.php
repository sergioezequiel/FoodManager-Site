<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ReceitaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="receita-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idreceita') ?>

    <?= $form->field($model, 'imagem') ?>

    <?= $form->field($model, 'nome') ?>

    <?= $form->field($model, 'duracaoreceita') ?>

    <?= $form->field($model, 'duracaopreparacao') ?>

    <?php // echo $form->field($model, 'passos') ?>

    <?php // echo $form->field($model, 'idutilizador') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
