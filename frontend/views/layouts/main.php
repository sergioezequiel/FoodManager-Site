<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\FoodmanAsset;
use common\widgets\Alert;

FoodmanAsset::register($this);
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

<div class="wrap">
    <nav class="navbar navbar-light navbar-expand-lg fixed-top bg-white clean-navbar">
        <div class="container"><a class="navbar-brand logo" href="#">FoodMan</a><button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse"
                 id="navcol-1">
                <ul class="nav navbar-nav ml-auto">
                    <li class="nav-item"><a class="nav-link" href="<?=Url::toRoute('site/index')?>">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?=Url::toRoute('site/aboutus')?>">About Us</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?=Url::toRoute('site/faq')?>">Faq</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?=Url::toRoute('site/contactus')?>">Contact Us</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?=Url::toRoute('site/login')?>">Login</a></li>
                </ul>
            </div>
        </div>
    </nav>


        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    
</div>

<footer class="page-footer dark">
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <h5>Link de acesso rápido</h5>
                <ul>
                    <li><a href="<?=Url::toRoute('site/index')?>">Home</a></li>
                    <li><a href="<?=Url::toRoute('site/login')?>">Login</a></li>
                    <li><a href="<?=Url::toRoute('site/contactus')?>">Contacte-nos</a></li>
                </ul>
            </div>
            <div class="col-sm-3">
                <h5>About us</h5>
                <ul>
                    <li><a href="<?=Url::toRoute('site/aboutus')?>">Sobre Nós</a></li>
                </ul>
            </div>
            <div class="col-sm-3">
            </div>
        </div>
    </div>
    <div class="footer-copyright">
        <p>© 2020-2021 IpLeiria ESTG</p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
