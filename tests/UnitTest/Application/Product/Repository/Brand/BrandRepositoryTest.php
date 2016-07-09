<?php
namespace Product\Repository\Brand;

use tests\GenericTestsDatabaseTestCase;
use Marmot\Core;
use Product\Model\Brand;

/**
 * Product/Repository/Brand/BrandRepository.class.php 测试文件
 * @author chloroplast
 * @version 1.0.20160218
 */
class BrandRepositoryTest extends GenericTestsDatabaseTestCase
{

    public $fixtures = array('pcore_product_brand');

    private $stub;

    public function setUp()
    {
        $this->stub = Core::$container->get('Product\Repository\Brand\BrandRepository');

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
    public function testBrandRepositoryConstructor()
    {

        //测试RowCacheQuery构造成功
        $brandRowCacheQuery = $this->getPrivateProperty(
            'Product\Repository\Brand\BrandRepository',
            'brandRowCacheQuery'
        );
        $this->assertInstanceOf(
            'Product\Repository\Brand\Query\BrandRowCacheQuery',
            $brandRowCacheQuery->getValue($this->stub)
        );
    }

    /**
     * 测试仓库add
     */
    public function testBrandRepositoryAdd()
    {
        //初始化Application
        $brand = new Brand();
        $brand->setName('name');
        $brand->setLogo(1);

        $result = $this->stub->add($brand);
        //期望返回true
        $this->assertTrue($result);

        //确认主键id赋值成功
        $this->assertGreaterThan(0, $brand->getId());

        //查询数据库,确认数据插入成功
        $expectedArray = Core::$dbDriver->query('SELECT * FROM pcore_product_brand WHERE brand_id='.$brand->getId());
        $expectedArray = $expectedArray[0];
        $this->assertEquals($expectedArray['brand_id'], $brand->getId());
        $this->assertEquals($expectedArray['brand_name'], $brand->getName());
        $this->assertEquals($expectedArray['logo'], $brand->getLogo());
        $this->assertEquals($expectedArray['create_time'], $brand->getCreateTime());
        $this->assertEquals($expectedArray['update_time'], $brand->getUpdateTime());
        $this->assertEquals($expectedArray['status_time'], $brand->getStatusTime());
        $this->assertEquals($expectedArray['status'], $brand->getStatus());
    }

    /**
     * 测试仓库save
     */
    public function testBrandRepositoryUpdate()
    {
        $testBrandId = 1;
        //查询旧数据,确认修改前状态
        $oldArray = Core::$dbDriver->query('SELECT * FROM pcore_product_brand WHERE brand_id ='.$testBrandId);
        $this->assertNotEmpty($oldArray);//确认我们已经构建数据
        $oldArray = $oldArray[0];

        $brand = new Brand($testBrandId);
        $brand->setName($oldArray['brand_name'].'Modified');
        $brand->setLogo($oldArray['logo']+2);
        $brand->setStatus(STATUS_DELETE);

        //确认旧数据和新数据不一致
        $this->assertEquals($oldArray['brand_id'], $brand->getId());
        $this->assertNotEquals($oldArray['brand_name'], $brand->getName());
        $this->assertNotEquals($oldArray['logo'], $brand->getLogo());
        $this->assertNotEquals($oldArray['create_time'], $brand->getCreateTime());
        $this->assertNotEquals($oldArray['update_time'], $brand->getUpdateTime());
        $this->assertNotEquals($oldArray['status_time'], $brand->getStatusTime());
        $this->assertNotEquals($oldArray['status'], $brand->getStatus());

        $result = $this->stub->update($brand);
        //期望返回true
        $this->assertTrue($result);

         //查询数据库,确认数据修改成功
        $expectedArray = Core::$dbDriver->query('SELECT * FROM pcore_product_brand WHERE brand_id ='.$testBrandId);
        $expectedArray = $expectedArray[0];

        $this->assertEquals($expectedArray['brand_id'], $brand->getId());
        $this->assertEquals($expectedArray['brand_name'], $brand->getName());
        $this->assertEquals($expectedArray['logo'], $brand->getLogo());
        $this->assertEquals($expectedArray['create_time'], $brand->getCreateTime());
        $this->assertEquals($expectedArray['update_time'], $brand->getUpdateTime());
        $this->assertEquals($expectedArray['status_time'], $brand->getStatusTime());
        $this->assertEquals($expectedArray['status'], $brand->getStatus());
    }

    /**
     * 测试仓库获取单独数据
     *
     */
    public function testBrandRepositoryGetOne()
    {
        
        //测试询价id
        $testBrandId = 1;

        //期待数组
        $expectedArray = Core::$dbDriver->query('SELECT * FROM pcore_product_brand WHERE brand_id='.$testBrandId);
        $expectedArray = $expectedArray[0];

        $brand = $this->stub->getOne($testBrandId);

        $this->assertInstanceOf('Product\Model\Brand', $brand);
        $this->assertEquals($expectedArray['brand_id'], $brand->getId());
        $this->assertEquals($expectedArray['brand_name'], $brand->getName());
        $this->assertEquals($expectedArray['logo'], $brand->getLogo());
        $this->assertEquals($expectedArray['create_time'], $brand->getCreateTime());
        $this->assertEquals($expectedArray['update_time'], $brand->getUpdateTime());
        $this->assertEquals($expectedArray['status_time'], $brand->getStatusTime());
        $this->assertEquals($expectedArray['status'], $brand->getStatus());
    }

    /**
     * 测试仓库获取批量数据
     */
    public function testBrandRepositoryGetList()
    {
        
        //测试询价id
        $testBrandIds = array(1,2);

        $expectedArrayList = Core::$dbDriver->query(
            'SELECT * FROM pcore_product_brand WHERE brand_id IN ('.implode(',', $testBrandIds).')'
        );
        
        $brandList = $this->stub->getList($testBrandIds);

        foreach ($expectedArrayList as $key => $expectedArray) {
            $brand = $brandList[$key];

            $this->assertInstanceOf('Product\Model\Brand', $brand);
            $this->assertEquals($expectedArray['brand_id'], $brand->getId());
            $this->assertEquals($expectedArray['brand_name'], $brand->getName());
            $this->assertEquals($expectedArray['logo'], $brand->getLogo());
            $this->assertEquals($expectedArray['create_time'], $brand->getCreateTime());
            $this->assertEquals($expectedArray['update_time'], $brand->getUpdateTime());
            $this->assertEquals($expectedArray['status_time'], $brand->getStatusTime());
            $this->assertEquals($expectedArray['status'], $brand->getStatus());
        }
    }
}
