<?php
namespace Product\Translator;

use Product\Model\Category;
use tests\GenericTestsDatabaseTestCase;
use Marmot\Core;

/**
 * Product\Translator\CategoryTranslator.class.php 测试文件
 * @author chloroplast
 * @version 1.0.0:2016.04.18
 */
class CategoryTranslatorTest extends GenericTestsDatabaseTestCase
{

    private $stub;

    public $fixtures = array('pcore_product_category');

    public function setUp()
    {
        $this->stub = new CategoryTranslator();
        parent::setUp();
    }

    /**
     * 测试翻译数组转换对象
     */
    public function testArrayToObject()
    {

        $testCategoryId = 1;
        $expectedArray = Core::$dbDriver->query(
            'SELECT * FROM pcore_product_category WHERE category_id='.$testCategoryId
        );
        $expectedArray = $expectedArray[0];

        $category = $this->stub->arrayToObject($expectedArray);

        $this->assertInstanceof('Product\Model\Category', $category);

        //测试翻译器赋值正确
        $this->assertEquals($category->getId(), $expectedArray['category_id']);
        $this->assertEquals($category->getName(), $expectedArray['category_name']);
        $this->assertEquals($category->getCreateTime(), $expectedArray['create_time']);
        $this->assertEquals($category->getParentId(), $expectedArray['parent_id']);
        $this->assertEquals($category->getType(), $expectedArray['type']);
    }

    /**
     * 测试翻译对象转换为数组
     */
    public function testObjectToArray()
    {

        $testCategoryId = 1;
        $expectedArray = Core::$dbDriver->query(
            'SELECT * FROM pcore_product_category WHERE category_id='.$testCategoryId
        );
        $expectedArray = $expectedArray[0];

        $category = new Category($testCategoryId);
        $category->setName($expectedArray['category_name']);
        $category->setCreateTime($expectedArray['create_time']);
        $category->setParentId($expectedArray['parent_id']);
        $category->setType($expectedArray['type']);

        $categoryInfo = $this->stub->objectToArray($category);
        //测试翻译器赋值正确
        $this->assertEquals($expectedArray['category_id'], $categoryInfo['category_id']);
        $this->assertEquals($expectedArray['category_name'], $categoryInfo['category_name']);
        $this->assertEquals($expectedArray['create_time'], $categoryInfo['create_time']);
        $this->assertEquals($expectedArray['parent_id'], $categoryInfo['parent_id']);
        $this->assertEquals($expectedArray['type'], $categoryInfo['type']);
    }
}
