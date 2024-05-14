dynamikaweb/yii2-lightgallery
=========================
![php version](https://img.shields.io/packagist/php-v/dynamikaweb/yii2-lightgallery)
![pkg version](https://img.shields.io/packagist/v/dynamikaweb/yii2-lightgallery)
![license](https://img.shields.io/packagist/l/dynamikaweb/yii2-lightgallery)
![quality](https://img.shields.io/scrutinizer/quality/g/dynamikaweb/yii2-lightgallery)
![build](https://img.shields.io/scrutinizer/build/g/dynamikaweb/yii2-lightgallery)

Description
-----------

This Widget is based on [LightGallery](https://www.lightgalleryjs.com/) for use in Yii2 Framework. See full [documentattion](https://www.lightgalleryjs.com/docs)

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
composer require wcj343169893/yii2-lightgallery
```

or add

```
"wcj343169893/yii2-lightgallery": "*"
```

to the require section of your `composer.json` file.


Usage
-----

Once the extension is installed, simply use it in your code by  :

```php
<?php
    echo \wcj343169893\lightgallery\LightGallery::widget([
        'items' => [
            [
                'thumb' => '../thumb/image_1.jpg',
                'src' => '../big/image_1.jpg',
                'caption' => '<h4> caption </h4><p> ... </p>',
                'imgOptions' => [
                    'width' => '100%',
                    'alt' => 'description'
                ]
            ],
            [
                'thumb' => '../thumb/image_2.jpg',
                'src' => '../big/image_2.jpg'
            ]
        ],
        'options' => ['class' => 'row'],
        'itemsOptions' => [
            'tag' => 'div',
            'class' => 'col-4 col-sm-5'
        ],
        // more plugins: 
        'plugins' => ['lgZoom', 'lgThumbnail'],
        // more options: 
        'pluginOptions' => [
            'mode' => 'lg-zoom-in-big',
            'download' => false,
            'zoom' => false,
            'share' => false
        ]
    ]);
?>
```
To add plugins just add their name to the plugins option `plugins =>['lgZoom]`, see the [full list](https://www.lightgalleryjs.com/docs/getting-started/#plugins).
For other LightGallery options use pluginOptions, see [documentation](https://www.lightgalleryjs.com/docs/settings/).

--------------------------------------------------------------------------------------------------------------
[![dynamika soluções web](https://avatars.githubusercontent.com/dynamikaweb?size=12)](https://dynamika.com.br)
This project is under [LGPL V3.0](https://opensource.org/licenses/LGPL-3.0) license.
