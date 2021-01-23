<?php

use app\models\Produto;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\CodigoBarras */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="codigo-barras-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'codigobarras')->textInput()->label('Código Barras') ?>

    <?= $form->field($model, 'nome')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'marca')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'quantidade')->textInput() ?>

    <?= $form->field($model, 'idproduto')
        ->dropDownList(ArrayHelper::map(Produto::find()->asArray()->all(), 'idproduto', 'nome'),
            ['prompt' => ' -- Selecionar Produto --'])
        ->label('ID Produto') ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
