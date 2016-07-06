<?php
namespace Product\Translator;

use Product\Model\Product;
use tests\GenericTestsDatabaseTestCase;
use Marmot\Core;

/**
 * Product\Translator\ProductTranslator.class.php 测试文件
 * @author chloroplast
 * @version 1.0.0:2016.04.18
 */
class ProductTranslatorTest extends GenericTestsDatabaseTestCase
{

    private $stub;

    public $fixtures = array('pcore_product','pcore_product_content');

    public function setUp()
    {
        $this->stub = new ProductTranslator();
        parent::setUp();
    }

    /**
     * 测试翻译数组转换对象
     */
    public function testArrayToObject()
    {

        $testProductId = 1;
        $expectedProductArray = Core::$dbDriver->query(
            'SELECT * FROM pcore_product WHERE product_id='.$testProductId
        );
        $expectedProductArray = $expectedProductArray[0];

        $expectedProductContentArray = Core::$dbDriver->query(
            'SELECT * FROM pcore_product_content WHERE product_id='.$testProductId
        );
        $expectedProductContentArray = $expectedProductContentArray[0];
        
        $expectedArray = array_merge($expectedProductArray, $expectedProductContentArray);

        $product = $this->stub->arrayToObject($expectedArray);

        $this->assertInstanceof('Product\Model\Product', $product);

        //测试翻译器赋值正确
        $this->assertEquals($product->getId(), $expectedArray['product_id']);
        $this->assertEquals($product->getTitle(), $expectedArray['title']);
        $this->assertEquals($product->getUpdateTime(), $expectedArray['update_time']);
        $this->assertEquals($product->getCreateTime(), $expectedArray['create_time']);
        $this->assertEquals($product->getStatusTime(), $expectedArray['status_time']);
        $this->assertEquals($product->getStatus(), $expectedArray['status']);
        $this->assertEquals($product->getContent(), $expectedArray['content']);
        $this->assertEquals($product->getCategory()->getId(), $expectedArray['category_id']);
        $this->assertEquals($product->getBrand()->getId(), $expectedArray['brand_id']);
        $this->assertEquals($product->getModel(), $expectedArray['model']);
        $this->assertEquals($product->getNumber(), $expectedArray['number']);
        $this->assertEquals($product->getMoq(), $expectedArray['moq']);
        $this->assertEquals($product->getWarrantyTime(), $expectedArray['warranty_time']);
        $this->assertEquals($product->getCertificates(), $expectedArray['certificates']);
    }

    /**
     * 测试翻译对象转换为数组
     */
    public function testObjectToArray()
    {

        $testProductId = 1;
        $expectedProductArray = Core::$dbDriver->query(
            'SELECT * FROM pcore_product WHERE product_id='.$testProductId
        );
        $expectedProductArray = $expectedProductArray[0];

        $expectedProductContentArray = Core::$dbDriver->query(
            'SELECT * FROM pcore_product_content WHERE product_id='.$testProductId
        );
        $expectedProductContentArray = $expectedProductContentArray[0];
        
        $expectedArray = array_merge($expectedProductArray, $expectedProductContentArray);

        $product = new Product($testProductId);
        $product->setTitle($expectedArray['title']);
        $product->setCreateTime($expectedArray['create_time']);
        $product->setUpdateTime($expectedArray['update_time']);
        $product->setStatusTime($expectedArray['status_time']);
        $product->setStatus($expectedArray['status']);
        $product->setContent($expectedArray['content']);
        $product->getCategory()->setId($expectedArray['category_id']);
        $product->getBrand()->setId($expectedArray['brand_id']);
        $product->setModel($expectedArray['model']);
        $product->setNumber($expectedArray['number']);
        $product->setMoq($expectedArray['moq']);
        $product->setWarrantyTime($expectedArray['warranty_time']);
        $product->setCertificates($expectedArray['certificates']);
        //测试翻译器赋值正确
        $this->assertEquals($expectedArray['product_id'], $product->getId());
        $this->assertEquals($expectedArray['title'], $product->getTitle());
        $this->assertEquals($expectedArray['update_time'], $product->getUpdateTime());
        $this->assertEquals($expectedArray['create_time'], $product->getCreateTime());
        $this->assertEquals($expectedArray['status_time'], $product->getStatusTime());
        $this->assertEquals($expectedArray['status'], $product->getStatus());
        $this->assertEquals($expectedArray['content'], $product->getContent());
        $this->assertEquals($expectedArray['category_id'], $product->getCategory()->getId());
        $this->assertEquals($expectedArray['brand_id'], $product->getBrand()->getId());
        $this->assertEquals($expectedArray['model'], $product->getModel());
        $this->assertEquals($expectedArray['number'], $product->getNumber());
        $this->assertEquals($expectedArray['moq'], $product->getMoq());
        $this->assertEquals($expectedArray['warranty_time'], $product->getWarrantyTime());
        $this->assertEquals($expectedArray['certificates'], $product->getCertificates());

    }
}
