<?php
namespace Product\Repository\Product\Query;

use tests\GenericTestCase;
use Marmot\Core;
  
/**
 * Product\Repository\Product\Query\ProductRowCacheQuery.class.php 测试文件
 * @author chloroplast
 * @version 1.0.20160218
 */
class ProductRowCacheQueryTest extends GenericTestCase
{

    private $stub;
    private $tablepre = 'pcore_';

    public function setUp()
    {
        $this->stub = Core::$container->get('Product\Repository\Product\Query\ProductRowCacheQuery');
    }

    /**
     * 测试该文件是否正确的继承RowCacheQuery类
     */
    public function testProductRowCacheQueryCorrectInstanceExtendsRowCacheQuery()
    {
        $this->assertInstanceof('System\Query\RowCacheQuery', $this->stub);
    }

    /**
     * 测试该文件是否正确的初始化primaryKey,并且数据库存在该字段
     */
    public function testProductRowCacheQueryCorrectPrimaryKey()
    {
        $key = $this->getPrivateProperty('Product\Repository\Product\Query\ProductRowCacheQuery', 'primaryKey');

        //判断primaryKey赋值设想一致
        $this->assertEquals('product_id', $key->getValue($this->stub));
        //检查表是否有该字段
        $results = Core::$dbDriver->query(
            'SHOW COLUMNS FROM `'.$this->tablepre.'product` LIKE \''.$key->getValue($this->stub).'\''
        );
        $this->assertNotEmpty($results);//期望检索出表名
    }

    /**
     * 测试是否cache层赋值正确
     */
    public function testProductRowCacheQueryCorrectCacheLayer()
    {
        $cacheLayer = $this->getPrivateProperty('Product\Repository\Product\Query\ProductRowCacheQuery', 'cacheLayer');

        $this->assertInstanceof('Product\Persistence\ProductCache', $cacheLayer->getValue($this->stub));
    }

    /**
     * 测试是否db层赋值正确
     */
    public function testProductRowCacheQueryCorrectDbLayer()
    {
        $dbLayer = $this->getPrivateProperty('Product\Repository\Product\Query\ProductRowCacheQuery', 'dbLayer');

        $this->assertInstanceof('Product\Persistence\ProductDb', $dbLayer->getValue($this->stub));
    }
}
