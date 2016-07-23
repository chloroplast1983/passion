<?php
namespace Inquiry\Repository\Inquiry;

use tests\GenericTestsDatabaseTestCase;
use Marmot\Core;
use Inquiry\Model\Inquiry;

/**
 * Inquiry/Repository/Inquiry/InquiryRepository.class.php 测试文件
 * @author chloroplast
 * @version 1.0.20160218
 */
class InquiryRepositoryTest extends GenericTestsDatabaseTestCase
{

    public $fixtures = array(
        'pcore_inquiry',
        'pcore_product',
        'pcore_product_content',
        'pcore_product_brand',
        'pcore_product_category',
        'pcore_file',
        );

    private $stub;

    public function setUp()
    {
        $this->stub = Core::$container->get('Inquiry\Repository\Inquiry\InquiryRepository');

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
    public function testInquiryRepositoryConstructor()
    {

        //测试RowCacheQuery构造成功
        $inquiryRowCacheQuery = $this->getPrivateProperty(
            'Inquiry\Repository\Inquiry\InquiryRepository',
            'inquiryRowCacheQuery'
        );
        $this->assertInstanceOf(
            'Inquiry\Repository\Inquiry\Query\InquiryRowCacheQuery',
            $inquiryRowCacheQuery->getValue($this->stub)
        );
    }

    /**
     * 测试仓库add
     */
    public function testInquiryRepositoryAdd()
    {
        //初始化Application
        $inquiry = new Inquiry();
        $inquiry->setName('name');
        $inquiry->setEmail('41893204@qq.com');
        $inquiry->setContent('content');

        $result = $this->stub->add($inquiry);
        //期望返回true
        $this->assertTrue($result);

        //确认主键id赋值成功
        $this->assertGreaterThan(0, $inquiry->getId());

        //查询数据库,确认数据插入成功
        $expectedArray = Core::$dbDriver->query('SELECT * FROM pcore_inquiry WHERE inquiry_id='.$inquiry->getId());
        $expectedArray = $expectedArray[0];
        $this->assertEquals($expectedArray['inquiry_id'], $inquiry->getId());
        $this->assertEquals($expectedArray['name'], $inquiry->getName());
        $this->assertEquals($expectedArray['create_time'], $inquiry->getCreateTime());
        $this->assertEquals($expectedArray['email'], $inquiry->getEmail());
        $this->assertEquals($expectedArray['content'], $inquiry->getContent());
    }

    /**
     * 测试仓库save
     */
    public function testInquiryRepositoryUpdate()
    {
        $testInquiryId = 1;
        //查询旧数据,确认修改前状态
        $oldArray = Core::$dbDriver->query('SELECT * FROM pcore_inquiry WHERE inquiry_id ='.$testInquiryId);
        $this->assertNotEmpty($oldArray);//确认我们已经构建数据
        $oldArray = $oldArray[0];

        $inquiry = new Inquiry($testInquiryId);
        $inquiry->setName($oldArray['name'].'Modified');

        $modifiedEmail = '111111@qq.com';//我们待测试邮件地址
        //断言和旧数据的邮件地址不一样
        $this->assertNotEquals($oldArray['email'], $modifiedEmail);
        $inquiry->setEmail($modifiedEmail);

        $inquiry->setContent($oldArray['content'].'Modified');

        //确认旧数据和新数据不一致
        $this->assertEquals($oldArray['inquiry_id'], $inquiry->getId());
        $this->assertNotEquals($oldArray['name'], $inquiry->getName());
        $this->assertNotEquals($oldArray['create_time'], $inquiry->getCreateTime());
        $this->assertNotEquals($oldArray['email'], $inquiry->getEmail());
        $this->assertNotEquals($oldArray['content'], $inquiry->getContent());

        $result = $this->stub->update($inquiry);
        //期望返回true
        $this->assertTrue($result);

         //查询数据库,确认数据修改成功
        $expectedArray = Core::$dbDriver->query('SELECT * FROM pcore_inquiry WHERE inquiry_id='.$testInquiryId);
        $expectedArray = $expectedArray[0];
        $this->assertEquals($expectedArray['inquiry_id'], $inquiry->getId());
        $this->assertEquals($expectedArray['name'], $inquiry->getName());
        $this->assertEquals($expectedArray['create_time'], $inquiry->getCreateTime());
        $this->assertEquals($expectedArray['email'], $inquiry->getEmail());
        $this->assertEquals($expectedArray['content'], $inquiry->getContent());
    }

    /**
     * 测试仓库获取单独数据
     *
     */
    public function testInquiryRepositoryGetOne()
    {
        
        //测试询价id
        $testInquiryId = 1;

        //期待数组
        $expectedArray = Core::$dbDriver->query('SELECT * FROM pcore_inquiry WHERE inquiry_id='.$testInquiryId);
        $expectedArray = $expectedArray[0];

        $inquiry = $this->stub->getOne($testInquiryId);

        $this->assertInstanceOf('Inquiry\Model\Inquiry', $inquiry);
        $this->assertEquals($expectedArray['inquiry_id'], $inquiry->getId());
        $this->assertEquals($expectedArray['name'], $inquiry->getName());
        $this->assertEquals($expectedArray['create_time'], $inquiry->getCreateTime());
        $this->assertEquals($expectedArray['email'], $inquiry->getEmail());
        $this->assertEquals($expectedArray['content'], $inquiry->getContent());
    }

    /**
     * 测试仓库获取批量数据
     */
    public function testInquiryRepositoryGetList()
    {
        
        //测试询价id
        $testInquiryIds = array(1,2);

        $expectedArrayList = Core::$dbDriver->query(
            'SELECT * FROM pcore_inquiry WHERE inquiry_id IN ('.implode(',', $testInquiryIds).')'
        );
        
        $inquiryList = $this->stub->getList($testInquiryIds);

        foreach ($expectedArrayList as $key => $expectedArray) {
            $inquiry = $inquiryList[$key];

            $this->assertInstanceOf('Inquiry\Model\Inquiry', $inquiry);
            $this->assertEquals($expectedArray['inquiry_id'], $inquiry->getId());
            $this->assertEquals($expectedArray['name'], $inquiry->getName());
            $this->assertEquals($expectedArray['create_time'], $inquiry->getCreateTime());
            $this->assertEquals($expectedArray['email'], $inquiry->getEmail());
            $this->assertEquals($expectedArray['content'], $inquiry->getContent());
        }
    }
}
