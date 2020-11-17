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
                    <div class="card clean-card text-center"><img class="card-img-top w-100 d-block" src="<?= $assets->baseUrl ?>/assets/img/avatars/Serjux_aka_look_into_my_soul_JK_IDH_A_SOUL.png">
                        <div class="card-body info">
                            <h4 class="card-title">Sérgio Ezequiel</h4>
                            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                            <div class="icons"><a href="#"><i class="icon-social-facebook"></i></a><a href="#"><i class="icon-social-instagram"></i></a><a href="#"><i class="icon-social-twitter"></i></a></div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4">
                    <div class="card clean-card text-center"><img class="card-img-top w-100 d-block" src="<?= $assets->baseUrl ?>/assets/img/avatars/94d99465-b114-43ee-bd7d-c0cb99c9e65c.jpeg">
                        <div class="card-body info">
                            <h4 class="card-title">Alexandre Bértolo</h4>
                            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                            <div class="icons"><a href="#"><i class="icon-social-facebook"></i></a><a href="#"><i class="icon-social-instagram"></i></a><a href="#"><i class="icon-social-twitter"></i></a></div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4">
                    <div class="card clean-card text-center"><img class="card-img-top w-100 d-block" src="<?= $assets->baseUrl ?>/assets/img/avatars/Vlad.png">
                        <div class="card-body info">
                            <h4 class="card-title">Vladyslav Bobko</h4>
                            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                            <div class="icons"><a href="#"><i class="icon-social-facebook"></i></a><a href="#"><i class="icon-social-instagram"></i></a><a href="#"><i class="icon-social-twitter"></i></a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>