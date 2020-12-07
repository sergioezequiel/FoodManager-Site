<?php


namespace backend\assets;


use yii\web\AssetBundle;

class FoodmanAsset extends AssetBundle
{
    public $sourcePath = __DIR__ . '/../themes/foodman';

    public $css = [

    ];

    public $js = [
        'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js',
        'https://code.jquery.com/jquery-3.5.1.slim.min.js',
        'https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js',
        'assets/js/scripts.js',
    ];

    public $depends = [
        'backend\assets\AppAsset',
    ];
}