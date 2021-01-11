<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider
 * @var $numreceitas integer
 * @var $numprodutos integer
 * @var $numusers integer
 * @var $numfeedback integer
 */

$this->title = 'FoodManager';
$this->params['breadcrumbs'][] = $this->title;
?>
<div>
    <h1><?= Html::encode($this->title) ?></h1>

    <div class="row" style="margin-top: 30px">
        <?php if(Yii::$app->user->can('editor') || Yii::$app->user->can('admin')) { ?>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-primary text-white mb-4">
                <div class="card-body"><span class="fas fa-book"></span> <?= Html::encode($numreceitas) ?> Receita<?= $numreceitas != 1 ? 's': '' ?></div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="<?= Url::toRoute('receitas/index') ?>">Ir para as Receitas</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
        <?php } ?>
        <?php if(Yii::$app->user->can('gestor') || Yii::$app->user->can('admin')) { ?>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-info text-white mb-4">
                <div class="card-body"><span class="fas fa-lemon"></span> <?= Html::encode($numprodutos) ?> Produto<?= $numprodutos != 1 ? 's': '' ?></div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="<?= Url::toRoute('produtos/index') ?>">Ir para os Produtos</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
        <?php } ?>
        <?php if(Yii::$app->user->can('moderador') || Yii::$app->user->can('admin')) { ?>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-success text-white mb-4">
                <div class="card-body"><span class="fas fa-user"></span> <?= Html::encode($numusers) ?> Utilizador<?= $numusers != 1 ? 'es': '' ?></div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="<?= Url::toRoute('user/index') ?>">Ir para os Utilizadores</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
        <?php } ?>
        <?php if(Yii::$app->user->can('moderador') || Yii::$app->user->can('gestor') || Yii::$app->user->can('admin')) { ?>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-danger text-white mb-4">
                <div class="card-body"><span class="fas fa-comment-dots"></span> <?= Html::encode($numfeedback) ?> Feedback<?= $numfeedback != 1 ? 's': '' ?> submetido<?= $numfeedback != 1 ? 's': '' ?></div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="<?= Url::toRoute('feedback/index') ?>">Ir para o Feedback</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
        <?php } ?>
    </div>
</div>
