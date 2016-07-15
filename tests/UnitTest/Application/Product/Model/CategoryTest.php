<?php
namespace Product\Model;

use tests;

/**
 * \Product\Model\Categoryclass.php 测试文件
 * @author chloroplast
 * @version 1.0.0:2016.07.03
 */

class CategoryTest extends tests\GenericTestCase
{
    private $stub;

    public function setUp()
    {
        $this->stub = new Category();
    }

    /**
     * Category 商品分类领域对象, 测试构造函数
     */
    public function testCategoryConstructor()
    {
        //测试初始化分类id
        $idParameter = $this->getPrivateProperty('\Product\Model\Category', 'id');
        $this->assertEquals(0, $idParameter->getValue($this->stub));

        //测试初始化商品分类名称
        $nameParameter = $this->getPrivateProperty('\Product\Model\Category', 'name');
        $this->assertEmpty($nameParameter->getValue($this->stub));

        //测试初始化分类父id
        $parentIdParameter = $this->getPrivateProperty('\Product\Model\Category', 'parentId');
        $this->assertEquals(0, $parentIdParameter->getValue($this->stub));

        //测试初始化分类创建时间
        $createTimeParameter = $this->getPrivateProperty('\Product\Model\Category', 'createTime');
        $this->assertGreaterThan(0, $createTimeParameter->getValue($this->stub));

        //测试初始化商品分类类型
        $typeParameter = $this->getPrivateProperty('\Product\Model\Category', 'type');
        $this->assertEquals(TYPE_ELEVATOR, $typeParameter->getValue($this->stub));
    }

    //id 测试 ---------------------------------------------------------- start
    /**
     * 设置 Category setId() 正确的传参类型, 期望传值正确
     */
    public function testSetIdCorrectType()
    {
        $this->stub->setId(1);
        $this->assertEquals(1, $this->stub->getId());
    }

    /**
     * 设置 Category setId() 错误的传参类型, 期望期望抛出TypeError exception
     *
     * @expectedException TypeError
     */
    public function testSetIdWrongType()
    {
        $this->stub->setId('string');
    }

    /**
     * 设置 Category setId() 错误的传参类型.但是传参是数值, 期望返回类型正确, 值正确.
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
     * 设置 Category setName() 正确的传参类型, 期望传值正确
     */
    public function testSetNameCorrectType()
    {
        $this->stub->setName('string');
        $this->assertEquals('string', $this->stub->getName());
    }

    /**
     * 设置 Category setName() 错误的传参类型, 期望期望抛出TypeError exception
     *
     * @expectedException TypeError
     */
    public function testSetNameWrongType()
    {
        $this->stub->setName(array(1, 2, 3));
    }
    //name 测试 --------------------------------------------------------   end
    //parentId 测试 ---------------------------------------------------- start
    /**
     * 设置 Category setParentId() 正确的传参类型, 期望传值正确
     */
    public function testSetParentIdCorrectType()
    {
        $this->stub->setParentId(1);
        $this->assertEquals(1, $this->stub->getParentId());
    }

    /**
     * 设置 Category setParentId() 错误的传参类型, 期望期望抛出TypeError exception
     *
     * @expectedException TypeError
     */
    public function testSetParentIdWrongType()
    {
        $this->stub->setParentId('string');
    }

    /**
     * 设置 Category setParentId() 错误的传参类型.但是传参是数值, 期望返回类型正确, 值正确.
     */
    public function testSetParentIdWrongTypeButNumeric()
    {
        $this->stub->setParentId('1');
        $this->assertTrue(is_int($this->stub->getParentId()));
        $this->assertEquals(1, $this->stub->getParentId());
    }
    //parentId 测试 ----------------------------------------------------   end
    //createTime 测试 -------------------------------------------------- start
    /**
     * 设置 Category setCreateTime() 正确的传参类型, 期望传值正确
     */
    public function testSetCreateTimeCorrectType()
    {
        $this->stub->setCreateTime(1467539072);
        $this->assertEquals(1467539072, $this->stub->getCreateTime());
    }

    /**
     * 设置 Category setCreateTime() 错误的传参类型, 期望期望抛出TypeError exception
     *
     * @expectedException TypeError
     */
    public function testSetCreateTimeWrongType()
    {
        $this->stub->setCreateTime('string');
    }

    /**
     * 设置 Category setCreateTime() 错误的传参类型.但是传参是数值, 期望返回类型正确, 值正确.
     */
    public function testSetCreateTimeWrongTypeButNumeric()
    {
        $this->stub->setCreateTime('1467539072');
        $this->assertTrue(is_int($this->stub->getCreateTime()));
        $this->assertEquals(1467539072, $this->stub->getCreateTime());
    }
    //createTime 测试 --------------------------------------------------   end
    //type 测试 -------------------------------------------------------- start
    /**
     * 循环测试 Category setType() 是否符合预定范围
     *
     * @dataProvider typeProvider
     */
    public function testSetType($actual, $expected)
    {
        $this->stub->setType($actual);
        $this->assertEquals($expected, $this->stub->getType());
    }

    /**
     * 循环测试 Category setType() 数据构建器
     */
    public function typeProvider()
    {
        return [
            [TYPE_ESCALATOR,TYPE_ESCALATOR],
            [TYPE_ELEVATOR,TYPE_ELEVATOR],
            [9999,TYPE_ELEVATOR],
        ];
    }

    /**
     * 设置 Category setType() 错误的传参类型, 期望期望抛出TypeError exception
     *
     * @expectedException TypeError
     */
    public function testSetTypeWrongType()
    {
        $this->stub->setType('string');
    }
    //type 测试 --------------------------------------------------------   end
}
