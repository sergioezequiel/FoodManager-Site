<?php

use app\models\Categoria;
use yii\bootstrap4\ActiveForm;
use yii\bootstrap4\Html;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\Produto */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="produto-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="form-group">
        <?= $form->field($model, 'nome')->textInput(['maxlength' => true]) ?>
    </div>
    <?= $form->field($model, 'unidade')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'imagem')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'idcategoria')
        ->dropDownList(ArrayHelper::map(Categoria::find()->asArray()->all(), 'idcategoria', 'nome'),
            ['prompt' => ' -- Selecionar Categoria --'])
        ->label('ID Categoria') ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
