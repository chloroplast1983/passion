<?php
namespace Product\Model;

use tests;

/**
 * \Product\Model\Brandclass.php 测试文件
 * @author chloroplast
 * @version 1.0.0:2016.07.03
 */

class BrandTest extends tests\GenericTestCase
{
    private $stub;

    public function setUp()
    {
        $this->stub = new Brand();
    }

    /**
     * Brand 商品品牌领域对象, 测试构造函数
     */
    public function testBrandConstructor()
    {
        //测试初始化品牌id
        $idParameter = $this->getPrivateProperty('\Product\Model\Brand', 'id');
        $this->assertEquals(0, $idParameter->getValue($this->stub));

        //测试初始化品牌名称
        $nameParameter = $this->getPrivateProperty('\Product\Model\Brand', 'name');
        $this->assertEmpty($nameParameter->getValue($this->stub));

        //测试初始化新闻发布时间
        $createTimeParameter = $this->getPrivateProperty('\Product\Model\Brand', 'createTime');
        $this->assertGreaterThan(0, $createTimeParameter->getValue($this->stub));

        //测试初始化新闻更新时间
        $updateTimeParameter = $this->getPrivateProperty('\Product\Model\Brand', 'updateTime');
        $this->assertGreaterThan(0, $updateTimeParameter->getValue($this->stub));

        //测试初始化新闻状态更新时间
        $statusTimeParameter = $this->getPrivateProperty('\Product\Model\Brand', 'statusTime');
        $this->assertGreaterThan(0, $statusTimeParameter->getValue($this->stub));

        //测试初始化新闻状态
        $statusParameter = $this->getPrivateProperty('\Product\Model\Brand', 'status');
        $this->assertEquals(STATUS_NORMAL, $statusParameter->getValue($this->stub));

    }

    //id 测试 ---------------------------------------------------------- start
    /**
     * 设置 Brand setId() 正确的传参类型, 期望传值正确
     */
    public function testSetIdCorrectType()
    {
        $this->stub->setId(1);
        $this->assertEquals(1, $this->stub->getId());
    }

    /**
     * 设置 Brand setId() 错误的传参类型, 期望期望抛出TypeError exception
     *
     * @expectedException TypeError
     */
    public function testSetIdWrongType()
    {
        $this->stub->setId('string');
    }

    /**
     * 设置 Brand setId() 错误的传参类型.但是传参是数值, 期望返回类型正确, 值正确.
     */
    public function testSetIdWrongTypeButNumeric()
    {
        $this->stub->setId('1');
        $this->assertTrue(is_int($this->stub->getId()));
        $this->assertEquals(1, $this->stub->getId());
    }
    //id 测试 ----------------------------------------------------------   end
    //name 测试 -------------------------------------------------------- start
    /**
     * 设置 Brand setName() 正确的传参类型, 期望传值正确
     */
    public function testSetNameCorrectType()
    {
        $this->stub->setName('string');
        $this->assertEquals('string', $this->stub->getName());
    }

    /**
     * 设置 Brand setName() 错误的传参类型, 期望期望抛出TypeError exception
     *
     * @expectedException TypeError
     */
    public function testSetNameWrongType()
    {
        $this->stub->setName(array(1, 2, 3));
    }
    //name 测试 --------------------------------------------------------   end
    //createTime 测试 -------------------------------------------------- start
    /**
     * 设置 Brand setCreateTime() 正确的传参类型, 期望传值正确
     */
    public function testSetCreateTimeCorrectType()
    {
        $this->stub->setCreateTime(1467538004);
        $this->assertEquals(1467538004, $this->stub->getCreateTime());
    }

    /**
     * 设置 Brand setCreateTime() 错误的传参类型, 期望期望抛出TypeError exception
     *
     * @expectedException TypeError
     */
    public function testSetCreateTimeWrongType()
    {
        $this->stub->setCreateTime('string');
    }

    /**
     * 设置 Brand setCreateTime() 错误的传参类型.但是传参是数值, 期望返回类型正确, 值正确.
     */
    public function testSetCreateTimeWrongTypeButNumeric()
    {
        $this->stub->setCreateTime('1467538004');
        $this->assertTrue(is_int($this->stub->getCreateTime()));
        $this->assertEquals(1467538004, $this->stub->getCreateTime());
    }
    //createTime 测试 --------------------------------------------------   end
    //updateTime 测试 -------------------------------------------------- start
    /**
     * 设置 Brand setUpdateTime() 正确的传参类型, 期望传值正确
     */
    public function testSetUpdateTimeCorrectType()
    {
        $this->stub->setUpdateTime(1467538004);
        $this->assertEquals(1467538004, $this->stub->getUpdateTime());
    }

    /**
     * 设置 Brand setUpdateTime() 错误的传参类型, 期望期望抛出TypeError exception
     *
     * @expectedException TypeError
     */
    public function testSetUpdateTimeWrongType()
    {
        $this->stub->setUpdateTime('string');
    }

    /**
     * 设置 Brand setUpdateTime() 错误的传参类型.但是传参是数值, 期望返回类型正确, 值正确.
     */
    public function testSetUpdateTimeWrongTypeButNumeric()
    {
        $this->stub->setUpdateTime('1467538004');
        $this->assertTrue(is_int($this->stub->getUpdateTime()));
        $this->assertEquals(1467538004, $this->stub->getUpdateTime());
    }
    //updateTime 测试 --------------------------------------------------   end
    //statusTime 测试 -------------------------------------------------- start
    /**
     * 设置 Brand setStatusTime() 正确的传参类型, 期望传值正确
     */
    public function testSetStatusTimeCorrectType()
    {
        $this->stub->setStatusTime(1467538004);
        $this->assertEquals(1467538004, $this->stub->getStatusTime());
    }

    /**
     * 设置 Brand setStatusTime() 错误的传参类型, 期望期望抛出TypeError exception
     *
     * @expectedException TypeError
     */
    public function testSetStatusTimeWrongType()
    {
        $this->stub->setStatusTime('string');
    }

    /**
     * 设置 Brand setStatusTime() 错误的传参类型.但是传参是数值, 期望返回类型正确, 值正确.
     */
    public function testSetStatusTimeWrongTypeButNumeric()
    {
        $this->stub->setStatusTime('1467538004');
        $this->assertTrue(is_int($this->stub->getStatusTime()));
        $this->assertEquals(1467538004, $this->stub->getStatusTime());
    }
    //statusTime 测试 --------------------------------------------------   end
    //status 测试 ------------------------------------------------------ start
    /**
     * 循环测试 Brand setStatus() 是否符合预定范围
     *
     * @dataProvider statusProvider
     */
    public function testSetStatus($actual, $expected)
    {
        $this->stub->setStatus($actual);
        $this->assertEquals($expected, $this->stub->getStatus());
    }

    /**
     * 循环测试 Brand setStatus() 数据构建器
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
     * 设置 Brand setStatus() 错误的传参类型, 期望期望抛出TypeError exception
     *
     * @expectedException TypeError
     */
    public function testSetStatusWrongType()
    {
        $this->stub->setStatus('string');
    }
    //status 测试 ------------------------------------------------------   end
}
