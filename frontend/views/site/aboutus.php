<?php

/* @var $this yii\web\View */



$assets = \frontend\assets\FoodmanAsset::register($this);
$this->title = 'FoodManager';
?>
<main class="page">
    <section class="clean-block about-us">
        <div class="container">
            <div class="block-heading">
                <h2 class="text-info">Sobre Nós</h2>
                <p>Somos estudantes do Politecnico de Leiria curiosos para aprender mais.</p>
            </div>
            <div class="row justify-content-center">
                <div class="col-sm-6 col-lg-4">
                    <div class="card clean-card text-center"><img class="card-img-top w-100 d-block" src="<?= $assets->baseUrl ?>/assets/img/avatars/Sergio.png">
                        <div class="card-body info">
                            <h4 class="card-title" style="display: inline-block">Sérgio Ezequiel</h4>
                            <div class="icons" style="display: inline-block"><a href="https://www.instagram.com/serjuxlol"><i class="icon-social-instagram"></i></i></a></div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4">
                    <div class="card clean-card text-center"><img class="card-img-top w-100 d-block" src="<?= $assets->baseUrl ?>/assets/img/avatars/Alex.png">
                        <div class="card-body info">
                            <h4 class="card-title" style="display: inline-block">Alexandre Bértolo</h4>
                            <div class="icons" style="display: inline-block"><a href='https://www.instagram.com/alexscorpion100/'?><i class="icon-social-instagram"></i></a></i></a></div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4">
                    <div class="card clean-card text-center"><img class="card-img-top w-100 d-block" src="<?= $assets->baseUrl ?>/assets/img/avatars/Vlad.png">
                        <div class="card-body info">
                            <h4 class="card-title" style="display: inline-block">Vladyslav Bobko</h4>
                            <div class="icons" style="display: inline-block"><a href="https://www.instagram.com/deep_as_a_sheep"><i class="icon-social-instagram"></i></a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>