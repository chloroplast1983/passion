<?php
namespace Inquiry\Repository\Inquiry\Query;

use tests\GenericTestCase;
use Marmot\Core;
  
/**
 * Inquiry\Repository\Inquiry\Query\InquiryRowCacheQuery.class.php 测试文件
 * @author chloroplast
 * @version 1.0.20160218
 */
class InquiryRowCacheQueryTest extends GenericTestCase
{

    private $stub;
    private $tablepre = 'pcore_';

    public function setUp()
    {
        $this->stub = Core::$container->get('Inquiry\Repository\Inquiry\Query\InquiryRowCacheQuery');
    }

    /**
     * 测试该文件是否正确的继承RowCacheQuery类
     */
    public function testInquiryRowCacheQueryCorrectInstanceExtendsRowCacheQuery()
    {
        $this->assertInstanceof('System\Query\RowCacheQuery', $this->stub);
    }

    /**
     * 测试该文件是否正确的初始化primaryKey,并且数据库存在该字段
     */
    public function testInquiryRowCacheQueryCorrectPrimaryKey()
    {
        $key = $this->getPrivateProperty('Inquiry\Repository\Inquiry\Query\InquiryRowCacheQuery', 'primaryKey');

        //判断primaryKey赋值设想一致
        $this->assertEquals('inquiry_id', $key->getValue($this->stub));
        //检查表是否有该字段
        $results = Core::$dbDriver->query(
            'SHOW COLUMNS FROM `'.$this->tablepre.'inquiry` LIKE \''.$key->getValue($this->stub).'\''
        );
        $this->assertNotEmpty($results);//期望检索出表名
    }

    /**
     * 测试是否cache层赋值正确
     */
    public function testInquiryRowCacheQueryCorrectCacheLayer()
    {
        $cacheLayer = $this->getPrivateProperty('Inquiry\Repository\Inquiry\Query\InquiryRowCacheQuery', 'cacheLayer');

        $this->assertInstanceof('Inquiry\Persistence\InquiryCache', $cacheLayer->getValue($this->stub));
    }

    /**
     * 测试是否db层赋值正确
     */
    public function testInquiryRowCacheQueryCorrectDbLayer()
    {
        $dbLayer = $this->getPrivateProperty('Inquiry\Repository\Inquiry\Query\InquiryRowCacheQuery', 'dbLayer');

        $this->assertInstanceof('Inquiry\Persistence\InquiryDb', $dbLayer->getValue($this->stub));
    }
}
