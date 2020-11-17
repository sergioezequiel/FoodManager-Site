<?php

/* @var $this yii\web\View */

$assets = \frontend\assets\FoodmanAsset::register($this);
$this->title = 'FoodManager';
?>
<main class="page landing-page">
    <section class="clean-block clean-hero" style="color: rgba(15,16,17,0.85);background: url(&quot;<?= $assets->baseUrl ?>/assets/img/main_page.jpg&quot;), #141111;border-color: rgba(18,21,23,0.85);">
        <div class="text">
            <h2><br>A sua refeição é a nossa preocupação<br></h2>
            <p><br>Quantas vezes já desistiu de realizar o seu jantar ou almoço pela única e simples razão<br>da preguiça de pensar no que cozinhar? Em vez de ter uma alimentação saudável,<br>sentamos no sofá a comer “snacks”. Com esta app, jamais terá
                que pensar no que<br>cozinhar, a app pensa por si e mostra as<br>receitas que prefere, porque a nossa preocupação é a sua satisfação.<br></p>
        </div>
    </section>
    <section class="clean-block clean-info dark">
        <div class="container">
            <div class="block-heading">
                <h2 class="text-info" style="height: 15px;">Info</h2>
                <p style="height: 46px;"><br>Está aplicação permitirá voce jamais de preocupar o que cozinhar.<br></p>
            </div>
            <div class="row align-items-center">
                <div class="col-md-6" style="width: 533px;text-align: left;">
                    <h3>Página do Login</h3>
                    <p><br>Inicie a sua sessão rapidamente para a aplicação atravez da pagina do login.<br><br></p><img class="img-thumbnail" src="<?= $assets->baseUrl ?>/assets/img/scenery/Login.jpg" style="height: 600px;"></div>
                <div class="col-md-6" style="width: 533px;text-align: right;">
                    <h3>Página do Registo</h3>
                    <p>Ainda não tem conta? Registre-se logo na aplicação e facili-te o seu acesso.</p><img class="img-thumbnail" src="<?= $assets->baseUrl ?>/assets/img/scenery/Registo.jpg" style="height: 600px;"></div>
                <div class="col-md-6">
                    <div class="getting-started-info"></div>
                </div>
            </div>
            <div class="row align-items-center">
                <div class="col-md-6" style="width: 533px;text-align: left;">
                    <h3>Lorem impsum dolor sit amet</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p><img class="img-thumbnail" src="<?= $assets->baseUrl ?>/assets/img/scenery/Login.jpg"
                                                                                                                                                                                                             style="height: 600px;"></div>
                <div class="col-md-6" style="width: 533px;text-align: right;">
                    <h3>Lorem impsum dolor sit amet</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p><img class="img-thumbnail" src="<?= $assets->baseUrl ?>/assets/img/scenery/Login.jpg"
                                                                                                                                                                                                             style="height: 600px;"></div>
                <div class="col-md-6">
                    <div class="getting-started-info"></div>
                </div>
            </div>
        </div>
    </section>
    <section class="clean-block features">
        <div class="container">
            <div class="block-heading">
                <h2 class="text-info">Features</h2>
                <p>A nossa aplicação permite:<br></p>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-5 feature-box"><i class="icon-star icon"></i>
                    <h4>Favoritar receitas</h4>
                    <p>Tem produtos? Tem receita favorita?<br>Aperte um botão e a sua receita está na mão.<br></p>
                </div>
                <div class="col-md-5 feature-box"><i class="icon-pencil icon"></i>
                    <h4><strong>Filtragem facilitada</strong><br></h4>
                    <p>Quer algo picante? Ou algo doce?<br>A única coisa a fazer é filtrar.<br></p>
                </div>
                <div class="col-md-5 feature-box"><i class="icon-screen-smartphone icon"></i>
                    <h4><strong>Design&nbsp;requintado</strong><br></h4>
                    <p>O design que chama milhões a atenção,<br>e todo ele na sua aplicação.<br></p>
                </div>
                <div class="col-md-5 feature-box"><i class="icon-refresh icon"></i>
                    <h4><strong>Feedback</strong><br></h4>
                    <p>Gostou da aplicação? Tem ideias?<br>Por favor, faça-nos conhecer a sua ideia <a href="contact-us.html">aqui.</a><br></p>
                </div>
            </div>
        </div>
    </section>
    <section class="clean-block slider dark">
        <div class="container">
            <div class="block-heading">
                <h2 class="text-info">FoodManager</h2>
                <p>Este projeto foi realizado no ambito do Politecnico de Leiria, ESTG, para o curso Programação de Sistemas de Informação</p>
            </div>
        </div>
        <div class="container">
            <div>
                <div class="row">
                    <div class="col"><img class="img-fluid d-xl-flex align-items-xl-end" src="<?= $assets->baseUrl ?>/assets/img/ESTG_ipl.jpg" style="filter: grayscale(0%);"></div>
                </div>
            </div>
        </div>
    </section>
</main>