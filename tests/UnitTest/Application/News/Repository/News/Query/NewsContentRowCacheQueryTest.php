<?php
namespace News\Repository\News\Query;

use tests\GenericTestCase;
use Marmot\Core;
  
/**
 * News\Repository\News\Query\NewsContentRowCacheQuery.class.php 测试文件
 * @author chloroplast
 * @version 1.0.20160218
 */
class NewsContentRowCacheQueryTest extends GenericTestCase
{

    private $stub;
    private $tablepre = 'pcore_';

    public function setUp()
    {
        $this->stub = Core::$container->get('News\Repository\News\Query\NewsContentRowCacheQuery');
    }

    /**
     * 测试该文件是否正确的继承RowCacheQuery类
     */
    public function testNewsContentRowCacheQueryCorrectInstanceExtendsRowCacheQuery()
    {
        $this->assertInstanceof('System\Query\RowCacheQuery', $this->stub);
    }

    /**
     * 测试该文件是否正确的初始化primaryKey,并且数据库存在该字段
     */
    public function testNewsContentRowCacheQueryCorrectPrimaryKey()
    {
        $key = $this->getPrivateProperty('News\Repository\News\Query\NewsContentRowCacheQuery', 'primaryKey');

        //判断primaryKey赋值设想一致
        $this->assertEquals('news_id', $key->getValue($this->stub));
        //检查表是否有该字段
        $results = Core::$dbDriver->query(
            'SHOW COLUMNS FROM `'.$this->tablepre.'news` LIKE \''.$key->getValue($this->stub).'\''
        );
        $this->assertNotEmpty($results);//期望检索出表名
    }

    /**
     * 测试是否cache层赋值正确
     */
    public function testNewsContentRowCacheQueryCorrectCacheLayer()
    {
        $cacheLayer = $this->getPrivateProperty('News\Repository\News\Query\NewsContentRowCacheQuery', 'cacheLayer');

        $this->assertInstanceof('News\Persistence\NewsContentCache', $cacheLayer->getValue($this->stub));
    }

    /**
     * 测试是否db层赋值正确
     */
    public function testNewsContentRowCacheQueryCorrectDbLayer()
    {
        $dbLayer = $this->getPrivateProperty('News\Repository\News\Query\NewsContentRowCacheQuery', 'dbLayer');

        $this->assertInstanceof('News\Persistence\NewsContentDb', $dbLayer->getValue($this->stub));
    }
}
