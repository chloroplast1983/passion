<?php
namespace Common\Model;

use tests;

/**
 * Common\Model\File.class.php 测试文件
 * @author chloroplast
 * @version 1.0.0:2016.05.02
 */

class FileTest extends tests\GenericTestCase
{

    private $stub;

    public function setUp()
    {
        $this->stub = new \Common\Model\File();
    }

    /**
     * File 文件领域对象,测试构造函数
     */
    public function testFileConstructor()
    {
        //测试初始化文件id
        $idParameter = $this->getPrivateProperty('Common\Model\File', 'id');
        $this->assertEquals(0, $idParameter->getValue($this->stub));

        //测试初始化文件hash验证码
        $fileHashParameter = $this->getPrivateProperty('Common\Model\File', 'fileHash');
        $this->assertEmpty($fileHashParameter->getValue($this->stub));

        //测试初始化文件错误代码
        $fileErrParameter = $this->getPrivateProperty('Common\Model\File', 'fileErr');
        $this->assertEmpty($fileErrParameter->getValue($this->stub));

        //测试初始化文件名称
        $fileNameParameter = $this->getPrivateProperty('Common\Model\File', 'fileName');
        $this->assertEmpty($fileNameParameter->getValue($this->stub));

        //测试初始化文件后缀
        $fileExtParameter = $this->getPrivateProperty('Common\Model\File', 'fileExt');
        $this->assertEmpty($fileExtParameter->getValue($this->stub));

        //测试初始化文件路径
        $filePathParameter = $this->getPrivateProperty('Common\Model\File', 'filePath');
        $this->assertEmpty($filePathParameter->getValue($this->stub));

        //测试初始化文件大小
        $fileSizeParameter = $this->getPrivateProperty('Common\Model\File', 'fileSize');
        $this->assertEmpty($fileSizeParameter->getValue($this->stub));

        //测试初始化文件上传时间
        $fileTimeParameter = $this->getPrivateProperty('Common\Model\File', 'fileTime');
        $this->assertGreaterThan(0, $fileTimeParameter->getValue($this->stub));

        //测试初始化文件上传用户id
        $fileUidParameter = $this->getPrivateProperty('Common\Model\File', 'fileUid');
        $this->assertEquals(0, $fileUidParameter->getValue($this->stub));
    }


    //id 测试 ---------------------------------------------------------- start
    /**
     * 设置 File setId() 正确的传参类型,期望传值正确
     */
    public function testSetIdCorrectType()
    {
        $this->stub->setId(1);
        $this->assertEquals(1, $this->stub->getId());
    }

    /**
     * 设置 File setId() 错误的传参类型,期望期望抛出TypeError exception
     *
     * @expectedException TypeError
     */
    public function testSetIdWrongType()
    {
        $this->stub->setId('string');
    }

    /**
     * 设置 File setId() 错误的传参类型.但是传参是数值,期望返回类型正确,值正确.
     */
    public function testSetIdWrongTypeButNumeric()
    {
        $this->stub->setId('1');
        $this->assertTrue(is_int($this->stub->getId()));
        $this->assertEquals(1, $this->stub->getId());
    }
    //id 测试 ----------------------------------------------------------   end

    //fileHash 测试 ---------------------------------------------------- start
    /**
     * 设置 File setFileHash() 正确的传参类型,期望传值正确
     */
    public function testSetFileHashCorrectType()
    {
        $this->stub->setFileHash('string');
        $this->assertEquals('string', $this->stub->getFileHash());
    }

    /**
     * 设置 File setFileHash() 错误的传参类型,期望期望抛出TypeError exception
     *
     * @expectedException TypeError
     */
    public function testSetFileHashWrongType()
    {
        $this->stub->setFileHash(array(1,2,3));
    }
    //fileHash 测试 ----------------------------------------------------   end

    //fileErr 测试 ----------------------------------------------------- start
    /**
     * 设置 File setFileErr() 正确的传参类型,期望传值正确
     */
    public function testSetFileErrCorrectType()
    {
        $this->stub->setFileErr('string');
        $this->assertEquals('string', $this->stub->getFileErr());
    }

    /**
     * 设置 File setFileErr() 错误的传参类型,期望期望抛出TypeError exception
     *
     * @expectedException TypeError
     */
    public function testSetFileErrWrongType()
    {
        $this->stub->setFileErr(array(1,2,3));
    }
    //fileErr 测试 -----------------------------------------------------   end

    //fileName 测试 ---------------------------------------------------- start
    /**
     * 设置 File setFileName() 正确的传参类型,期望传值正确
     */
    public function testSetFileNameCorrectType()
    {
        $this->stub->setFileName('string');
        $this->assertEquals('string', $this->stub->getFileName());
    }

    /**
     * 设置 File setFileName() 错误的传参类型,期望期望抛出TypeError exception
     *
     * @expectedException TypeError
     */
    public function testSetFileNameWrongType()
    {
        $this->stub->setFileName(array(1,2,3));
    }
    //fileName 测试 ----------------------------------------------------   end

    //fileExt 测试 ----------------------------------------------------- start
    /**
     * 设置 File setFileExt() 正确的传参类型,期望传值正确
     */
    public function testSetFileExtCorrectType()
    {
        $this->stub->setFileExt('string');
        $this->assertEquals('string', $this->stub->getFileExt());
    }

    /**
     * 设置 File setFileExt() 错误的传参类型,期望期望抛出TypeError exception
     *
     * @expectedException TypeError
     */
    public function testSetFileExtWrongType()
    {
        $this->stub->setFileExt(array(1,2,3));
    }
    //fileExt 测试 -----------------------------------------------------   end

    //filePath 测试 ---------------------------------------------------- start
    /**
     * 设置 File setFilePath() 正确的传参类型,期望传值正确
     */
    public function testSetFilePathCorrectType()
    {
        $this->stub->setFilePath('string');
        $this->assertEquals('string', $this->stub->getFilePath());
    }

    /**
     * 设置 File setFilePath() 错误的传参类型,期望期望抛出TypeError exception
     *
     * @expectedException TypeError
     */
    public function testSetFilePathWrongType()
    {
        $this->stub->setFilePath(array(1,2,3));
    }
    //filePath 测试 ----------------------------------------------------   end

    //fileSize 测试 ---------------------------------------------------- start
    /**
     * 设置 File setFileSize() 正确的传参类型,期望传值正确
     */
    public function testSetFileSizeCorrectType()
    {
        $this->stub->setFileSize('string');
        $this->assertEquals('string', $this->stub->getFileSize());
    }

    /**
     * 设置 File setFileSize() 错误的传参类型,期望期望抛出TypeError exception
     *
     * @expectedException TypeError
     */
    public function testSetFileSizeWrongType()
    {
        $this->stub->setFileSize(array(1,2,3));
    }
    //fileSize 测试 ----------------------------------------------------   end

    //fileTime 测试 ---------------------------------------------------- start
    /**
     * 设置 File setFileTime() 正确的传参类型,期望传值正确
     */
    public function testSetFileTimeCorrectType()
    {
        $this->stub->setFileTime(1462121829);
        $this->assertEquals(1462121829, $this->stub->getFileTime());
    }

    /**
     * 设置 File setFileTime() 错误的传参类型,期望期望抛出TypeError exception
     *
     * @expectedException TypeError
     */
    public function testSetFileTimeWrongType()
    {
        $this->stub->setFileTime('string');
    }

    /**
     * 设置 File setFileTime() 错误的传参类型.但是传参是数值,期望返回类型正确,值正确.
     */
    public function testSetFileTimeWrongTypeButNumeric()
    {
        $this->stub->setFileTime('1462121829');
        $this->assertTrue(is_int($this->stub->getFileTime()));
        $this->assertEquals(1462121829, $this->stub->getFileTime());
    }
    //fileTime 测试 ----------------------------------------------------   end

    //fileUid 测试 ----------------------------------------------------- start
    /**
     * 设置 File setFileUid() 正确的传参类型,期望传值正确
     */
    public function testSetFileUidCorrectType()
    {
        $this->stub->setFileUid(1);
        $this->assertEquals(1, $this->stub->getFileUid());
    }

    /**
     * 设置 File setFileUid() 错误的传参类型,期望期望抛出TypeError exception
     *
     * @expectedException TypeError
     */
    public function testSetFileUidWrongType()
    {
        $this->stub->setFileUid('string');
    }

    /**
     * 设置 File setFileUid() 错误的传参类型.但是传参是数值,期望返回类型正确,值正确.
     */
    public function testSetFileUidWrongTypeButNumeric()
    {
        $this->stub->setFileUid('1');
        $this->assertTrue(is_int($this->stub->getFileUid()));
        $this->assertEquals(1, $this->stub->getFileUid());
    }
    //fileUid 测试 -----------------------------------------------------   end
}
