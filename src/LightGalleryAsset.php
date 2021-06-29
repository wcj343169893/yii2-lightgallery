<?php

namespace dynamikaweb\lightgallery;
use yii\web\AssetBundle;

class LightGalleryAsset extends AssetBundle
{
    public $sourcePath = '@npm/lightgallery';

    public $css = [
        'css/lightgallery-bundle.css',
    ];

    public $js = [
        'lightgallery.umd.js',
        'plugins/thumbnail/lg-thumbnail.umd.js',
        'plugins/zoom/lg-zoom.umd.js',
        'plugins/autoplay/lg-autoplay.umd.js',
        'plugins/comment/lg-comment.umd.js',
        'plugins/fullscreen/lg-fullscreen.umd.js',
        'plugins/hash/lg-hash.umd.js',
        'plugins/mediumZoom/lg-medium-zoom.umd.js',
        'plugins/pager/lg-pager.umd.js',
        'plugins/relativeCaption/lg-relative-caption.umd.js',
        'plugins/rotate/lg-rotate.umd.js',
        'plugins/share/lg-share.umd.js',
        'plugins/video/lg-video.umd.js',
    ];

    public $depends = [];

    public $publishOptions = [
        'forceCopy' => YII_DEBUG,
    ];
}
