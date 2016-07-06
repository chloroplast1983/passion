<?php
namespace Product\Repository\Brand\Query;

use tests\GenericTestCase;
use Marmot\Core;
  
/**
 * Product\Repository\Brand\Query\BrandRowCacheQuery.class.php 测试文件
 * @author chloroplast
 * @version 1.0.20160218
 */
class BrandRowCacheQueryTest extends GenericTestCase
{

    private $stub;
    private $tablepre = 'pcore_';

    public function setUp()
    {
        $this->stub = Core::$container->get('Product\Repository\Brand\Query\BrandRowCacheQuery');
    }

    /**
     * 测试该文件是否正确的继承RowCacheQuery类
     */
    public function testBrandRowCacheQueryCorrectInstanceExtendsRowCacheQuery()
    {
        $this->assertInstanceof('System\Query\RowCacheQuery', $this->stub);
    }

    /**
     * 测试该文件是否正确的初始化primaryKey,并且数据库存在该字段
     */
    public function testBrandRowCacheQueryCorrectPrimaryKey()
    {
        $key = $this->getPrivateProperty('Product\Repository\Brand\Query\BrandRowCacheQuery', 'primaryKey');

        //判断primaryKey赋值设想一致
        $this->assertEquals('brand_id', $key->getValue($this->stub));
        //检查表是否有该字段
        $results = Core::$dbDriver->query(
            'SHOW COLUMNS FROM `'.$this->tablepre.'product_brand` LIKE \''.$key->getValue($this->stub).'\''
        );
        $this->assertNotEmpty($results);//期望检索出表名
    }

    /**
     * 测试是否cache层赋值正确
     */
    public function testBrandRowCacheQueryCorrectCacheLayer()
    {
        $cacheLayer = $this->getPrivateProperty('Product\Repository\Brand\Query\BrandRowCacheQuery', 'cacheLayer');

        $this->assertInstanceof('Product\Persistence\ProductBrandCache', $cacheLayer->getValue($this->stub));
    }

    /**
     * 测试是否db层赋值正确
     */
    public function testBrandRowCacheQueryCorrectDbLayer()
    {
        $dbLayer = $this->getPrivateProperty('Product\Repository\Brand\Query\BrandRowCacheQuery', 'dbLayer');

        $this->assertInstanceof('Product\Persistence\ProductBrandDb', $dbLayer->getValue($this->stub));
    }
}
