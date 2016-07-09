<?php
namespace Product\Repository\Category;

use tests\GenericTestsDatabaseTestCase;
use Marmot\Core;
use Product\Model\Category;

/**
 * Product/Repository/Category/CategoryRepository.class.php 测试文件
 * @author chloroplast
 * @version 1.0.20160218
 */
class CategoryRepositoryTest extends GenericTestsDatabaseTestCase
{

    public $fixtures = array('pcore_product_category');

    private $stub;

    public function setUp()
    {
        $this->stub = Core::$container->get('Product\Repository\Category\CategoryRepository');

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
    public function testCategoryRepositoryConstructor()
    {

        //测试RowCacheQuery构造成功
        $categoryRowCacheQuery = $this->getPrivateProperty(
            'Product\Repository\Category\CategoryRepository',
            'categoryRowCacheQuery'
        );
        $this->assertInstanceOf(
            'Product\Repository\Category\Query\CategoryRowCacheQuery',
            $categoryRowCacheQuery->getValue($this->stub)
        );
    }

    /**
     * 测试仓库add
     */
    public function testCategoryRepositoryAdd()
    {
        //初始化Application
        $category = new Category();
        $category->setName('cattegoryName');
        $category->setParentId(1);

        $result = $this->stub->add($category);
        //期望返回true
        $this->assertTrue($result);

        //确认主键id赋值成功
        $this->assertGreaterThan(0, $category->getId());

        //查询数据库,确认数据插入成功
        $expectedArray = Core::$dbDriver->query(
            'SELECT * FROM pcore_product_category WHERE category_id='.$category->getId()
        );
        $expectedArray = $expectedArray[0];
        $this->assertEquals($expectedArray['category_id'], $category->getId());
        $this->assertEquals($expectedArray['category_name'], $category->getName());
        $this->assertEquals($expectedArray['create_time'], $category->getCreateTime());
        $this->assertEquals($expectedArray['parent_id'], $category->getParentId());
        $this->assertEquals($expectedArray['type'], $category->getType());
    }

    /**
     * 测试仓库save
     */
    public function testcategoryRepositoryUpdate()
    {
        $testCategoryId = 1;
        //查询旧数据,确认修改前状态
        $oldArray = Core::$dbDriver->query('SELECT * FROM pcore_product_category WHERE category_id ='.$testCategoryId);
        $this->assertNotEmpty($oldArray);//确认我们已经构建数据
        $oldArray = $oldArray[0];

        $category = new category($testCategoryId);
        $category->setName($oldArray['category_name'].'Modified');
        $category->setParentId($oldArray['parent_id']+2);
        $category->setType(TYPE_ELEVATOR);

        //确认旧数据和新数据不一致
        $this->assertEquals($oldArray['category_id'], $category->getId());
        $this->assertNotEquals($oldArray['category_name'], $category->getName());
        $this->assertNotEquals($oldArray['create_time'], $category->getCreateTime());
        $this->assertNotEquals($oldArray['parent_id'], $category->getParentId());
        $this->assertNotEquals($oldArray['type'], $category->getType());

        $result = $this->stub->update($category);
        //期望返回true
        $this->assertTrue($result);

         //查询数据库,确认数据修改成功
        $expectedArray = Core::$dbDriver->query(
            'SELECT * FROM pcore_product_category WHERE category_id ='.$testCategoryId
        );
        $expectedArray = $expectedArray[0];

        $this->assertEquals($expectedArray['category_id'], $category->getId());
        $this->assertEquals($expectedArray['category_name'], $category->getName());
        $this->assertEquals($expectedArray['create_time'], $category->getCreateTime());
        $this->assertEquals($expectedArray['parent_id'], $category->getParentId());
        $this->assertEquals($expectedArray['type'], $category->getType());
    }

    /**
     * 测试仓库获取单独数据
     *
     */
    public function testcategoryRepositoryGetOne()
    {
        
        //测试询价id
        $testCategoryId = 1;

        //期待数组
        $expectedArray = Core::$dbDriver->query(
            'SELECT * FROM pcore_product_category WHERE category_id='.$testCategoryId
        );
        $expectedArray = $expectedArray[0];

        $category = $this->stub->getOne($testCategoryId);

        $this->assertInstanceOf('Product\Model\category', $category);
        $this->assertEquals($expectedArray['category_id'], $category->getId());
        $this->assertEquals($expectedArray['category_name'], $category->getName());
        $this->assertEquals($expectedArray['create_time'], $category->getCreateTime());
        $this->assertEquals($expectedArray['parent_id'], $category->getParentId());
        $this->assertEquals($expectedArray['type'], $category->getType());
    }

    /**
     * 测试仓库获取批量数据
     */
    public function testcategoryRepositoryGetList()
    {
        
        //测试询价id
        $testCategoryIds = array(1,2);

        $expectedArrayList = Core::$dbDriver->query(
            'SELECT * FROM pcore_product_category WHERE category_id IN ('.implode(',', $testCategoryIds).')'
        );
        
        $categoryList = $this->stub->getList($testCategoryIds);

        foreach ($expectedArrayList as $key => $expectedArray) {
            $category = $categoryList[$key];

            $this->assertInstanceOf('Product\Model\category', $category);
            $this->assertEquals($expectedArray['category_id'], $category->getId());
            $this->assertEquals($expectedArray['category_name'], $category->getName());
            $this->assertEquals($expectedArray['create_time'], $category->getCreateTime());
            $this->assertEquals($expectedArray['parent_id'], $category->getParentId());
            $this->assertEquals($expectedArray['type'], $category->getType());
        }
    }
}
