<?php
namespace Product\Persistence;

use tests\GenericTestCase;
use Marmot\Core;

/**
 * Product/Persistence/ProductCache.class.php 测试文件
 * @author chloroplast
 * @version 1.0.20160218
 */
class ProductCacheTest extends GenericTestCase
{

    private $stub;
    private $tablepre = 'pcore_';

    public function setUp()
    {
        $this->stub = new \Product\Persistence\ProductCache();
    }

    /**
     * 测试该文件是否正确的继承cache类
     */
    public function testProductCacheCorrectInstanceExtendsCache()
    {
        $this->assertInstanceof('System\Classes\Cache', $this->stub);
    }

    /**
     * 测试该文件是否正确的初始化key,且和表名一致
     */
    public function testProductCacheCorrectKey()
    {
        $key = $this->getPrivateProperty('Product\Persistence\ProductCache', 'key');
        $tableName = $key->getValue($this->stub);
        //判断key赋值设想一致
        $this->assertEquals('product', $tableName);
        //检查是否有相同的表名
        //查询出表名
        $results = Core::$dbDriver->query('SHOW TABLES LIKE \''.$this->tablepre.$tableName.'\'');
        $this->assertNotEmpty($results);//期望检索出表名
    }
}
