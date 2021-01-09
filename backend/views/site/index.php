<?php

/* @var $this yii\web\View */

use yii\helpers\Url;

$assets = \backend\assets\SbadminAsset::register($this);
$this->title = 'FoodManager';
?>

<main>
    <h1> parabens deu login</h1>
    <a href="<?=Url::toRoute('user/index')?>">aceder a pagina</a>
</main>
