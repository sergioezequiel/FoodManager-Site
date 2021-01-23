<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$assets = \frontend\assets\FoodmanAsset::register($this);
$this->title = 'FoodManager';
?>
<main class="page faq-page">
    <section class="clean-block clean-faq dark" style="padding-top: 50px; padding-bottom: 50px;">
        <div class="container">
            <div class="block-heading">
                <h2 class="text-info">404</h2>
                <p>UPS! Não encontramos a página desejada. Porfavor tente mais tarde.</p>
            </div>
            <div class="alert alert-danger">
                <?= nl2br(Html::encode($message)) ?>
            </div>
            <p>
                The above error occurred while the Web server was processing your request.
            </p>
            <p>
                Please contact us if you think this is a server error. Thank you.
            </p>
        </div>
    </section>
</main>
