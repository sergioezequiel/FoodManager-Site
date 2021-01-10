<?php

/* @var $this yii\web\View */

/* @var $model \app\models\User */

use frontend\assets\FoodmanAsset;
use yii\bootstrap4\ActiveForm;
use yii\bootstrap4\Html;

$assets = FoodmanAsset::register($this);
$this->title = 'FoodManager';
?>
<main class="page login-page">
    <section class="clean-block clean-form dark">
        <div class="container">
            <div class="block-heading">
                <h2 class="text-info">Log In</h2>
                <p>Faça o seu login:</p>
            </div>
            <?php $form = ActiveForm::begin(['id' => 'login']); ?>
            <div class="form-group">
                <?= $form->field($model, 'email')->input('email', ['id' => 'email', 'className' => 'form-control']) ?>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input class="form-control" type="password" id="password" name="password" required>
            </div>
            <div class="form-group">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="checkbox" name="remember">
                    <label class="form-check-label" for="checkbox">Remember me</label>
                </div>
            </div>
            <div class="form-group">
                <?= Html::submitButton('Log In', ['class' => 'btn btn-primary btn-block', 'name' => 'contact-button']) ?>
            </div>
            <?php ActiveForm::end(); ?>
        </div>
    </section>
</main>
