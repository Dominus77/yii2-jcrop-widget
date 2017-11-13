<?php

namespace dominus77\jcrop;

use yii\web\AssetBundle;

/**
 * Class JCropAsset
 * @package dominus77\jcrop
 */
class JCropAsset extends AssetBundle
{
    public $sourcePath = '@bower/jcrop';

    public $css;

    public $js;

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

    public $depends = [
        'yii\web\JqueryAsset',
    ];
}