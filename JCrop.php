<?php

namespace dominus77\jcrop;

use Yii;
use yii\base\Widget;
use yii\base\InvalidConfigException;
use yii\helpers\Json;

/**
 * Class JCrop
 * @package dominus77\jcrop
 */
class JCrop extends Widget
{
    public $selector;

    public $pluginOptions = [];

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
            var jcrop_api;
            function initJcrop() {
                $('{$this->selector}').Jcrop({$options}, function(){jcrop_api = this;});
            }
        ");
        $view = $this->getView();
        JCropAsset::register($view);
        $view->registerJs($js);
    }
}