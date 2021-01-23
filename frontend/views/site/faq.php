<?php

/* @var $this yii\web\View */

$assets = \frontend\assets\FoodmanAsset::register($this);
$this->title = 'FoodManager';
?>
<main class="page faq-page">
    <section class="clean-block clean-faq dark" style="padding-top: 50px; padding-bottom: 50px;">
        <div class="container">
            <div class="block-heading">
                <h2 class="text-info">FAQ</h2>
                <p>Tem alguma questão? Não tem a certeza se é o único com esse problema? Veja na lista seguinte perguntas
                frequemente perguntadas.</p>
            </div>
            <div class="block-content">
                <div class="faq-item">
                    <h4 class="question">Quero adicionar produtos, como faço?</h4>
                    <div class="answer">
                        <p>Para adicionar produtos a única coisa que o utilizador deve fazer é premir o botão de "+" e
                        adicionar o produto atraves do código de barras.</p>
                    </div>
                </div>
                <div class="faq-item">
                    <h4 class="question">O código de barras não existe, o que fazer?</h4>
                    <div class="answer">
                        <p>Se não existir o código de barras poderá adicionar o produto manualmente.</p>
                    </div>
                </div>
                <div class="faq-item">
                    <h4 class="question">Não consigo realizar login.</h4>
                    <div class="answer">
                        <p>Caso não consiga realizar login contacte support.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
