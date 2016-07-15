<?php
namespace Common\Translator;

use System\Classes\Translator;
use Common\Model\File;
use Marmot\Core;

class FileTranslator extends Translator
{

    public function arrayToObject(array $expression)
    {
        $file = Core::$container->get('Common\Model\File');
        $file->setId($expression['file_id']);
        $file->setFileHash($expression['file_hash']);
        $file->setFileName($expression['file_name']);
        $file->setFileExt($expression['file_ext']);
        $file->setFilePath($expression['file_path']);
        $file->setFileSize($expression['file_size']);
        $file->setFileTime($expression['file_time']);
        $file->setFileUid($expression['file_uid']);
        return $file;
    }

    public function objectToArray($file, array $keys = array())
    {
        if (!$file instanceof File) {
            return false;
        }

        if (empty($keys)) {
            $keys = array(
                        'id',
                        'fileHash',
                        'fileName',
                        'fileExt',
                        'filePath',
                        'fileSize',
                        'fileTime',
                        'fileUid',
                    );
        }

        $expression = array();

        $expression['file_id'] = $file->getId();
        
        if (in_array('fileHash', $keys)) {
            $expression['file_hash'] = $file->getFileHash();
        }

        if (in_array('fileName', $keys)) {
            $expression['file_name'] = $file->getFileName();
        }

        if (in_array('fileExt', $keys)) {
            $expression['file_ext'] = $file->getFileExt();
        }

        if (in_array('filePath', $keys)) {
            $expression['file_path'] = $file->getFilePath();
        }

        if (in_array('fileSize', $keys)) {
            $expression['file_size'] = $file->getFileSize();
        }

        if (in_array('fileTime', $keys)) {
            $expression['file_time'] = $file->getFileTime();
        }

        if (in_array('fileUid', $keys)) {
            $expression['file_uid'] = $file->getFileUid();
        }

        return $expression;
    }
}
