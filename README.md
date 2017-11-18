yii2-jcrop-widget
======

[Jcrop - Image Cropping for jQuery](http://beta.jcrop.org)

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require dominus77/yii2-jcrop-widget "*"
```

or add

```
"dominus77/yii2-jcrop-widget": "*"
```

to the require section of your `composer.json` file.


Usage
-----

Once the extension is installed, simply use it in your code by:

```
<?php \dominus77\jcrop\JCrop::widget([
    'selector' => '#target',
    'pluginOptions' => [
        'minSize' => [50, 37],
        'maxSize' => [500, 370],
        'setSelect' => [10, 10, 40, 40],
        'bgColor' => 'black',
        'bgOpacity' => '0.5',
        'onSelect' => new yii\web\JsExpression("function(c){console.log(c.x);}"),
        'onChange' => new yii\web\JsExpression("function(c){console.log(c.x);}"),
    ],
]);
?>

<img id="target" src="http://jcrop-cdn.tapmodo.com/assets/images/sierra2-750.jpg">
```

[From the Jcrop jQuery plugin "loaded" callback](http://beta.jcrop.org/doc/api.html)
```
<?php \dominus77\jcrop\JCrop::widget([
    'selector' => '#target',
    'pluginOptions' => [...],
    'callBack' => "
        function(){
            jcrop_api = this;
            init_interface();
        }
    "),
]);

$script = new \yii\web\JsExpression("
    function init_interface(){
        $('#mybutton').on('click',function(e){
            jcrop_api.setSelect([ 10, 10, 100, 100 ]);
        });
    }
");
$this->registerJs($script);
?>
```

More Information
-----
Please, check the [Jcrop - Image Cropping for jQuery](http://beta.jcrop.org)

License
-----
The BSD License (BSD). Please see [License File](https://github.com/Dominus77/yii2-jcrop-widget/blob/master/LICENSE.md) for more information.