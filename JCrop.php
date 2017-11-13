<?php

namespace dominus77\jcrop;

use Yii;
use yii\base\Widget;
use yii\base\InvalidConfigException;
use yii\helpers\Json;

/**
 * Class JCrop
 * @package dominus77\jcrop
 *
 * Jcrop - Image Cropping for jQuery
 *
 * JCrop::widget([
 *      'selector' => '#target',
 *      'pluginOptions' => [...], // see http://beta.jcrop.org/doc/options.html
 * ]);
 *
 */
class JCrop extends Widget
{
    /**
     * id image
     * @var string
     */
    public $selector;

    /**
     * Plugin options Jcrop
     * see http://beta.jcrop.org/doc/options.html
     * @var array
     */
    public $pluginOptions = [];

    /**
     * Auto initialize Jcrop
     * @var bool
     */
    public $initialize = true;

    public function init()
    {
        parent::init();
        if (empty($this->selector)) {
            throw new InvalidConfigException('The "selector" property must be set.');
        }
    }

    public function run()
    {
        $this->registerClientScript();
    }

    public function registerClientScript()
    {
        $options = empty($this->pluginOptions) ? '' : Json::encode($this->pluginOptions);
        $js = new \yii\web\JsExpression("
            var jcrop_api,
                start = '{$this->initialize}';
            function initJcrop() {
                $('{$this->selector}').Jcrop({$options}, function(){jcrop_api = this;});
            }
            if(start == true) {
                initJcrop();
            }
        ");
        $view = $this->getView();
        JCropAsset::register($view);
        $view->registerJs($js);
    }
}