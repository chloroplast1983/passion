<?php
namespace Product\Repository\Category\Query;

use tests\GenericTestCase;
use Marmot\Core;
  
/**
 * Product\Repository\Category\Query\CategoryRowCacheQuery.class.php 测试文件
 * @author chloroplast
 * @version 1.0.20160218
 */
class CategoryRowCacheQueryTest extends GenericTestCase
{

    private $stub;
    private $tablepre = 'pcore_';

    public function setUp()
    {
        $this->stub = Core::$container->get('Product\Repository\Category\Query\CategoryRowCacheQuery');
    }

    /**
     * 测试该文件是否正确的继承RowCacheQuery类
     */
    public function testCategoryRowCacheQueryCorrectInstanceExtendsRowCacheQuery()
    {
        $this->assertInstanceof('System\Query\RowCacheQuery', $this->stub);
    }

    /**
     * 测试该文件是否正确的初始化primaryKey,并且数据库存在该字段
     */
    public function testCategoryRowCacheQueryCorrectPrimaryKey()
    {
        $key = $this->getPrivateProperty('Product\Repository\Category\Query\CategoryRowCacheQuery', 'primaryKey');

        //判断primaryKey赋值设想一致
        $this->assertEquals('category_id', $key->getValue($this->stub));
        //检查表是否有该字段
        $results = Core::$dbDriver->query(
            'SHOW COLUMNS FROM `'.$this->tablepre.'product_category` LIKE \''.$key->getValue($this->stub).'\''
        );
        $this->assertNotEmpty($results);//期望检索出表名
    }

    /**
     * 测试是否cache层赋值正确
     */
    public function testCategoryRowCacheQueryCorrectCacheLayer()
    {
        $cacheLayer = $this->getPrivateProperty(
            'Product\Repository\Category\Query\CategoryRowCacheQuery',
            'cacheLayer'
        );

        $this->assertInstanceof('Product\Persistence\ProductCategoryCache', $cacheLayer->getValue($this->stub));
    }

    /**
     * 测试是否db层赋值正确
     */
    public function testCategoryRowCacheQueryCorrectDbLayer()
    {
        $dbLayer = $this->getPrivateProperty('Product\Repository\Category\Query\CategoryRowCacheQuery', 'dbLayer');

        $this->assertInstanceof('Product\Persistence\ProductCategoryDb', $dbLayer->getValue($this->stub));
    }
}
