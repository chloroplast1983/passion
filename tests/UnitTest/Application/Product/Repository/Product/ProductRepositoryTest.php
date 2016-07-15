<?php
namespace Product\Repository\Product;

use tests\GenericTestsDatabaseTestCase;
use Marmot\Core;
use Product\Model\Product;

/**
 * Product/Repository/Product/ProductRepository.class.php 测试文件
 * @author chloroplast
 * @version 1.0.20160218
 */
class ProductRepositoryTest extends GenericTestsDatabaseTestCase
{

    public $fixtures = array(
        'pcore_product',
        'pcore_product_content',
        'pcore_product_brand',
        'pcore_product_category'
    );

    private $stub;

    public function setUp()
    {
        $this->stub = Core::$container->get('Product\Repository\Product\ProductRepository');

        parent::setUp();
    }

    public function tearDown()
    {
        Core::$cacheDriver->flushAll();
        parent::tearDown();
    }
    /**
     * 测试仓库构建
     */
    public function testProductRepositoryConstructor()
    {

        //测试RowCacheQuery构造成功
        $productRowCacheQuery = $this->getPrivateProperty(
            'Product\Repository\Product\ProductRepository',
            'productRowCacheQuery'
        );
        $this->assertInstanceOf(
            'Product\Repository\Product\Query\ProductRowCacheQuery',
            $productRowCacheQuery->getValue($this->stub)
        );
    }

    /**
     * 测试仓库add
     */
    public function testProductRepositoryAdd()
    {
        //初始化Application
        $product = new Product();
        $product->setTitle('title');
        $product->setContent('content');
        $product->getCategory()->setId(1);
        $product->getBrand()->setId(1);
        $product->setModel('model');
        $product->setNumber('number');
        $product->setMoq('moq');
        $product->setWarrantyTime('warranty_time');
        $product->setCertificates('certificates');

        $result = $this->stub->add($product);
        
        //期望返回true
        $this->assertTrue($result);

        //确认主键id赋值成功
        $this->assertGreaterThan(0, $product->getId());

        $expectedArray = $expectedContentArray = array();
        //查询数据库,确认数据插入成功
        $expectedArray = Core::$dbDriver->query('SELECT * FROM pcore_product WHERE product_id='.$product->getId());
        $expectedArray = $expectedArray[0];

        $expectedContentArray = Core::$dbDriver->query(
            'SELECT * FROM pcore_product_content WHERE product_id='.$product->getId()
        );
        $expectedContentArray = $expectedContentArray[0];

        $expectedArray = array_merge($expectedArray, $expectedContentArray);

        $this->assertEquals($expectedArray['product_id'], $product->getId());
        $this->assertEquals($expectedArray['title'], $product->getTitle());
        $this->assertEquals($expectedArray['create_time'], $product->getCreateTime());
        $this->assertEquals($expectedArray['update_time'], $product->getUpdateTime());
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

    /**
     * 测试仓库save
     */
    public function testProductRepositoryUpdate()
    {
        $testProductId = 1;
        //查询旧数据,确认修改前状态
        $oldArray = Core::$dbDriver->query('SELECT * FROM pcore_product WHERE product_id ='.$testProductId);
        $this->assertNotEmpty($oldArray);//确认我们已经构建数据
        $oldArray = $oldArray[0];

        $product = new Product($testProductId);

        $product->setTitle($oldArray['title'].'Modified');
        $product->setContent($oldArray['content'].'Modified');
        $product->getCategory()->setId($oldArray['category_id']+1);
        $product->getBrand()->setId($oldArray['brand_id']+1);
        $product->setModel($oldArray['model'].'Modified');
        $product->setNumber($oldArray['number'].'Modified');
        $product->setMoq($oldArray['moq'].'Modified');
        $product->setWarrantyTime($oldArray['warranty_time'].'Modified');
        $product->setCertificates($oldArray['certificates'].'Modified');
        $product->setStatus(STATUS_DELETE);

        //确认旧数据和新数据不一致
        $this->assertEquals($oldArray['product_id'], $product->getId());
        $this->assertNotEquals($oldArray['title'], $product->getTitle());
        $this->assertNotEquals($oldArray['create_time'], $product->getCreateTime());
        $this->assertNotEquals($oldArray['update_time'], $product->getUpdateTime());
        $this->assertNotEquals($oldArray['status_time'], $product->getStatusTime());
        $this->assertNotEquals($oldArray['status'], $product->getStatus());
        $this->assertNotEquals($oldArray['content'], $product->getContent());
        $this->assertNotEquals($oldArray['category_id'], $product->getCategory()->getId());
        $this->assertNotEquals($oldArray['brand_id'], $product->getBrand()->getId());
        $this->assertNotEquals($oldArray['model'], $product->getModel());
        $this->assertNotEquals($oldArray['number'], $product->getNumber());
        $this->assertNotEquals($oldArray['moq'], $product->getMoq());
        $this->assertNotEquals($oldArray['warranty_time'], $product->getWarrantyTime());
        $this->assertNotEquals($oldArray['certificates'], $product->getCertificates());

        $result = $this->stub->update($product);
        //期望返回true
        $this->assertTrue($result);

         //查询数据库,确认数据修改成功
        $expectedArray = Core::$dbDriver->query('SELECT * FROM pcore_product WHERE product_id='.$testProductId);
        $expectedArray = $expectedArray[0];

        $expectedContentArray = Core::$dbDriver->query(
            'SELECT * FROM pcore_product_content WHERE product_id='.$product->getId()
        );
        $expectedContentArray = $expectedContentArray[0];

        $expectedArray = array_merge($expectedArray, $expectedContentArray);

        $this->assertEquals($expectedArray['product_id'], $product->getId());
        $this->assertEquals($expectedArray['title'], $product->getTitle());
        $this->assertEquals($expectedArray['create_time'], $product->getCreateTime());
        $this->assertEquals($expectedArray['update_time'], $product->getUpdateTime());
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

    /**
     * 测试仓库获取单独数据
     *
     */
    public function testProductRepositoryGetOne()
    {
        
        //测试询价id
        $testProductId = 1;

        //期待数组
        $expectedArray = Core::$dbDriver->query(
            'SELECT * FROM pcore_product WHERE product_id='.$testProductId
        );
        $expectedArray = $expectedArray[0];

        $expectedContentArray = Core::$dbDriver->query(
            'SELECT * FROM pcore_product_content WHERE product_id='.$testProductId
        );
        $expectedContentArray = $expectedContentArray[0];

        $expectedArray = array_merge($expectedArray, $expectedContentArray);

        $product = $this->stub->getOne($testProductId);

        $this->assertInstanceOf('Product\Model\Product', $product);

        $this->assertEquals($expectedArray['product_id'], $product->getId());
        $this->assertEquals($expectedArray['title'], $product->getTitle());
        $this->assertEquals($expectedArray['create_time'], $product->getCreateTime());
        $this->assertEquals($expectedArray['update_time'], $product->getUpdateTime());
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

    /**
     * 测试仓库获取批量数据
     */
    public function testProductRepositoryGetList()
    {
        
        //测试询价id
        $testProductIds = array(1,2);

        $expectedArrayList = Core::$dbDriver->query(
            'SELECT * FROM pcore_product WHERE product_id IN ('.implode(',', $testProductIds).')'
        );
        
        $productList = $this->stub->getList($testProductIds);
  
        foreach ($expectedArrayList as $key => $expectedArray) {
            $product = $productList[$key];
            $this->assertEquals($expectedArray['product_id'], $product->getId());
            $this->assertEquals($expectedArray['title'], $product->getTitle());
            $this->assertEquals($expectedArray['create_time'], $product->getCreateTime());
            $this->assertEquals($expectedArray['update_time'], $product->getUpdateTime());
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
}
