<?php

namespace dominus77\jcrop;

use yii\web\AssetBundle;

/**
 * Class JCropAsset
 * @package dominus77\jcrop
 */
class JCropAsset extends AssetBundle
{
    /**
     * @var string
     */
    public $sourcePath = '@bower/jcrop';

    /**
     * @var array
     */
    public $css = [];

    /**
     * @var array
     */
    public $js = [];

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();
        $min = YII_ENV_DEV ? '' : '.min';
        $this->css = [
            'css/Jcrop' . $min . '.css',
        ];
        $this->js = [
            'js/Jcrop' . $min . '.js',
        ];
    }

    /**
     * @var array
     */
    public $depends = [
        'yii\web\JqueryAsset',
    ];
}
