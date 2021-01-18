<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap4\ActiveForm */

/* @var $model \common\models\LoginForm */

use yii\bootstrap4\ActiveForm;
use yii\bootstrap4\Html;

$this->title = 'Login';
$assets = \backend\assets\ImgAsset::register($this);
?>
<main class="page login-page">
    <section class="clean-block clean-form dark">
        <div class="container" style="background-color: rgba(0,0,0,0.7); padding: 15px; border-radius: 15px; color: #fff;   ">
            <div class="site-login" >

                <h1><?= Html::encode($this->title) ?></h1>

                <p>Please fill out the following fields to login:</p>

                <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>
                <div class="form-group">
                    <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>
                </div>
                <div class="form-group">
                    <?= $form->field($model, 'password')->passwordInput() ?>
                </div>
                <div class="form-group">
                    <?= $form->field($model, 'rememberMe')->checkbox() ?>
                </div>
                <div class="form-group">
                    <?= Html::submitButton('Login', ['class' => 'btn btn-primary btn-block', 'name' => 'login-button']) ?>
                </div>

                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </section>
</main>
