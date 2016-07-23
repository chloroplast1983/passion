<?php
namespace Inquiry\Model;

use tests;

/**
 * \Inquiry\Model\Inquiryclass.php 测试文件
 * @author chloroplast
 * @version 1.0.0:2016.07.03
 */

class InquiryTest extends tests\GenericTestCase
{
    private $stub;

    public function setUp()
    {
        $this->stub = new Inquiry();
    }

    /**
     * Inquiry 询价领域对象, 测试构造函数
     */
    public function testInquiryConstructor()
    {
        //测试初始化询价id
        $idParameter = $this->getPrivateProperty('\Inquiry\Model\Inquiry', 'id');
        $this->assertEquals(0, $idParameter->getValue($this->stub));

        //测试初始化标题
        $nameParameter = $this->getPrivateProperty('\Inquiry\Model\Inquiry', 'name');
        $this->assertEmpty($nameParameter->getValue($this->stub));

        //测试初始化内容
        $contentParameter = $this->getPrivateProperty('\Inquiry\Model\Inquiry', 'content');
        $this->assertEmpty($contentParameter->getValue($this->stub));

        //测试初始化新闻发布时间
        $createTimeParameter = $this->getPrivateProperty('\Inquiry\Model\Inquiry', 'createTime');
        $this->assertGreaterThan(0, $createTimeParameter->getValue($this->stub));

        //测试初始化新闻更新时间
        $updateTimeParameter = $this->getPrivateProperty('\Inquiry\Model\Inquiry', 'updateTime');
        $this->assertGreaterThan(0, $updateTimeParameter->getValue($this->stub));
    }

    //id 测试 ---------------------------------------------------------- start
    /**
     * 设置 Inquiry setId() 正确的传参类型, 期望传值正确
     */
    public function testSetIdCorrectType()
    {
        $this->stub->setId(1);
        $this->assertEquals(1, $this->stub->getId());
    }

    /**
     * 设置 Inquiry setId() 错误的传参类型, 期望期望抛出TypeError exception
     *
     * @expectedException TypeError
     */
    public function testSetIdWrongType()
    {
        $this->stub->setId('string');
    }

    /**
     * 设置 Inquiry setId() 错误的传参类型.但是传参是数值, 期望返回类型正确, 值正确.
     */
    public function testSetIdWrongTypeButNumeric()
    {
        $this->stub->setId('1');
        $this->assertTrue(is_int($this->stub->getId()));
        $this->assertEquals(1, $this->stub->getId());
    }
    //id 测试 ----------------------------------------------------------   end
    //name 测试 ------------------------------------------------------- start
    /**
     * 设置 Inquiry setName() 正确的传参类型, 期望传值正确
     */
    public function testSetNameCorrectType()
    {
        $this->stub->setName('string');
        $this->assertEquals('string', $this->stub->getName());
    }

    /**
     * 设置 Inquiry setName() 错误的传参类型, 期望期望抛出TypeError exception
     *
     * @expectedException TypeError
     */
    public function testSetNameWrongType()
    {
        $this->stub->setName(array(1, 2, 3));
    }
    //name 测试 -------------------------------------------------------   end
    //content 测试 ----------------------------------------------------- start
    /**
     * 设置 Inquiry setContent() 正确的传参类型, 期望传值正确
     */
    public function testSetContentCorrectType()
    {
        $this->stub->setContent('string');
        $this->assertEquals('string', $this->stub->getContent());
    }

    /**
     * 设置 Inquiry setContent() 错误的传参类型, 期望期望抛出TypeError exception
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
     * 设置 Inquiry setCreateTime() 正确的传参类型, 期望传值正确
     */
    public function testSetCreateTimeCorrectType()
    {
        $this->stub->setCreateTime(1467538389);
        $this->assertEquals(1467538389, $this->stub->getCreateTime());
    }

    /**
     * 设置 Inquiry setCreateTime() 错误的传参类型, 期望期望抛出TypeError exception
     *
     * @expectedException TypeError
     */
    public function testSetCreateTimeWrongType()
    {
        $this->stub->setCreateTime('string');
    }

    /**
     * 设置 Inquiry setCreateTime() 错误的传参类型.但是传参是数值, 期望返回类型正确, 值正确.
     */
    public function testSetCreateTimeWrongTypeButNumeric()
    {
        $this->stub->setCreateTime('1467538389');
        $this->assertTrue(is_int($this->stub->getCreateTime()));
        $this->assertEquals(1467538389, $this->stub->getCreateTime());
    }
    //createTime 测试 --------------------------------------------------   end
    //updateTime 测试 -------------------------------------------------- start
    /**
     * 设置 Inquiry setUpdateTime() 正确的传参类型, 期望传值正确
     */
    public function testSetUpdateTimeCorrectType()
    {
        $this->stub->setUpdateTime(1467538389);
        $this->assertEquals(1467538389, $this->stub->getUpdateTime());
    }

    /**
     * 设置 Inquiry setUpdateTime() 错误的传参类型, 期望期望抛出TypeError exception
     *
     * @expectedException TypeError
     */
    public function testSetUpdateTimeWrongType()
    {
        $this->stub->setUpdateTime('string');
    }

    /**
     * 设置 Inquiry setUpdateTime() 错误的传参类型.但是传参是数值, 期望返回类型正确, 值正确.
     */
    public function testSetUpdateTimeWrongTypeButNumeric()
    {
        $this->stub->setUpdateTime('1467538389');
        $this->assertTrue(is_int($this->stub->getUpdateTime()));
        $this->assertEquals(1467538389, $this->stub->getUpdateTime());
    }
    //updateTime 测试 --------------------------------------------------   end
    //email 测试 ------------------------------------------------------- start
    /**
     * 设置 User setEmail() 正确的传参类型, 期望传值正确
     */
    public function testSetEmailCorrectType()
    {
        $this->stub->setEmail('41893204@qq.com');
        $this->assertEquals('41893204@qq.com', $this->stub->getEmail());
    }

    /**
     * 设置 User setEmail() 错误的传参类型, 期望期望抛出TypeError exception
     *
     * @expectedException TypeError
     */
    public function testSetEmailWrongType()
    {
        $this->stub->setEmail(array(1, 2, 3));
    }

    /**
     * 设置 User setEmail() 错误的传参类型.但是传参是数值, 期望返回类型正确, 值正确.
     */
    public function testSetEmailCorrectTypeButNotEmail()
    {
        $this->stub->setEmail('string');
        $this->assertEquals('', $this->stub->getEmail());
    }
    //email 测试 -------------------------------------------------------   end
}
