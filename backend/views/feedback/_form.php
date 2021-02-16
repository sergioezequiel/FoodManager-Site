<?php

use app\models\FeedbackCategoria;
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

    <?= $form->field($model, 'tipo')
        ->dropDownList(ArrayHelper::map(FeedbackCategoria::find()->asArray()->all(), 'id', 'categoria'),
            ['prompt' => '-- Selecionar Tipo --'])
        ->label('Tipo') ?>

    <?= $form->field($model, 'idutilizador')
        ->dropDownList(ArrayHelper::map(User::find()->asArray()->all(), 'id', 'username'),
            ['prompt' => ' -- Selecionar Utilizador --'])
        ->label('ID Utilizador') ?>

    <?= $form->field($model, 'respond')->dropDownList(['0'=>'Nao Respondido', '1'=> 'Respondido'], ['className' => 'form-control','prompt' => ' -- Selecionar Estado --']) ?>


    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
