<?php

use app\models\Produto;
use app\models\User;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ItemDespensa */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="item-despensa-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nome')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'quantidade')->textInput() ?>

    <?= $form->field($model, 'validade')->textInput() ?>

    <?= $form->field($model, 'idproduto')
        ->dropDownList(ArrayHelper::map(Produto::find()->asArray()->all(), 'idproduto', 'nome'),
            ['prompt' => ' -- Selecionar Produto --'])
        ->label('ID Produto') ?>

    <?= $form->field($model, 'idutilizador')
        ->dropDownList(ArrayHelper::map(User::find()->asArray()->all(), 'id', 'username'),
            ['prompt' => ' -- Selecionar Utilizador --'])
        ->label('ID Utilizador') ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
