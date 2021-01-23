<?php

/* @var $this yii\web\View */

/* @var $model \app\models\LoginForm */

use yii\bootstrap4\ActiveForm;
use yii\bootstrap4\Html;
use yii\helpers\Url;

$assets = \frontend\assets\FoodmanAsset::register($this);
$this->title = 'FoodManager';
?>
<main class="page login-page">
    <section class="clean-block clean-form dark" style="padding-top: 50px; padding-bottom: 50px;">
        <div class="container">
            <div class="block-heading">
                <h2 class="text-info">Log In</h2>
                <p>Faça o seu login:</p>
            </div>
            <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>
            <div class="form-group">
                <?= $form->field($model, 'username')->textInput(['id' => 'username', 'autofocus' => true, 'className' => 'form-control']) ?>
            </div>

            <div class="form-group">
                <?= $form->field($model, 'password')->passwordInput(['id' => 'password', 'className' => 'form-control']) ?>
            </div>
            <div class="form-group">
                <?= $form->field($model, 'rememberMe')->checkbox() ?>
            </div>
            <div class="form-group">
                <?= Html::submitButton('Log In', ['class' => 'btn btn-primary btn-block', 'name' => 'signup-button']) ?>
                <a class="btn btn-primary btn-block" href="<?= Url::toRoute('site/signup'); ?>">Criar conta</a>
            </div>
            <?php ActiveForm::end(); ?>
        </div>
    </section>
</main>
