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

Once the extension is installed, simply use it in your code by  :

Basic:
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
]); ?>

<img id="target" src="http://jcrop-cdn.tapmodo.com/assets/images/sierra2-750.jpg">
```
Advanced:

```
<?php \dominus77\jcrop\JCrop::widget([
    'selector' => '#target',
    'initialize' => false, // Disables auto initialization Jcrop (Default true)
    'pluginOptions' => [
        'minSize' => [50, 37],
        'maxSize' => [500, 370],
        'setSelect' => [10, 10, 40, 40],
        'bgColor' => 'black',
        'bgOpacity' => '0.5',
        'onSelect' => new yii\web\JsExpression("showPreview"),
        'onChange' => new yii\web\JsExpression("showPreview"),
        'onRelease' => new yii\web\JsExpression("hidePreview"),
        'aspectRatio' => 1,
    ],
]);

$script = new \yii\web\JsExpression("

    // Example animate
    $('#animbutton').click(function(e) {
        jcrop_api.animateTo([ 120,120,80,80 ]);
        return false;
    });

    // Example disable Jcrop
    $('#disable').click(function(e) {
        jcrop_api.destroy();
        return false;
    });

    // Example enable Jcrop
    $('#enable').click(function(e) {
        initJcrop();
        return false;
    });

    // Example disable preview
    $('#preview_disable').click(function(e) {
        hidePreview();
        return false;
    });

    // Example of filling a form with coordinates
    function showCoords(c) {
        $('#x').val(c.x);
        $('#y').val(c.y);
        $('#x2').val(c.x2);
        $('#y2').val(c.y2);
        $('#w').val(c.w);
        $('#h').val(c.h);
    };

    var preview = $('#preview');

    // Function of organization preview
    function showPreview(coords) {

        // Fill form fields with coordinates
        showCoords(coords);

        if (parseInt(coords.w) > 0) {
            var rx = 100 / coords.w;
            var ry = 100 / coords.h;

            preview.css({
                width: Math.round(rx * 500) + 'px',
                height: Math.round(ry * 370) + 'px',
                marginLeft: '-' + Math.round(rx * coords.x) + 'px',
                marginTop: '-' + Math.round(ry * coords.y) + 'px'
            }).show();
        }
    }

    // Hide function preview
    function hidePreview() {
        preview.stop().fadeOut('fast');
    }

    hidePreview();

    // Initialization Jcrop
    initJcrop();
");
$this->registerJs($script);
?>

<div class="row">
    <div class="col-md-6">
        <img id="target" src="http://jcrop-cdn.tapmodo.com/assets/images/sierra2-750.jpg">
        <br>
        <div class="jc_coords">
            <label>X1 <input type="text" size="4" id="x" name="x" /></label>
            <label>Y1 <input type="text" size="4" id="y" name="y" /></label>
            <label>X2 <input type="text" size="4" id="x2" name="x2" /></label>
            <label>Y2 <input type="text" size="4" id="y2" name="y2" /></label>
            <label>W <input type="text" size="4" id="w" name="w" /></label>
            <label>H <input type="text" size="4" id="h" name="h" /></label>
        </div>
        <div class="jc_control">
            <span class="btn btn-success" id="enable">Enable</span>
            <span class="btn btn-danger" id="disable">Disable</span>
            <span class="btn btn-primary" id="preview_disable">Disable Preview</span>
            <span class="btn btn-default" id="animbutton">Animate</span>
        </div>
    </div>
    <div class="col-md-6">
        <div style="width:100px;height:100px;overflow:hidden;margin-left:5px;">
            <img id="preview" src="http://jcrop-cdn.tapmodo.com/assets/images/sierra2-750.jpg">
        </div>
    </div>
</div>
```

More Information
-----
Please, check the [Jcrop - Image Cropping for jQuery](http://beta.jcrop.org)

License
-----
The BSD License (BSD). Please see [License File](https://github.com/Dominus77/yii2-jcrop-widget/blob/master/LICENSE.md) for more information.