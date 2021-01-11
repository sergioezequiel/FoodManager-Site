<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Ingrediente */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ingrediente-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nome')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'quantnecessaria')->textInput()->label('Quantidade Necessária') ?>

    <?= $form->field($model, 'tipopreparacao')->textInput()->label('Tipo de Preparação') ?>

    <?= $form->field($model, 'idproduto')->textInput()->label('ID Produto') ?>

    <?= isset($receita) ? $form->field($model, 'idreceita')->textInput(['value' => $receita, 'readonly' => 'readonly'])->label('ID Receita') : $form->field($model, 'idreceita')->textInput()->label('ID Receita') ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
