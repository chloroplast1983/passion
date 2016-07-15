<?php
namespace Product\Model;

use tests;

/**
 * \Product\Model\Productclass.php 测试文件
 * @author chloroplast
 * @version 1.0.0:2016.07.03
 */

class ProductTest extends tests\GenericTestCase
{
    private $stub;

    public function setUp()
    {
        $this->stub = new Product();
    }

    /**
     * Product 商品领域对象, 测试构造函数
     */
    public function testProductConstructor()
    {
        //测试初始化新闻id
        $idParameter = $this->getPrivateProperty('\Product\Model\Product', 'id');
        $this->assertEquals(0, $idParameter->getValue($this->stub));

        //测试初始化标题
        $titleParameter = $this->getPrivateProperty('\Product\Model\Product', 'title');
        $this->assertEmpty($titleParameter->getValue($this->stub));

        //测试初始化内容
        $contentParameter = $this->getPrivateProperty('\Product\Model\Product', 'content');
        $this->assertEmpty($contentParameter->getValue($this->stub));

        //测试初始化新闻发布时间
        $createTimeParameter = $this->getPrivateProperty('\Product\Model\Product', 'createTime');
        $this->assertGreaterThan(0, $createTimeParameter->getValue($this->stub));

        //测试初始化新闻更新时间
        $updateTimeParameter = $this->getPrivateProperty('\Product\Model\Product', 'updateTime');
        $this->assertGreaterThan(0, $updateTimeParameter->getValue($this->stub));

        //测试初始化新闻状态更新时间
        $statusTimeParameter = $this->getPrivateProperty('\Product\Model\Product', 'statusTime');
        $this->assertGreaterThan(0, $statusTimeParameter->getValue($this->stub));

        //测试初始化新闻状态
        $statusParameter = $this->getPrivateProperty('\Product\Model\Product', 'status');
        $this->assertEquals(STATUS_NORMAL, $statusParameter->getValue($this->stub));

        //测试初始化品牌
        $brandParameter = $this->getPrivateProperty('\Product\Model\Product', 'brand');
        $this->assertInstanceof('\Product\Model\Brand', $brandParameter->getValue($this->stub));

        //测试初始化分类
        $categoryParameter = $this->getPrivateProperty('\Product\Model\Product', 'category');
        $this->assertInstanceof('\Product\Model\Category', $categoryParameter->getValue($this->stub));

        //测试初始化尺寸
        $modelParameter = $this->getPrivateProperty('\Product\Model\Product', 'model');
        $this->assertEmpty($modelParameter->getValue($this->stub));

        //测试初始化产品编号
        $numberParameter = $this->getPrivateProperty('\Product\Model\Product', 'number');
        $this->assertEmpty($numberParameter->getValue($this->stub));

        //测试初始化最小订单量
        $moqParameter = $this->getPrivateProperty('\Product\Model\Product', 'moq');
        $this->assertEmpty($moqParameter->getValue($this->stub));

        //测试初始化质保时间
        $warrantyTimeParameter = $this->getPrivateProperty('\Product\Model\Product', 'warrantyTime');
        $this->assertEmpty($warrantyTimeParameter->getValue($this->stub));

        //测试初始化证书
        $certificatesParameter = $this->getPrivateProperty('\Product\Model\Product', 'certificates');
        $this->assertEmpty($certificatesParameter->getValue($this->stub));
    }

    //id 测试 ---------------------------------------------------------- start
    /**
     * 设置 Product setId() 正确的传参类型, 期望传值正确
     */
    public function testSetIdCorrectType()
    {
        $this->stub->setId(1);
        $this->assertEquals(1, $this->stub->getId());
    }

    /**
     * 设置 Product setId() 错误的传参类型, 期望期望抛出TypeError exception
     *
     * @expectedException TypeError
     */
    public function testSetIdWrongType()
    {
        $this->stub->setId('string');
    }

    /**
     * 设置 Product setId() 错误的传参类型.但是传参是数值, 期望返回类型正确, 值正确.
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
     * 设置 Product setTitle() 正确的传参类型, 期望传值正确
     */
    public function testSetTitleCorrectType()
    {
        $this->stub->setTitle('string');
        $this->assertEquals('string', $this->stub->getTitle());
    }

    /**
     * 设置 Product setTitle() 错误的传参类型, 期望期望抛出TypeError exception
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
     * 设置 Product setContent() 正确的传参类型, 期望传值正确
     */
    public function testSetContentCorrectType()
    {
        $this->stub->setContent('string');
        $this->assertEquals('string', $this->stub->getContent());
    }

    /**
     * 设置 Product setContent() 错误的传参类型, 期望期望抛出TypeError exception
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
     * 设置 Product setCreateTime() 正确的传参类型, 期望传值正确
     */
    public function testSetCreateTimeCorrectType()
    {
        $this->stub->setCreateTime(1467542377);
        $this->assertEquals(1467542377, $this->stub->getCreateTime());
    }

    /**
     * 设置 Product setCreateTime() 错误的传参类型, 期望期望抛出TypeError exception
     *
     * @expectedException TypeError
     */
    public function testSetCreateTimeWrongType()
    {
        $this->stub->setCreateTime('string');
    }

    /**
     * 设置 Product setCreateTime() 错误的传参类型.但是传参是数值, 期望返回类型正确, 值正确.
     */
    public function testSetCreateTimeWrongTypeButNumeric()
    {
        $this->stub->setCreateTime('1467542377');
        $this->assertTrue(is_int($this->stub->getCreateTime()));
        $this->assertEquals(1467542377, $this->stub->getCreateTime());
    }
    //createTime 测试 --------------------------------------------------   end
    //updateTime 测试 -------------------------------------------------- start
    /**
     * 设置 Product setUpdateTime() 正确的传参类型, 期望传值正确
     */
    public function testSetUpdateTimeCorrectType()
    {
        $this->stub->setUpdateTime(1467542377);
        $this->assertEquals(1467542377, $this->stub->getUpdateTime());
    }

    /**
     * 设置 Product setUpdateTime() 错误的传参类型, 期望期望抛出TypeError exception
     *
     * @expectedException TypeError
     */
    public function testSetUpdateTimeWrongType()
    {
        $this->stub->setUpdateTime('string');
    }

    /**
     * 设置 Product setUpdateTime() 错误的传参类型.但是传参是数值, 期望返回类型正确, 值正确.
     */
    public function testSetUpdateTimeWrongTypeButNumeric()
    {
        $this->stub->setUpdateTime('1467542377');
        $this->assertTrue(is_int($this->stub->getUpdateTime()));
        $this->assertEquals(1467542377, $this->stub->getUpdateTime());
    }
    //updateTime 测试 --------------------------------------------------   end
    //statusTime 测试 -------------------------------------------------- start
    /**
     * 设置 Product setStatusTime() 正确的传参类型, 期望传值正确
     */
    public function testSetStatusTimeCorrectType()
    {
        $this->stub->setStatusTime(1467542377);
        $this->assertEquals(1467542377, $this->stub->getStatusTime());
    }

    /**
     * 设置 Product setStatusTime() 错误的传参类型, 期望期望抛出TypeError exception
     *
     * @expectedException TypeError
     */
    public function testSetStatusTimeWrongType()
    {
        $this->stub->setStatusTime('string');
    }

    /**
     * 设置 Product setStatusTime() 错误的传参类型.但是传参是数值, 期望返回类型正确, 值正确.
     */
    public function testSetStatusTimeWrongTypeButNumeric()
    {
        $this->stub->setStatusTime('1467542377');
        $this->assertTrue(is_int($this->stub->getStatusTime()));
        $this->assertEquals(1467542377, $this->stub->getStatusTime());
    }
    //statusTime 测试 --------------------------------------------------   end
    //status 测试 ------------------------------------------------------ start
    /**
     * 循环测试 Product setStatus() 是否符合预定范围
     *
     * @dataProvider statusProvider
     */
    public function testSetStatus($actual, $expected)
    {
        $this->stub->setStatus($actual);
        $this->assertEquals($expected, $this->stub->getStatus());
    }

    /**
     * 循环测试 Product setStatus() 数据构建器
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
     * 设置 Product setStatus() 错误的传参类型, 期望期望抛出TypeError exception
     *
     * @expectedException TypeError
     */
    public function testSetStatusWrongType()
    {
        $this->stub->setStatus('string');
    }
    //status 测试 ------------------------------------------------------   end
    //brand 测试 ------------------------------------------------------- start
    /**
     * 设置 Product setBrand() 正确的传参类型, 期望传值正确
     */
    public function testSetBrandCorrectType()
    {
        $object = new \Product\Model\Brand();        //根据需求自己添加对象的设置, 如果需要
        $this->stub->setBrand($object);
        $this->assertSame($object, $this->stub->getBrand());
    }

    /**
     * 设置 Product setBrand() 错误的传参类型, 期望期望抛出TypeError exception
     *
     * @expectedException TypeError
     */
    public function testSetBrandWrongType()
    {
        $this->stub->setBrand($this->testSring);
    }
    //brand 测试 -------------------------------------------------------   end
    //category 测试 ---------------------------------------------------- start
    /**
     * 设置 Product setCategory() 正确的传参类型, 期望传值正确
     */
    public function testSetCategoryCorrectType()
    {
        $object = new \Product\Model\Category();        //根据需求自己添加对象的设置, 如果需要
        $this->stub->setCategory($object);
        $this->assertSame($object, $this->stub->getCategory());
    }

    /**
     * 设置 Product setCategory() 错误的传参类型, 期望期望抛出TypeError exception
     *
     * @expectedException TypeError
     */
    public function testSetCategoryWrongType()
    {
        $this->stub->setCategory($this->testSring);
    }
    //category 测试 ----------------------------------------------------   end
    //model 测试 ------------------------------------------------------- start
    /**
     * 设置 Product setModel() 正确的传参类型, 期望传值正确
     */
    public function testSetModelCorrectType()
    {
        $this->stub->setModel('string');
        $this->assertEquals('string', $this->stub->getModel());
    }

    /**
     * 设置 Product setModel() 错误的传参类型, 期望期望抛出TypeError exception
     *
     * @expectedException TypeError
     */
    public function testSetModelWrongType()
    {
        $this->stub->setModel(array(1, 2, 3));
    }
    //model 测试 -------------------------------------------------------   end
    //number 测试 ------------------------------------------------------ start
    /**
     * 设置 Product setNumber() 正确的传参类型, 期望传值正确
     */
    public function testSetNumberCorrectType()
    {
        $this->stub->setNumber('string');
        $this->assertEquals('string', $this->stub->getNumber());
    }

    /**
     * 设置 Product setNumber() 错误的传参类型, 期望期望抛出TypeError exception
     *
     * @expectedException TypeError
     */
    public function testSetNumberWrongType()
    {
        $this->stub->setNumber(array(1, 2, 3));
    }
    //number 测试 ------------------------------------------------------   end
    //moq 测试 --------------------------------------------------------- start
    /**
     * 设置 Product setMoq() 正确的传参类型, 期望传值正确
     */
    public function testSetMoqCorrectType()
    {
        $this->stub->setMoq('string');
        $this->assertEquals('string', $this->stub->getMoq());
    }

    /**
     * 设置 Product setMoq() 错误的传参类型, 期望期望抛出TypeError exception
     *
     * @expectedException TypeError
     */
    public function testSetMoqWrongType()
    {
        $this->stub->setMoq(array(1, 2, 3));
    }
    //moq 测试 ---------------------------------------------------------   end
    //warrantyTime 测试 ------------------------------------------------ start
    /**
     * 设置 Product setWarrantyTime() 正确的传参类型, 期望传值正确
     */
    public function testSetWarrantyTimeCorrectType()
    {
        $this->stub->setWarrantyTime('string');
        $this->assertEquals('string', $this->stub->getWarrantyTime());
    }

    /**
     * 设置 Product setWarrantyTime() 错误的传参类型, 期望期望抛出TypeError exception
     *
     * @expectedException TypeError
     */
    public function testSetWarrantyTimeWrongType()
    {
        $this->stub->setWarrantyTime(array(1, 2, 3));
    }
    //warrantyTime 测试 ------------------------------------------------   end
    //certificates 测试 ------------------------------------------------ start
    /**
     * 设置 Product setCertificates() 正确的传参类型, 期望传值正确
     */
    public function testSetCertificatesCorrectType()
    {
        $this->stub->setCertificates('string');
        $this->assertEquals('string', $this->stub->getCertificates());
    }

    /**
     * 设置 Product setCertificates() 错误的传参类型, 期望期望抛出TypeError exception
     *
     * @expectedException TypeError
     */
    public function testSetCertificatesWrongType()
    {
        $this->stub->setCertificates(array(1, 2, 3));
    }
    //certificates 测试 ------------------------------------------------   end
}
