<?php
namespace Inquiry\Translator;

use Inquiry\Model\Inquiry;
use tests\GenericTestsDatabaseTestCase;
use Marmot\Core;

/**
 * Inquiry\Translator\InquiryTranslator.class.php 测试文件
 * @author chloroplast
 * @version 1.0.0:2016.04.18
 */
class InquiryTranslatorTest extends GenericTestsDatabaseTestCase
{

    private $stub;

    public $fixtures = array('pcore_inquiry');

    public function setUp()
    {
        $this->stub = new \Inquiry\Translator\InquiryTranslator();
        parent::setUp();
    }

    /**
     * 测试翻译数组转换对象
     */
    public function testArrayToObject()
    {

        $testInquiryId = 1;
        $expectedArray = Core::$dbDriver->query(
            'SELECT * FROM pcore_inquiry WHERE inquiry_id='.$testInquiryId
        );
        $expectedArray = $expectedArray[0];

        $inquiry = $this->stub->arrayToObject($expectedArray);

        $this->assertInstanceof('Inquiry\Model\Inquiry', $inquiry);

        //测试翻译器赋值正确
        $this->assertEquals($inquiry->getId(), $expectedArray['inquiry_id']);
        $this->assertEquals($inquiry->getTitle(), $expectedArray['title']);
        $this->assertEquals($inquiry->getCreateTime(), $expectedArray['create_time']);
        $this->assertEquals($inquiry->getContent(), $expectedArray['content']);
        $this->assertEquals($inquiry->getEmail(), $expectedArray['email']);
    }

    /**
     * 测试翻译对象转换为数组
     */
    public function testObjectToArray()
    {

        $testInquiryId = 1;
        $expectedArray = Core::$dbDriver->query(
            'SELECT * FROM pcore_inquiry WHERE inquiry_id='.$testInquiryId
        );
        $expectedArray = $expectedArray[0];

        $inquiry = new Inquiry($testInquiryId);
        $inquiry->setTitle($expectedArray['title']);
        $inquiry->setCreateTime($expectedArray['create_time']);
        $inquiry->setContent($expectedArray['content']);
        $inquiry->setEmail($expectedArray['email']);

        $inquiryInfo = $this->stub->objectToArray($inquiry);
        //测试翻译器赋值正确
        $this->assertEquals($expectedArray['inquiry_id'], $inquiryInfo['inquiry_id']);
        $this->assertEquals($expectedArray['title'], $inquiryInfo['title']);
        $this->assertEquals($expectedArray['create_time'], $inquiryInfo['create_time']);
        $this->assertEquals($expectedArray['email'], $inquiryInfo['email']);
        $this->assertEquals($expectedArray['content'], $inquiryInfo['content']);
    }
}
