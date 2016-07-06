<?php
namespace News\Translator;

use News\Model\News;
use tests\GenericTestsDatabaseTestCase;
use Marmot\Core;

/**
 * News\Translator\NewsTranslator.class.php 测试文件
 * @author chloroplast
 * @version 1.0.0:2016.04.18
 */
class NewsTranslatorTest extends GenericTestsDatabaseTestCase
{

    private $stub;

    public $fixtures = array('pcore_news','pcore_news_content');

    public function setUp()
    {
        $this->stub = new \News\Translator\NewsTranslator();
        parent::setUp();
    }

    /**
     * 测试翻译数组转换对象
     */
    public function testArrayToObject()
    {

        $testNewsId = 1;
        $expectedNewsArray = Core::$dbDriver->query(
            'SELECT * FROM pcore_news WHERE news_id='.$testNewsId
        );
        $expectedNewsArray = $expectedNewsArray[0];

        $expectedNewsContentArray = Core::$dbDriver->query(
            'SELECT * FROM pcore_news_content WHERE news_id='.$testNewsId
        );
        $expectedNewsContentArray = $expectedNewsContentArray[0];
        
        $expectedArray = array_merge($expectedNewsArray, $expectedNewsContentArray);

        $news = $this->stub->arrayToObject($expectedArray);

        $this->assertInstanceof('News\Model\News', $news);

        //测试翻译器赋值正确
        $this->assertEquals($news->getId(), $expectedArray['news_id']);
        $this->assertEquals($news->getTitle(), $expectedArray['title']);
        $this->assertEquals($news->getUpdateTime(), $expectedArray['update_time']);
        $this->assertEquals($news->getCreateTime(), $expectedArray['create_time']);
        $this->assertEquals($news->getStatusTime(), $expectedArray['status_time']);
        $this->assertEquals($news->getStatus(), $expectedArray['status']);
        $this->assertEquals($news->getContent(), $expectedArray['content']);
    }

    /**
     * 测试翻译对象转换为数组
     */
    public function testObjectToArray()
    {

        $testNewsId = 1;
        $expectedNewsArray = Core::$dbDriver->query(
            'SELECT * FROM pcore_news WHERE news_id='.$testNewsId
        );
        $expectedNewsArray = $expectedNewsArray[0];

        $expectedNewsContentArray = Core::$dbDriver->query(
            'SELECT * FROM pcore_news_content WHERE news_id='.$testNewsId
        );
        $expectedNewsContentArray = $expectedNewsContentArray[0];
        
        $expectedArray = array_merge($expectedNewsArray, $expectedNewsContentArray);

        $news = new \News\Model\News($testNewsId);
        $news->setTitle($expectedArray['title']);
        $news->setCreateTime($expectedArray['create_time']);
        $news->setUpdateTime($expectedArray['update_time']);
        $news->setStatusTime($expectedArray['status_time']);
        $news->setStatus($expectedArray['status']);
        $news->setContent($expectedArray['content']);
        //测试翻译器赋值正确
        $this->assertEquals($expectedArray['news_id'], $news->getId());
        $this->assertEquals($expectedArray['title'], $news->getTitle());
        $this->assertEquals($expectedArray['update_time'], $news->getUpdateTime());
        $this->assertEquals($expectedArray['create_time'], $news->getCreateTime());
        $this->assertEquals($expectedArray['status_time'], $news->getStatusTime());
        $this->assertEquals($expectedArray['status'], $news->getStatus());
        $this->assertEquals($expectedArray['content'], $news->getContent());
    }
}
