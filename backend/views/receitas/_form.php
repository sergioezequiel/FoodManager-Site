<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Receita */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="receita-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'imagem')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'nome')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'duracaoreceita')->textInput()->label('Duração da Receita') ?>

    <?= $form->field($model, 'duracaopreparacao')->textInput()->label('Duração da Preparação') ?>

    <?= $form->field($model, 'passos')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'idutilizador')->textInput()->label('ID Utilizador') ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
