<?php
namespace Common\Persistence;

use tests\GenericTestCase;
use Marmot\Core;

/**
 * Common/Persistence/FileCache.class.php 测试文件
 * @author chloroplast
 * @version 1.0.20160218
 */
class FileCacheTest extends GenericTestCase
{

    private $stub;
    private $tablepre = 'pcore_';

    public function setUp()
    {
        $this->stub = new \Common\Persistence\FileCache();
    }

    /**
     * 测试该文件是否正确的继承cache类
     */
    public function testFileCacheCorrectInstanceExtendsCache()
    {
        $this->assertInstanceof('System\Classes\Cache', $this->stub);
    }

    /**
     * 测试该文件是否正确的初始化key,且和表名一致
     */
    public function testFileCacheCorrectKey()
    {
        $key = $this->getPrivateProperty('Common\Persistence\FileCache', 'key');
        $tableName = $key->getValue($this->stub);
        //判断key赋值设想一致
        $this->assertEquals('file', $tableName);
        //检查是否有相同的表名
        //查询出表名
        $results = Core::$dbDriver->query('SHOW TABLES LIKE \''.$this->tablepre.$tableName.'\'');
        $this->assertNotEmpty($results);//期望检索出表名
    }
}
