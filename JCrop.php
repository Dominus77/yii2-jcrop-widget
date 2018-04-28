<?php

namespace dominus77\jcrop;

use yii\base\Widget;
use yii\helpers\Json;
use yii\helpers\Html;
use yii\web\JsExpression;

/**
 * Class JCrop
 * @package dominus77\jcrop
 *
 * Jcrop is a powerful image cropping tool for jQuery.
 * @see http://jcrop.org/
 *
 * <?= \dominus77\jcrop\JCrop::widget([
 *      'image' => Yii::getAlias('@web/uploads/jcrop/image1.jpg'),
 *      'pluginOptions' => [...], // see http://jcrop.org/doc/options
 *      'callBack' => "function(){}",
 * ]); ?>
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
     * @var string
     */
    public $image;

    /**
     * @var array
     */
    public $imageOptions = [];

    /**
     * Plugin options Jcrop
     * @see http://jcrop.org/doc/options
     * @var array
     */
    public $pluginOptions = [];

    /**
     * @see http://jcrop.org/doc/api
     * @var string
     */
    public $callBack = 'function(){}';

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();
        if (empty($this->selector)) {
            $this->selector = $this->id;
        }
    }

    /**
     * @inheritdoc
     */
    public function run()
    {
        if (!empty($this->image)) {
            $this->registerClientScript();
            $this->imageOptions['id'] = $this->selector;
            echo Html::img($this->image, $this->imageOptions);
        }
    }

    /**
     * Register resource
     */
    public function registerClientScript()
    {
        $options = empty($this->pluginOptions) ? '{}' : Json::encode($this->pluginOptions);
        $view = $this->getView();
        JCropAsset::register($view);
        $selector = '#' . $this->selector;
        $js = new JsExpression("          
            $('{$selector}').Jcrop({$options},{$this->callBack});
        ");
        $view->registerJs($js);
    }
}
