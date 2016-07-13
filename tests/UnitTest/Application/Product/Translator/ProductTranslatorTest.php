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

        $productInfo = $productContent = array();

        list($productInfo, $productContent) = $this->stub->objectToArray($product);
        //测试翻译器赋值正确
        $this->assertEquals($expectedArray['product_id'], $productInfo['product_id']);
        $this->assertEquals($expectedArray['title'], $productInfo['title']);
        $this->assertEquals($expectedArray['update_time'], $productInfo['update_time']);
        $this->assertEquals($expectedArray['create_time'], $productInfo['create_time']);
        $this->assertEquals($expectedArray['status_time'], $productInfo['status_time']);
        $this->assertEquals($expectedArray['status'], $productInfo['status']);
        $this->assertEquals($expectedArray['category_id'], $productInfo['category_id']);
        $this->assertEquals($expectedArray['brand_id'], $productInfo['brand_id']);
        $this->assertEquals($expectedArray['model'], $productInfo['model']);
        $this->assertEquals($expectedArray['number'], $productInfo['number']);
        $this->assertEquals($expectedArray['moq'], $productInfo['moq']);
        $this->assertEquals($expectedArray['warranty_time'], $productInfo['warranty_time']);
        $this->assertEquals($expectedArray['certificates'], $productInfo['certificates']);
        //比较content
        $this->assertEquals($expectedArray['product_id'], $productContent['product_id']);
        $this->assertEquals($expectedArray['content'], $productContent['content']);
    }

    /**
     * 测试翻译对象转换为数组
     */
    public function testObjectToArrayWithoutContent()
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

        $productInfo = $productContent = array();

        list($productInfo, $productContent) = $this->stub->objectToArray(
            $product,
            array(
                'id',
                'title',
                'updateTime',
                'createTime',
                'statusTime',
                'status',
                'category',
                'brand',
                'model',
                'number',
                'moq',
                'warrantyTime',
                'certificates',
            )
        );
        //测试翻译器赋值正确
        $this->assertEquals($expectedArray['product_id'], $productInfo['product_id']);
        $this->assertEquals($expectedArray['title'], $productInfo['title']);
        $this->assertEquals($expectedArray['update_time'], $productInfo['update_time']);
        $this->assertEquals($expectedArray['create_time'], $productInfo['create_time']);
        $this->assertEquals($expectedArray['status_time'], $productInfo['status_time']);
        $this->assertEquals($expectedArray['status'], $productInfo['status']);
        $this->assertEquals($expectedArray['category_id'], $productInfo['category_id']);
        $this->assertEquals($expectedArray['brand_id'], $productInfo['brand_id']);
        $this->assertEquals($expectedArray['model'], $productInfo['model']);
        $this->assertEquals($expectedArray['number'], $productInfo['number']);
        $this->assertEquals($expectedArray['moq'], $productInfo['moq']);
        $this->assertEquals($expectedArray['warranty_time'], $productInfo['warranty_time']);
        $this->assertEquals($expectedArray['certificates'], $productInfo['certificates']);
        //比较content
        $this->assertEmpty($productContent);
    }
}
