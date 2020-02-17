# yii2-jcrop-widget

[![Latest Version](https://poser.pugx.org/dominus77/yii2-jcrop-widget/v/stable)](https://packagist.org/packages/dominus77/yii2-jcrop-widget)
[![Software License](https://poser.pugx.org/dominus77/yii2-jcrop-widget/license)](https://github.com/Dominus77/yii2-jcrop-widget/blob/master/LICENSE.md)
[![Build Status](https://travis-ci.org/Dominus77/yii2-jcrop-widget.svg?branch=master)](https://travis-ci.org/Dominus77/yii2-jcrop-widget)
[![codecov](https://codecov.io/gh/Dominus77/yii2-jcrop-widget/branch/master/graph/badge.svg)](https://codecov.io/gh/Dominus77/yii2-jcrop-widget)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/Dominus77/yii2-jcrop-widget/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/Dominus77/yii2-jcrop-widget/?branch=master)
[![Total Downloads](https://poser.pugx.org/dominus77/yii2-jcrop-widget/downloads)](https://packagist.org/packages/dominus77/yii2-jcrop-widget)

[Jcrop - Image Cropping for jQuery](http://deepliquid.com/content/Jcrop.html)

## Installation

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require dominus77/yii2-jcrop-widget
```

or add

```
"dominus77/yii2-jcrop-widget": "^2.1"
```

to the require section of your `composer.json` file.

## Usage

Once the extension is installed, simply use it in your code by mimimum run:
```
<?= \dominus77\jcrop\JCrop::widget([
    'image' => Yii::getAlias('@web/uploads/image1.jpg') // url to your image   
]) ?>

```
Set Options:
```
<?= \dominus77\jcrop\JCrop::widget([
    'image' => Yii::getAlias('@web/uploads/image1.jpg'),
    'pluginOptions' => [
        'minSize' => [50, 37],
        'maxSize' => [500, 370],
        'setSelect' => [10, 10, 40, 40],
        'bgColor' => 'black',
        'bgOpacity' => 0.5,
        'onSelect' => new yii\web\JsExpression("function(c){console.log(c.x);}"),
        'onChange' => new yii\web\JsExpression("function(c){console.log(c.x);}")
    ]
]) ?>
```
CallBack:
```
<?= \dominus77\jcrop\JCrop::widget([
    'image' => Yii::getAlias('@web/uploads/image1.jpg'),
    'pluginOptions' => [//...],
    'callBack' => new yii\web\JsExpression("
        function(){
            jcrop_api = this;
        }
    ")
]) ?>

```

## More Information
Please, check the [Manual](http://deepliquid.com/content/Jcrop_Manual.html)

## Testing
```
$ vendor/bin/phpunit
```

## License
The MIT License (MIT). Please see [License File](https://github.com/Dominus77/yii2-jcrop-widget/blob/master/LICENSE.md) for more information.
