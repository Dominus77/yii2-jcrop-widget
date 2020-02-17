<?php

namespace tests;

use dominus77\jcrop\JCropAsset;
use yii\web\AssetBundle;

/**
 * Class JCropAssetTest
 * @package tests
 */
class JCropAssetTest extends TestCase
{
    /**
     * @inheritdoc
     */
    public function testRegisterAsset()
    {
        $view = $this->getView();
        $this->assertEmpty($view->assetBundles);
        JCropAsset::register($view);
        $this->assertCount(2, $view->assetBundles);
        $this->assertInstanceOf(AssetBundle::class, $view->assetBundles['dominus77\\jcrop\\JCropAsset']);
        $content = $view->renderFile('@tests/views/layouts/rawlayout.php');
        $this->assertContains('Jcrop.min.js', $content);
        $this->assertContains('Jcrop.min.css', $content);
    }
}
