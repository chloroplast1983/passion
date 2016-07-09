<?php
namespace Product\Translator;

use Product\Model\Brand;
use tests\GenericTestsDatabaseTestCase;
use Marmot\Core;

/**
 * Product\Translator\BrandTranslator.class.php 测试文件
 * @author chloroplast
 * @version 1.0.0:2016.04.18
 */
class BrandTranslatorTest extends GenericTestsDatabaseTestCase
{

    private $stub;

    public $fixtures = array('pcore_product_brand');

    public function setUp()
    {
        $this->stub = new BrandTranslator();
        parent::setUp();
    }

    /**
     * 测试翻译数组转换对象
     */
    public function testArrayToObject()
    {

        $testBrandId = 1;
        $expectedArray = Core::$dbDriver->query(
            'SELECT * FROM pcore_product_brand WHERE brand_id='.$testBrandId
        );
        $expectedArray = $expectedArray[0];

        $brand = $this->stub->arrayToObject($expectedArray);

        $this->assertInstanceof('Product\Model\Brand', $brand);

        //测试翻译器赋值正确
        $this->assertEquals($brand->getId(), $expectedArray['brand_id']);
        $this->assertEquals($brand->getName(), $expectedArray['brand_name']);
        $this->assertEquals($brand->getUpdateTime(), $expectedArray['update_time']);
        $this->assertEquals($brand->getCreateTime(), $expectedArray['create_time']);
        $this->assertEquals($brand->getStatusTime(), $expectedArray['status_time']);
        $this->assertEquals($brand->getStatus(), $expectedArray['status']);
        $this->assertEquals($brand->getLogo(), $expectedArray['logo']);
    }

    /**
     * 测试翻译对象转换为数组
     */
    public function testObjectToArray()
    {

        $testBrandId = 1;
        $expectedArray = Core::$dbDriver->query(
            'SELECT * FROM pcore_product_brand WHERE brand_id='.$testBrandId
        );
        $expectedArray = $expectedArray[0];

        $brand = new Brand($testBrandId);
        $brand->setName($expectedArray['brand_name']);
        $brand->setCreateTime($expectedArray['create_time']);
        $brand->setUpdateTime($expectedArray['update_time']);
        $brand->setStatusTime($expectedArray['status_time']);
        $brand->setStatus($expectedArray['status']);
        $brand->setLogo($expectedArray['logo']);

        $brandInfo = $this->stub->objectToArray($brand);
        //测试翻译器赋值正确
        $this->assertEquals($expectedArray['brand_id'], $brandInfo['brand_id']);
        $this->assertEquals($expectedArray['brand_name'], $brandInfo['brand_name']);
        $this->assertEquals($expectedArray['update_time'], $brandInfo['update_time']);
        $this->assertEquals($expectedArray['create_time'], $brandInfo['create_time']);
        $this->assertEquals($expectedArray['status_time'], $brandInfo['status_time']);
        $this->assertEquals($expectedArray['status'], $brandInfo['status']);
        $this->assertEquals($expectedArray['logo'], $brandInfo['logo']);
    }
}
