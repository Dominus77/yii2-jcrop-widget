<?php

namespace tests;

use Yii;
use dominus77\jcrop\JCrop;

/**
 * Class JCropTest
 * @package tests
 */
class JCropTest extends TestCase
{
    /**
     * @throws \Exception
     */
    public function testRunJcrop()
    {
        $jcrop = JCrop::widget(['image' => Yii::getAlias('@web/uploads/image1.jpg')]);
        $this->assertContains('', $jcrop);
    }
}
