<?php

use app\models\User;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Feedback */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="feedback-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nome')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'subjet')->textInput(['maxlength' => true])->label('Assunto') ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'texto')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'tipo')->dropDownList(['Sugestão de Receita', 'Melhoria na App', 'Sugestões', 'Produto em falta (código de barras)', 'Feedback Geral', 'Outro'], ['className' => 'form-control','prompt' => ' -- Selecionar Tipo --']) ?>

    <?= $form->field($model, 'idutilizador')
        ->dropDownList(ArrayHelper::map(User::find()->asArray()->all(), 'id', 'username'),
            ['prompt' => ' -- Selecionar Utilizador --'])
        ->label('ID Utilizador') ?>

    <?= $form->field($model, 'estado')->dropDownList(['0' =>'Não respondido', '1' =>'Respondido']) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
