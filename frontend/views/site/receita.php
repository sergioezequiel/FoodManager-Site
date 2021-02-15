<?php

/* @var $this yii\web\View */

/* @var $receitas app\models\Receitas */

use frontend\assets\FoodmanAsset;
use yii\helpers\Html;
use yii\helpers\Url;

$assets = FoodmanAsset::register($this);
$this->title = 'FoodManager';
?>

<main class="page faq-page">
    <section class="clean-block clean-faq dark" style="padding-top: 50px; padding-bottom: 50px;">
        <div class="container">
            <div class="block-heading">
                <h2 class="text-info">Receitas</h2>
                <p>Estas são as nossas receitas deliciosas disponíveis.</p>
            </div>
            <!--  --><?php /*$form = ActiveForm::begin(['id' => 'pesquisa']); */ ?>

            <form class="example" action="<?= Url::toRoute('site/pesquisa'); ?>" method="get"
                  style="max-width: 300px; margin-bottom: 15px">
                <input class="form-control" style="height: 45px" type="text" placeholder="Search.." name="search">
                <button class="btn btn-primary" style="height: 45px" type="submit"><i class="fa fa-search"></i></button>
            </form>

            <?php /*ActiveForm::end(); */ ?>
            <div>
                <div class="d-flex .align-content-start flex-wrap">
                    <?php if ($receitas != null) { ?>
                        <?php foreach ($receitas as $receita) { ?>
                            <div class="block-content col-xl-4 col-md-6">
                                <h3><?= $receita->nome ?></h3>
                                <?= Html::img($receita->imagem, [
                                    'alt' => 'Error 404 - Imagem não encontrada',
                                    'width' => '200px',
                                    'height' => '200px'
                                ]); ?>
                                <div>
                                    <p style="margin-top: 10px;"><span class="fa fa-hourglass-half"
                                                                       style="width: 19px;text-align: center;"></span><?= 'Duração da receita: ' . $receita->getDuracaoReceitaMin() ?>
                                    </p>
                                    <p><span class="fa fa-clock"
                                             style="width: 19px;text-align: center;"></span><?= $receita->duracaopreparacao == 0 ? 'Não tem preparação da receita.' : 'Duração da preparação: ' . $receita->getDuracaoPreparacaoMin() ?>
                                    </p>
                                    <div>
                                        <p><span class="fa fa-stopwatch"
                                                 style="width: 19px;text-align: center;"></span><?= 'Duração total: ' . $total = $receita->duracaopreparacao + $receita->duracaoreceita . ' min' ?>
                                        </p>
                                        <a href="<?= Url::toRoute('site/ingredientes?receita=' . $receita->idreceita) ?>">Ver
                                            mais</a>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>

                    <?php } else { ?>
                        <div style="width: 100%; text-align: center; align-content: center; ">
                            <div style=" align-content: center;  background-color: rgba(0,0,0,0.7); border-radius: 15px; ">
                                <img src="https://cdn.pixabay.com/photo/2019/07/15/23/51/magnifying-4340698_960_720.jpg" style="margin: 15px; border-radius: 15px">
                                <h1 style="color: red; position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);"><b>Nenhuma<br> receita foi encontrada</b></h1>
                            </div>
                        </div>

                    <?php } ?>
                </div>
            </div>
        </div>
    </section>
</main>
