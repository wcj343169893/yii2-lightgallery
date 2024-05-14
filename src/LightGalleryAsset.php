<?php

namespace wcj343169893\lightgallery;
use yii\web\AssetBundle;

class LightGalleryAsset extends AssetBundle
{
    public $sourcePath = '@npm/lightgallery';

    public $css = [
        'css/lightgallery-bundle.css',
    ];

    public $js = [
        'lightgallery.min.js',
    ];

    public $depends = [];

    public $publishOptions = [
        'forceCopy' => YII_DEBUG,
    ];
}
