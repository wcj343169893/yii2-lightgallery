<?php

namespace dynamikaweb\lightgallery;

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Json;

class LightGallery extends \yii\base\Widget
{
    public $options = [];
    public $pluginOptions = [];
    public $itemsOptions = [];
    public $imgOptions = [];
    public $items = [];


    public function init()
    {
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
        $view = $this->getView();
        LightGalleryAsset::register($view);
        $pluginOptions = Json::encode($this->pluginOptions);
        $js = 'lightGallery(document.getElementById("'.$this->id.'"), '.$pluginOptions.');
        $view->registerJs($js);
    }

}
