<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'assets/css/font-awesome.min.css',
        'assets/css/linearicons.css',
        'assets/css/flaticon.css',
        'assets/css/animate.css',
        'assets/css/bootstrap.min.css',
        'assets/css/bootsnav.css',
        'assets/css/owl.carousel.min.css',
        'assets/css/owl.theme.default.min.css',
        'assets/css/responsive.css',
        'assets/css/style.css',
    ];
    public $js = [
        'assets/js/jquery.js',
        'assets/js/bootstrap.min.js',
        'assets/js/bootsnav.js',
        'assets/js/owl.carousel.min.js',
        'assets/js/custom.js'
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap5\BootstrapAsset',
    ];
}
