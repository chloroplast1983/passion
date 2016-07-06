<?php
namespace Product\Repository\Product\Query;

use tests\GenericTestCase;
use Marmot\Core;
  
/**
 * Product\Repository\Product\Query\ProductContentRowCacheQuery.class.php 测试文件
 * @author chloroplast
 * @version 1.0.20160218
 */
class ProductContentRowCacheQueryTest extends GenericTestCase
{

    private $stub;
    private $tablepre = 'pcore_';

    public function setUp()
    {
        $this->stub = Core::$container->get('Product\Repository\Product\Query\ProductContentRowCacheQuery');
    }

    /**
     * 测试该文件是否正确的继承RowCacheQuery类
     */
    public function testProductContentRowCacheQueryCorrectInstanceExtendsRowCacheQuery()
    {
        $this->assertInstanceof('System\Query\RowCacheQuery', $this->stub);
    }

    /**
     * 测试该文件是否正确的初始化primaryKey,并且数据库存在该字段
     */
    public function testProductContentRowCacheQueryCorrectPrimaryKey()
    {
        $key = $this->getPrivateProperty('Product\Repository\Product\Query\ProductContentRowCacheQuery', 'primaryKey');

        //判断primaryKey赋值设想一致
        $this->assertEquals('product_id', $key->getValue($this->stub));
        //检查表是否有该字段
        $results = Core::$dbDriver->query(
            'SHOW COLUMNS FROM `'.$this->tablepre.'product_content` LIKE \''.$key->getValue($this->stub).'\''
        );
        $this->assertNotEmpty($results);//期望检索出表名
    }

    /**
     * 测试是否cache层赋值正确
     */
    public function testProductContentRowCacheQueryCorrectCacheLayer()
    {
        $cacheLayer = $this->getPrivateProperty(
            'Product\Repository\Product\Query\ProductContentRowCacheQuery',
            'cacheLayer'
        );

        $this->assertInstanceof('Product\Persistence\ProductContentCache', $cacheLayer->getValue($this->stub));
    }

    /**
     * 测试是否db层赋值正确
     */
    public function testProductRowCacheQueryCorrectDbLayer()
    {
        $dbLayer = $this->getPrivateProperty('Product\Repository\Product\Query\ProductContentRowCacheQuery', 'dbLayer');

        $this->assertInstanceof('Product\Persistence\ProductContentDb', $dbLayer->getValue($this->stub));
    }
}
