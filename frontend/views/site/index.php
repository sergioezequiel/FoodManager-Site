<?php

/* @var $this yii\web\View */

$assets = \frontend\assets\FoodmanAsset::register($this);
$this->title = 'FoodManager';
?>
<main class="page landing-page">
    <section class="clean-block clean-hero"
             style="color: rgba(15,16,17,0.85);background: url(&quot;<?= $assets->baseUrl ?>/assets/img/main_page.jpg&quot;), #141111;border-color: rgba(18,21,23,0.85);">
        <div class="text">
            <h2>A sua refeição é a nossa preocupação</h2>
            <p>Quantas vezes já desistiu de realizar o seu jantar ou almoço pela única e simples razão da
                preguiça de pensar no que cozinhar? Em vez de ter uma alimentação saudável,sentamos no sofá a comer
                “snacks”. Com esta app, jamais terá
                que pensar no que cozinhar, a app pensa por si e mostra as receitas que prefere, porque a nossa
                preocupação é a sua satisfação.</p>
        </div>
    </section>
    <section class="clean-block clean-info dark">
        <div class="container">
            <div class="block-heading">
                <h2 class="text-info" style="height: 15px; margin-left: auto; margin-right: auto">Info</h2>
                <p style="height: 46px;"><br>Está aplicação permitirá voce jamais de preocupar o que cozinhar.<br></p>
            </div>
            <div class="row align-items-center">
                <div class="col-md-4" style="text-align: center;">
                    <h3>Página do Login</h3>
                    <p>Inicie a sua sessão rapidamente para a aplicação atravez da pagina do login.</p>
                    <img class="img-thumbnail shadow-lg" width="279" height="590"
                         src="<?= $assets->baseUrl ?>/assets/img/scenery/login.png">
                </div>
                <div class="col-md-4" style="text-align: center;">
                    <h3>Página do Registo</h3>
                    <p>Ainda não tem conta? Registre-se logo na aplicação e facili-te o seu acesso.</p>
                    <img class="img-thumbnail shadow-lg" width="279" height="590"
                         src="<?= $assets->baseUrl ?>/assets/img/scenery/register.png">
                </div>
                <div class="col-md-4" style="text-align: center;">
                    <h3>Perfil eficaz</h3>
                    <p>Poderá mostrar as receitas e os ingredientes disponiveis. </p>
                    <img class="img-thumbnail shadow-lg" width="279" height="590"
                         src="<?= $assets->baseUrl ?>/assets/img/scenery/profile.png">
                </div>
            </div>
            <div class="row align-items-center" style="margin-top: 15px">
                <div class="col-md-4" style="text-align: center;">
                    <h3>Shopping cart</h3>
                    <p>Evite esquecer o que comprar, com esta ferramente esteja sempre atualizado.</p>
                    <img class="img-thumbnail shadow-lg" width="279" height="590"
                         src="<?= $assets->baseUrl ?>/assets/img/scenery/shopping_list.png">
                </div>
                <div class="col-md-4" style="text-align: center;">
                    <h3>Recipes Available</h3>
                    <p>Pagina para visualizar todas as receitas disponiveis de acordo com a despensa do utilizador.</p>
                    <img class="img-thumbnail shadow-lg" width="279" height="590"
                         src="<?= $assets->baseUrl ?>/assets/img/scenery/receitas_disponiveis.png">
                </div>
                <div class="col-md-4" style="text-align: center;">
                    <h3>All Recipes</h3>
                    <p>Pagina para visualizar todas as receitas que existem na nossa base de dados.</p>
                    <img class="img-thumbnail shadow-lg" width="279" height="590"
                         src="<?= $assets->baseUrl ?>/assets/img/scenery/receitas_todas.png">
                </div>
                <div class="row align-items-center" style="margin-top: 15px">
                <div class="col-md-4" style="text-align: center;">
                    <h3>Details for Recipes</h3>
                    <p>Página para visualizar os detalhes da receita.</p>
                    <img class="img-thumbnail shadow-lg" width="279" height="590"
                         src="<?= $assets->baseUrl ?>/assets/img/scenery/receitas_detalhes.png">
                </div>
                <div class="col-md-4" style="text-align: center;">
                    <h3>Add Item</h3>
                    <p>Página para adicionar manualmente o item a despensa.</p>
                    <img class="img-thumbnail shadow-lg" width="279" height="590"
                         src="<?= $assets->baseUrl ?>/assets/img/scenery/add_manual.png">
                </div>
                <div class="col-md-4" style="text-align: center;">
                    <h3>Scan</h3>
                    <p>Página para adicionar os items despensa utilizando o codigo de barras do mesmo.</p>
                    <img class="img-thumbnail shadow-lg" width="279" height="590"
                         src="<?= $assets->baseUrl ?>/assets/img/scenery/add_scan.png">
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
                    <p>Gostou da aplicação? Tem ideias?<br>Por favor, faça-nos conhecer a sua ideia <a
                                href="<?= \yii\helpers\Url::toRoute('site/contactus') ?>">aqui.</a><br></p>
                </div>
            </div>
        </div>
    </section>
    <section class="clean-block slider dark">
        <div class="container">
            <div class="block-heading">
                <h2 class="text-info">FoodManager</h2>
                <p>Este projeto foi realizado no ambito do Politecnico de Leiria, ESTG, para o curso Programação de
                    Sistemas de Informação</p>
            </div>
        </div>
        <div class="container">
            <div>
                <div class="row">
                    <div class="col"><img class="img-fluid d-xl-flex align-items-xl-end"
                                          src="<?= $assets->baseUrl ?>/assets/img/ESTG_ipl.jpg"
                                          style="filter: grayscale(0%);"></div>
                </div>
            </div>
        </div>
    </section>
</main>