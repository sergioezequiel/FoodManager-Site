<?php


namespace frontend\assets;


use yii\web\AssetBundle;

class FoodmanAsset extends AssetBundle
{
    public $sourcePath = __DIR__ . '/../themes/foodman';

    public $css = [
        'https://fonts.googleapis.com/css?family=Montserrat:400,400i,700,700i,600,600i',
        'assets/fonts/simple-line-icons.min.css',
        'https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.css',
        'assets/css/smoothproducts.css',

        'assets/bootstrap/css/bootstrap.min.css',
    ];

    public $js = [
        'https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.js',
        'assets/js/smoothproducts.min.js',
        'assets/js/theme.js',

        'assets/bootstrap/js/bootstrap.min.js',
    ];

    public $depends = [
        'frontend\assets\AppAsset',
    ];
}