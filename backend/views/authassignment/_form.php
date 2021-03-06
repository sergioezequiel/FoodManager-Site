<?php

use app\models\AuthItem;
use app\models\User;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\AuthAssignment */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="auth-assignment-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'item_name')->dropDownList(['admin'=>'Admin', 'moderador'=> 'Moderador', 'gestor'=> 'Gestor', 'editor'=> 'Editor', 'user'=> 'User'], ['className' => 'form-control','prompt' => ' -- Selecionar Estado --']) ?>

    <?= $form->field($model, 'user_id')
        ->dropDownList(ArrayHelper::map(User::find()->asArray()->all(), 'id', 'username'),
            ['prompt' => ' -- Selecionar Utilizador --'])
        ->label('ID Utilizador') ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
