<?php

namespace dominus77\jcrop;

use Yii;
use yii\base\Widget;
use yii\base\InvalidConfigException;
use yii\helpers\Json;
use yii\web\JsExpression;

/**
 * Class JCrop
 * @package dominus77\jcrop
 *
 * Jcrop - Image Cropping for jQuery
 *
 * JCrop::widget([
 *      'selector' => '#target',
 *      'pluginOptions' => [...], // see http://beta.jcrop.org/doc/options.html
 *      'callBack' => "function(){}",
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
     * @see http://beta.jcrop.org/doc/options.html
     * @var array
     */
    public $pluginOptions = [];

    /**
     * @see http://beta.jcrop.org/doc/api.html
     * @var string
     */
    public $callBack = 'function(){}';

    /**
     * @throws InvalidConfigException
     */
    public function init()
    {
        parent::init();
        if (empty($this->selector)) {
            throw new InvalidConfigException('The "selector" property must be set.');
        }
    }

    /**
     * @inheritdoc
     */
    public function run()
    {
        $this->registerClientScript();
    }

    /**
     * Register Jcrop
     */
    public function registerClientScript()
    {
        $options = empty($this->pluginOptions) ? '' : Json::encode($this->pluginOptions);
        $js = new JsExpression("
            $('{$this->selector}').Jcrop({$options},{$this->callBack});
        ");
        $view = $this->getView();
        JCropAsset::register($view);
        $view->registerJs($js);
    }
}
