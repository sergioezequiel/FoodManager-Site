<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */

/* @var $model \frontend\models\SignupForm */

use yii\bootstrap4\ActiveForm;
use yii\bootstrap4\Html;
use yii\helpers\Url;

$assets = \frontend\assets\FoodmanAsset::register($this);
$this->title = 'Signup';

//$this->params['breadcrumbs'][] = $this->title;
?>
<main class="page login-page">
    <section class="clean-block clean-form dark">
        <div class="container">
            <div class="block-heading">
                <h2 class="text-info"><?= Html::encode($this->title) ?></h2>
                <p>Preencha os campos abaixo para se registar.</p>
            </div>

            <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>
            <div class="form-group">
                <?= $form->field($model, 'username')->textInput(['id' => 'username', 'autofocus' => true, 'className' => 'form-control']) ?>
            </div>
            <div class="form-group">
                <?= $form->field($model, 'email')->input('email', ['id' => 'email', 'className' => 'form-control']) ?>
            </div>
            <div class="form-group">
                <?= $form->field($model, 'password')->passwordInput(['id' => 'password', 'className' => 'form-control']) ?>
            </div>
            <div class="form-group">
                <?= Html::submitButton('Signup', ['class' => 'btn btn-primary btn-block', 'name' => 'signup-button']) ?>
                <a class="btn btn-primary btn-block" href="<?= Url::toRoute('site/login'); ?>">Login</a>
            </div>
            <?php ActiveForm::end(); ?>
        </div>
    </section>
</main>
