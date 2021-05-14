<?php

namespace dynamikaweb\lightgallery\src;
use yii\web\AssetBundle;

class LightGalleryAsset extends AssetBundle
{
    public $sourcePath = '@npm/lightgallery';

    public $css = [
        'dist/css/lg-transitions.min.css',
        'dist/css/lightgallery.min.css'
    ];

    public $js = [
        'dist/js/lightgallery-all.min.js',
    ];

    public $depends = [
        'yii\web\JqueryAsset',
    ];

    public $publishOptions = [
        'forceCopy' => YII_DEBUG,
    ];
}