<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\helpers\Url;

$assets = \frontend\assets\FoodmanAsset::register($this);
$this->title = 'FoodManager';
?>
<main class="page login-page">
    <section class="clean-block clean-form dark">
        <div class="container">
            <div class="block-heading">
                <h2 class="text-info">Log In</h2>
                <p>Faça o seu login:</p>
            </div>
            <form action="<?= Url::toRoute('site/login') ?>" method="post">
                <input type="hidden" name="<?= Yii::$app->request->csrfParam; ?>" value="<?= Yii::$app->request->csrfToken; ?>" />
                <div class="form-group">
                    <label for="username">Username</label>
                    <input class="form-control item" type="text" name="LoginForm[username]" id="username" <?= isset($model) ? 'value='.Html::encode($model->username) : '' ?>>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input class="form-control" type="password" name="LoginForm[password]" id="password">
                </div>
                <div class="form-group">
                    <div class="form-check">
                        <label class="form-check-label" for="checkbox">Remember me</label>
                        <input class="form-check-input" type="checkbox" name="LoginForm[rememberMe]" id="checkbox">
                    </div>
                </div>
                <input class="btn btn-primary btn-block" type="submit" value="Log In"/>
                <a class="btn btn-primary btn-block" href="<?= Url::toRoute('site/signup'); ?>">Criar conta</a>
            </form>

        </div>
    </section>
</main>
