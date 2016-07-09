<?php
namespace News\Repository\News;

use tests\GenericTestsDatabaseTestCase;
use Marmot\Core;
use News\Model\News;

/**
 * News/Repository/News/NewsRepository.class.php 测试文件
 * @author chloroplast
 * @version 1.0.20160218
 */
class NewsRepositoryTest extends GenericTestsDatabaseTestCase
{

    public $fixtures = array('pcore_news','pcore_news_content');

    private $stub;

    public function setUp()
    {
        $this->stub = Core::$container->get('News\Repository\News\NewsRepository');

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
    public function testNewsRepositoryConstructor()
    {

        //测试RowCacheQuery构造成功
        $newsRowCacheQuery = $this->getPrivateProperty(
            'News\Repository\News\NewsRepository',
            'newsRowCacheQuery'
        );
        $this->assertInstanceOf(
            'News\Repository\News\Query\NewsRowCacheQuery',
            $newsRowCacheQuery->getValue($this->stub)
        );
    }

    /**
     * 测试仓库add
     */
    public function testNewsRepositoryAdd()
    {
        //初始化Application
        $news = new News();
        $news->setTitle('title');
        $news->setContent('content');

        $result = $this->stub->add($news);
        
        //期望返回true
        $this->assertTrue($result);

        //确认主键id赋值成功
        $this->assertGreaterThan(0, $news->getId());

        $expectedArray = $expectedContentArray = array();
        //查询数据库,确认数据插入成功
        $expectedArray = Core::$dbDriver->query('SELECT * FROM pcore_news WHERE news_id='.$news->getId());
        $expectedArray = $expectedArray[0];

        $expectedContentArray = Core::$dbDriver->query(
            'SELECT * FROM pcore_news_content WHERE news_id='.$news->getId()
        );
        $expectedContentArray = $expectedContentArray[0];

        $expectedArray = array_merge($expectedArray, $expectedContentArray);

        $this->assertEquals($expectedArray['news_id'], $news->getId());
        $this->assertEquals($expectedArray['title'], $news->getTitle());
        $this->assertEquals($expectedArray['create_time'], $news->getCreateTime());
        $this->assertEquals($expectedArray['update_time'], $news->getUpdateTime());
        $this->assertEquals($expectedArray['status_time'], $news->getStatusTime());
        $this->assertEquals($expectedArray['status'], $news->getStatus());
        $this->assertEquals($expectedArray['content'], $news->getContent());
    }

    /**
     * 测试仓库save
     */
    public function testNewsRepositoryUpdate()
    {
        $testNewsId = 1;
        //查询旧数据,确认修改前状态
        $oldArray = Core::$dbDriver->query('SELECT * FROM pcore_News WHERE News_id ='.$testNewsId);
        $this->assertNotEmpty($oldArray);//确认我们已经构建数据
        $oldArray = $oldArray[0];

        $news = new News($testNewsId);
        $news->setTitle($oldArray['title'].'Modified');
        $news->setContent($oldArray['content'].'Modified');
        $news->setStatus(STATUS_DELETE);

        //确认旧数据和新数据不一致
        $this->assertEquals($oldArray['news_id'], $news->getId());
        $this->assertNotEquals($oldArray['title'], $news->getTitle());
        $this->assertNotEquals($oldArray['create_time'], $news->getCreateTime());
        $this->assertNotEquals($oldArray['update_time'], $news->getUpdateTime());
        $this->assertNotEquals($oldArray['status_time'], $news->getStatusTime());
        $this->assertNotEquals($oldArray['status'], $news->getStatus());
        $this->assertNotEquals($oldArray['content'], $news->getContent());

        $result = $this->stub->update($news);
        //期望返回true
        $this->assertTrue($result);

         //查询数据库,确认数据修改成功
        $expectedArray = Core::$dbDriver->query('SELECT * FROM pcore_news WHERE news_id='.$testNewsId);
        $expectedArray = $expectedArray[0];

        $expectedContentArray = Core::$dbDriver->query(
            'SELECT * FROM pcore_news_content WHERE news_id='.$news->getId()
        );
        $expectedContentArray = $expectedContentArray[0];

        $expectedArray = array_merge($expectedArray, $expectedContentArray);

        $this->assertEquals($expectedArray['news_id'], $news->getId());
        $this->assertEquals($expectedArray['title'], $news->getTitle());
        $this->assertEquals($expectedArray['create_time'], $news->getCreateTime());
        $this->assertEquals($expectedArray['update_time'], $news->getUpdateTime());
        $this->assertEquals($expectedArray['status_time'], $news->getStatusTime());
        $this->assertEquals($expectedArray['status'], $news->getStatus());
        $this->assertEquals($expectedArray['content'], $news->getContent());
    }

    /**
     * 测试仓库获取单独数据
     *
     */
    public function testNewsRepositoryGetOne()
    {
        
        //测试询价id
        $testNewsId = 1;

        //期待数组
        $expectedArray = Core::$dbDriver->query('SELECT * FROM pcore_news WHERE news_id='.$testNewsId);
        $expectedArray = $expectedArray[0];

        $news = $this->stub->getOne($testNewsId);

        $this->assertInstanceOf('News\Model\News', $news);
        $this->assertEquals($expectedArray['news_id'], $news->getId());
        $this->assertEquals($expectedArray['title'], $news->getTitle());
        $this->assertEquals($expectedArray['create_time'], $news->getCreateTime());
        $this->assertEquals($expectedArray['update_time'], $news->getUpdateTime());
        $this->assertEquals($expectedArray['status_time'], $news->getStatusTime());
        $this->assertEquals($expectedArray['status'], $news->getStatus());
        $this->assertEquals($expectedArray['content'], $news->getContent());
    }

    /**
     * 测试仓库获取批量数据
     */
    public function testNewsRepositoryGetList()
    {
        
        //测试询价id
        $testNewsIds = array(1,2);

        $expectedArrayList = Core::$dbDriver->query(
            'SELECT * FROM pcore_news WHERE news_id IN ('.implode(',', $testNewsIds).')'
        );
        
        $newsList = $this->stub->getList($testNewsIds);

        foreach ($expectedArrayList as $key => $expectedArray) {
            $news = $newsList[$key];

            $this->assertInstanceOf('News\Model\News', $news);
            $this->assertEquals($expectedArray['news_id'], $news->getId());
            $this->assertEquals($expectedArray['title'], $news->getTitle());
            $this->assertEquals($expectedArray['create_time'], $news->getCreateTime());
            $this->assertEquals($expectedArray['update_time'], $news->getUpdateTime());
            $this->assertEquals($expectedArray['status_time'], $news->getStatusTime());
            $this->assertEquals($expectedArray['status'], $news->getStatus());
            $this->assertEquals($expectedArray['content'], $news->getContent());
        }
    }
}
