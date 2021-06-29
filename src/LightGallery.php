<?php

namespace dynamikaweb\lightgallery;

use Yii;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Json;

class LightGallery extends \yii\base\Widget
{
    const NPM_PLUGINS = [
        'lgThumbnail' => 'plugins/thumbnail/lg-thumbnail.min.js',
        'lgZoom' => 'plugins/zoom/lg-zoom.min.js',
        'lgAutoplay' => 'plugins/autoplay/lg-autoplay.min.js',
        'lgComment' => 'plugins/comment/lg-comment.min.js',
        'lgFullscreen' => 'plugins/fullscreen/lg-fullscreen.min.js',
        'lgHash' => 'plugins/hash/lg-hash.min.js',
        'lgMediumZoom' => 'plugins/mediumZoom/lg-medium-zoom.min.js',
        'lgPager' => 'plugins/pager/lg-pager.min.js',
        'lgRelativeCaption' => 'plugins/relativeCaption/lg-relative-caption.min.js',
        'lgRotate' => 'plugins/rotate/lg-rotate.min.js',
        'lgShare' => 'plugins/share/lg-share.min.js',
        'lgVideo' => 'plugins/video/lg-video.min.js'
    ];

    public $options = [];
    public $plugins = [];
    public $pluginOptions = [];
    public $itemsOptions = [];
    public $imgOptions = [];
    public $items = [];


    public function init()
    {
        LightGalleryAsset::register($this->view);
        $bundle = Yii::$app->assetManager->getBundle('\dynamikaweb\lightgallery\LightGalleryAsset');
        foreach($this->plugins as $plugin) {
            $this->view->registerJsFile('@web'.$bundle->baseUrl.'/'.self::NPM_PLUGINS[$plugin]);
        }
        $this->registerClientScript();
    }

    public function run()
    {
        return $this->renderItems();
    }

    public function renderItems()
    {
        $items = [];
        if (count($this->items) > 0) {
            $tag = ArrayHelper::remove($this->itemsOptions, 'tag',null);
            foreach ($this->items as $item) {
                $items[] = $this->renderItem($item, $tag);
            }
        }
        return Html::tag(ArrayHelper::remove($this->options, 'tag', 'div'), 
            implode("\n", array_filter($items)), ArrayHelper::merge(['id' => $this->id], $this->options));
    }

    public function renderItem($item, $tag)
    {
        $src = ArrayHelper::getValue($item, 'src');
        $thumb = ArrayHelper::getValue($item, 'thumb');
        $caption = ArrayHelper::getValue($item, 'caption', '');
        $responsive = ArrayHelper::getValue($item, 'responsive', '');
        $imgOptions = ArrayHelper::getValue($item, 'imgOptions');

        if(isset($tag)){
            return Html::tag($tag,
                Html::a(Html::img($thumb, $imgOptions),''),
                ArrayHelper::merge($this->itemsOptions, [
                    'data-src' => $src,
                    'data-sub-html' => $caption,
                    'data-responsive' => $responsive
                ])
            );
        } else {
            return Html::a(Html::img($thumb, $imgOptions), 
                $src,
                [
                    'data-sub-html' => $caption,
                    'data-responsive' => $responsive
                ]
            );
        }

    }

    public function registerClientScript()
    {

        $id = $this->id;
        $pluginOptions = Json::encode($this->pluginOptions);
        $plugins = str_replace('"','',Json::encode($this->plugins));
        $js ="
            var lightGallery_pluginsOptions_$id = {$pluginOptions};
            lightGallery_pluginsOptions_$id.plugins = {$plugins};
            
            lightGallery(document.getElementById('$id'), lightGallery_pluginsOptions_$id);";

        $this->view->registerJs($js);
    }

}