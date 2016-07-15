<?php
namespace Common\Translator;

use Common\Model\File;
use tests\GenericTestsDatabaseTestCase;
use Marmot\Core;

/**
 * Common\Translator\FileTranslator.class.php 测试文件
 * @author chloroplast
 * @version 1.0.0:2016.04.18
 */
class FileTranslatorTest extends GenericTestsDatabaseTestCase
{

    private $stub;

    public $fixtures = array('pcore_file');

    public function setUp()
    {
        $this->stub = new FileTranslator();
        parent::setUp();
    }

    /**
     * 测试翻译数组转换对象
     */
    public function testArrayToObject()
    {

        $testFileId = 1;
        $expectedArray = Core::$dbDriver->query(
            'SELECT * FROM pcore_file WHERE file_id='.$testFileId
        );
        $expectedArray = $expectedArray[0];

        $file = $this->stub->arrayToObject($expectedArray);

        $this->assertInstanceof('Common\Model\File', $file);

        //测试翻译器赋值正确
        $this->assertEquals($file->getId(), $expectedArray['file_id']);
        $this->assertEquals($file->getFileHash(), $expectedArray['file_hash']);
        $this->assertEquals($file->getFileName(), $expectedArray['file_name']);
        $this->assertEquals($file->getFileExt(), $expectedArray['file_ext']);
        $this->assertEquals($file->getFilePath(), $expectedArray['file_path']);
        $this->assertEquals($file->getFileSize(), $expectedArray['file_size']);
        $this->assertEquals($file->getFileTime(), $expectedArray['file_time']);
        $this->assertEquals($file->getFileUid(), $expectedArray['file_uid']);
    }

    /**
     * 测试翻译对象转换为数组
     */
    public function testObjectToArray()
    {

        $testFileId = 1;
        $expectedArray = Core::$dbDriver->query(
            'SELECT * FROM pcore_file WHERE file_id='.$testFileId
        );
        $expectedArray = $expectedArray[0];

        $file = new File($testFileId);
        $file->setId($expectedArray['file_id']);
        $file->setFileHash($expectedArray['file_hash']);
        $file->setFileName($expectedArray['file_name']);
        $file->setFileExt($expectedArray['file_ext']);
        $file->setFilePath($expectedArray['file_path']);
        $file->setFileSize($expectedArray['file_size']);
        $file->setFileTime($expectedArray['file_time']);
        $file->setFileUid($expectedArray['file_uid']);

        $fileInfo = $this->stub->objectToArray($file);
        //测试翻译器赋值正确
        $this->assertEquals($expectedArray['file_id'], $fileInfo['file_id']);
        $this->assertEquals($expectedArray['file_hash'], $fileInfo['file_hash']);
        $this->assertEquals($expectedArray['file_name'], $fileInfo['file_name']);
        $this->assertEquals($expectedArray['file_ext'], $fileInfo['file_ext']);
        $this->assertEquals($expectedArray['file_path'], $fileInfo['file_path']);
        $this->assertEquals($expectedArray['file_size'], $fileInfo['file_size']);
        $this->assertEquals($expectedArray['file_time'], $fileInfo['file_time']);
        $this->assertEquals($expectedArray['file_uid'], $fileInfo['file_uid']);
    }
}
