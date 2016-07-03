<?php
namespace News\Model;

use tests;

/**
 * \News\Model\Newsclass.php 测试文件
 * @author chloroplast
 * @version 1.0.0:2016.07.03
 */

class NewsTest extends tests\GenericTestCase
{
    private $stub;

    public function setUp()
    {
        $this->stub = new News();
    }

    /**
     * News 新闻领域对象, 测试构造函数
     */
    public function testNewsConstructor()
    {
        //测试初始化新闻id
        $idParameter = $this->getPrivateProperty('\News\Model\News', 'id');
        $this->assertEquals(0, $idParameter->getValue($this->stub));

        //测试初始化标题
        $titleParameter = $this->getPrivateProperty('\News\Model\News', 'title');
        $this->assertEmpty($titleParameter->getValue($this->stub));

        //测试初始化内容
        $contentParameter = $this->getPrivateProperty('\News\Model\News', 'content');
        $this->assertEmpty($contentParameter->getValue($this->stub));

        //测试初始化新闻发布时间
        $createTimeParameter = $this->getPrivateProperty('\News\Model\News', 'createTime');
        $this->assertGreaterThan(0, $createTimeParameter->getValue($this->stub));

        //测试初始化新闻更新时间
        $updateTimeParameter = $this->getPrivateProperty('\News\Model\News', 'updateTime');
        $this->assertGreaterThan(0, $updateTimeParameter->getValue($this->stub));

        //测试初始化新闻状态更新时间
        $statusTimeParameter = $this->getPrivateProperty('\News\Model\News', 'statusTime');
        $this->assertGreaterThan(0, $statusTimeParameter->getValue($this->stub));

        //测试初始化新闻状态
        $statusParameter = $this->getPrivateProperty('\News\Model\News', 'status');
        $this->assertEquals(STATUS_NORMAL, $statusParameter->getValue($this->stub));

    }

    //id 测试 ---------------------------------------------------------- start
    /**
     * 设置 News setId() 正确的传参类型, 期望传值正确
     */
    public function testSetIdCorrectType()
    {
        $this->stub->setId(1);
        $this->assertEquals(1, $this->stub->getId());
    }

    /**
     * 设置 News setId() 错误的传参类型, 期望期望抛出TypeError exception
     *
     * @expectedException TypeError
     */
    public function testSetIdWrongType()
    {
        $this->stub->setId('string');
    }

    /**
     * 设置 News setId() 错误的传参类型.但是传参是数值, 期望返回类型正确, 值正确.
     */
    public function testSetIdWrongTypeButNumeric()
    {
        $this->stub->setId('1');
        $this->assertTrue(is_int($this->stub->getId()));
        $this->assertEquals(1, $this->stub->getId());
    }
    //id 测试 ----------------------------------------------------------   end
    //title 测试 ------------------------------------------------------- start
    /**
     * 设置 News setTitle() 正确的传参类型, 期望传值正确
     */
    public function testSetTitleCorrectType()
    {
        $this->stub->setTitle('string');
        $this->assertEquals('string', $this->stub->getTitle());
    }

    /**
     * 设置 News setTitle() 错误的传参类型, 期望期望抛出TypeError exception
     *
     * @expectedException TypeError
     */
    public function testSetTitleWrongType()
    {
        $this->stub->setTitle(array(1, 2, 3));
    }
    //title 测试 -------------------------------------------------------   end
    //content 测试 ----------------------------------------------------- start
    /**
     * 设置 News setContent() 正确的传参类型, 期望传值正确
     */
    public function testSetContentCorrectType()
    {
        $this->stub->setContent('string');
        $this->assertEquals('string', $this->stub->getContent());
    }

    /**
     * 设置 News setContent() 错误的传参类型, 期望期望抛出TypeError exception
     *
     * @expectedException TypeError
     */
    public function testSetContentWrongType()
    {
        $this->stub->setContent(array(1, 2, 3));
    }
    //content 测试 -----------------------------------------------------   end
    //createTime 测试 -------------------------------------------------- start
    /**
     * 设置 News setCreateTime() 正确的传参类型, 期望传值正确
     */
    public function testSetCreateTimeCorrectType()
    {
        $this->stub->setCreateTime(1467536403);
        $this->assertEquals(1467536403, $this->stub->getCreateTime());
    }

    /**
     * 设置 News setCreateTime() 错误的传参类型, 期望期望抛出TypeError exception
     *
     * @expectedException TypeError
     */
    public function testSetCreateTimeWrongType()
    {
        $this->stub->setCreateTime('string');
    }

    /**
     * 设置 News setCreateTime() 错误的传参类型.但是传参是数值, 期望返回类型正确, 值正确.
     */
    public function testSetCreateTimeWrongTypeButNumeric()
    {
        $this->stub->setCreateTime('1467536403');
        $this->assertTrue(is_int($this->stub->getCreateTime()));
        $this->assertEquals(1467536403, $this->stub->getCreateTime());
    }
    //createTime 测试 --------------------------------------------------   end
    //updateTime 测试 -------------------------------------------------- start
    /**
     * 设置 News setUpdateTime() 正确的传参类型, 期望传值正确
     */
    public function testSetUpdateTimeCorrectType()
    {
        $this->stub->setUpdateTime(1467536403);
        $this->assertEquals(1467536403, $this->stub->getUpdateTime());
    }

    /**
     * 设置 News setUpdateTime() 错误的传参类型, 期望期望抛出TypeError exception
     *
     * @expectedException TypeError
     */
    public function testSetUpdateTimeWrongType()
    {
        $this->stub->setUpdateTime('string');
    }

    /**
     * 设置 News setUpdateTime() 错误的传参类型.但是传参是数值, 期望返回类型正确, 值正确.
     */
    public function testSetUpdateTimeWrongTypeButNumeric()
    {
        $this->stub->setUpdateTime('1467536403');
        $this->assertTrue(is_int($this->stub->getUpdateTime()));
        $this->assertEquals(1467536403, $this->stub->getUpdateTime());
    }
    //updateTime 测试 --------------------------------------------------   end
    //statusTime 测试 -------------------------------------------------- start
    /**
     * 设置 News setStatusTime() 正确的传参类型, 期望传值正确
     */
    public function testSetStatusTimeCorrectType()
    {
        $this->stub->setStatusTime(1467536403);
        $this->assertEquals(1467536403, $this->stub->getStatusTime());
    }

    /**
     * 设置 News setStatusTime() 错误的传参类型, 期望期望抛出TypeError exception
     *
     * @expectedException TypeError
     */
    public function testSetStatusTimeWrongType()
    {
        $this->stub->setStatusTime('string');
    }

    /**
     * 设置 News setStatusTime() 错误的传参类型.但是传参是数值, 期望返回类型正确, 值正确.
     */
    public function testSetStatusTimeWrongTypeButNumeric()
    {
        $this->stub->setStatusTime('1467536403');
        $this->assertTrue(is_int($this->stub->getStatusTime()));
        $this->assertEquals(1467536403, $this->stub->getStatusTime());
    }
    //statusTime 测试 --------------------------------------------------   end
    //status 测试 ------------------------------------------------------ start
    /**
     * 循环测试 News setStatus() 是否符合预定范围
     *
     * @dataProvider statusProvider
     */
    public function testSetStatus($actual, $expected)
    {
        $this->stub->setStatus($actual);
        $this->assertEquals($expected, $this->stub->getStatus());
    }

    /**
     * 循环测试 News setStatus() 数据构建器
     */
    public function statusProvider()
    {
        return [
            [STATUS_NORMAL,STATUS_NORMAL],
            [STATUS_DELETE,STATUS_DELETE],
            [9999,STATUS_NORMAL],
        ];
    }

    /**
     * 设置 News setStatus() 错误的传参类型, 期望期望抛出TypeError exception
     *
     * @expectedException TypeError
     */
    public function testSetStatusWrongType()
    {
        $this->stub->setStatus('string');
    }
    //status 测试 ------------------------------------------------------   end
}
