<?php


namespace backend\assets;


use yii\web\AssetBundle;

class SbadminAsset extends AssetBundle
{
    public $sourcePath = __DIR__ . '/../themes/sbadmin';

    public $css = [
        'css/styles.css',
    ];

    public $js = [
        'https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js',
        'js/scripts.js',
    ];

    public $depends = [
        'rmrevin\yii\fontawesome\CdnFreeAssetBundle'
    ];
}