<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap4\Breadcrumbs;
use common\widgets\Alert;

\backend\assets\SbadminAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div>
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <a class="navbar-brand" href="<?= Url::toRoute('site/index') ?>">Foodman</a>
        <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
        <!-- Navbar-->
        <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                    <a class="dropdown-item" href="#">Settings</a>
                    <a class="dropdown-item" href="#">Activity Log</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="<?= Url::toRoute('site/logout') ?>">Logout</a>
                </div>
            </li>
        </ul>
    </nav>

    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading">Core</div>
                        <a class="nav-link" href="<?= Url::toRoute('site/index') ?>">
                            <div class="sb-nav-link-icon"><i class="fas fa-home"></i></div>
                            Início
                        </a>
                        <div class="sb-sidenav-menu-heading">Gestão</div>
                        <?php if(Yii::$app->user->can('moderador') || Yii::$app->user->can('admin')) { ?>
                        <a class="nav-link" href="<?= Url::toRoute('user/index') ?>">
                            <div class="sb-nav-link-icon"><i class="fas fa-user"></i></div>
                            Utilizadores
                        </a>
                        <?php } ?>
                        <?php if(Yii::$app->user->can('editor') || Yii::$app->user->can('admin')) { ?>
                        <a class="nav-link" href="<?= Url::toRoute('receitas/index') ?>">
                            <div class="sb-nav-link-icon"><i class="fas fa-book"></i></div>
                            Receitas
                        </a>
                        <?php } ?>
                        <?php if(Yii::$app->user->can('gestor') || Yii::$app->user->can('admin')) { ?>
                        <a class="nav-link" href="<?= Url::toRoute('categorias/index') ?>">
                            <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                            Categorias
                        </a>
                        <a class="nav-link" href="<?= Url::toRoute('produtos/index') ?>">
                            <div class="sb-nav-link-icon"><i class="fas fa-lemon"></i></div>
                            Produtos
                        </a>
                        <a class="nav-link" href="<?= Url::toRoute('codigosbarras/index') ?>">
                            <div class="sb-nav-link-icon"><i class="fas fa-barcode"></i></div>
                            Códigos Barras
                        </a>
                        <?php } ?>
                        <?php if(Yii::$app->user->can('moderador') || Yii::$app->user->can('gestor') || Yii::$app->user->can('admin')) { ?>
                        <a class="nav-link" href="<?= Url::toRoute('itensdespensa/index') ?>">
                            <div class="sb-nav-link-icon"><i class="fas fa-archive"></i></div>
                            Despensa (utilizadores)
                        </a>
                        <a class="nav-link" href="<?= Url::toRoute('feedback/index') ?>">
                            <div class="sb-nav-link-icon"><i class="fas fa-comment-dots"></i></div>
                            Feedback
                        </a>
                        <?php } ?>
                    </div>
                </div>
                <div class="sb-sidenav-footer">
                    <div class="small">Login feito como:</div>
                    <?= isset($this->params['username']) ? $this->params['username'] : 'SEM LOGIN EFETUADO' ?>
                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
            <div class="container-fluid">
                <?= Breadcrumbs::widget([
                    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                ]) ?>
                <?= Alert::widget() ?>
                <?= $content ?>
            </div>
        </div>
    </div>
</div>



<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
