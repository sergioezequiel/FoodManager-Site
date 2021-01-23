<?php

/* @var $this yii\web\View */

/* @var $receitas app\models\Receitas */

use app\models\Receitas;
use frontend\assets\FoodmanAsset;
use yii\db\Query;
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
            <div>
                <div class="d-flex .align-content-start flex-wrap">
                    <?php foreach ($receitas as $receita) { ?>
                        <div class="block-content col-xl-4 col-md-6">
                            <h3><?= $receita->nome ?></h3>
                            <?= Html::img($receita->imagem, [
                                'alt' => 'Error 404 - Imagem não encontrada',
                                'width' => '200px',
                                'height' => '200px'
                            ]); ?>
                            <div>
                                <p style="margin-top: 10px;"><span class="fa fa-hourglass-half" style="width: 19px;text-align: center;"></span><?= 'Duração da receita: ' . $receita->getDuracaoReceitaMin() ?></p>
                                <p><span class="fa fa-clock" style="width: 19px;text-align: center;"></span><?= $receita->duracaopreparacao == 0 ? 'Não tem preparação da receita.' : 'Duração da preparação: ' . $receita->getDuracaoPreparacaoMin() ?></p>
                                <div>
                                    <p><span class="fa fa-stopwatch" style="width: 19px;text-align: center;"></span><?= 'Duração total: ' . $total = $receita->duracaopreparacao + $receita->duracaoreceita . ' min' ?></p>
                                    <a href="<?= Url::toRoute('site/ingredientes?receita=' . $receita->idreceita) ?>">Ver mais</a>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </section>
</main>
