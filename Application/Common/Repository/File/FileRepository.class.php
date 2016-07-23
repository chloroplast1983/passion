<?php
namespace Common\Repository\File;

use Common\Repository\File\Query;
use Common\Translator\FileTranslator;
use Common\Model\File;

/**
 * File仓库
 *
 * @author chloroplast
 * @version 1.0:20160227
 */
class FileRepository
{

    /**
     * @var Query\FileRowCacheQuery $fileRowCacheQuery 行缓存
     */
    private $fileRowCacheQuery;

    public function __construct(Query\FileRowCacheQuery $fileRowCacheQuery)
    {
        $this->fileRowCacheQuery = $fileRowCacheQuery;
        $this->translator = new FileTranslator();
    }

    /**
     * 添加文件入库
     */
    public function add(File $file)
    {

        //list
        $fileInfo = $this->translator->objectToArray($file);
  
        $id = $this->fileRowCacheQuery->add($fileInfo);
        if (!$id) {
            return false;
        }
        $file->setId($id);

        return true;
    }

    /**
     * 获取文件
     * @param integer $id 文件id
     */
    public function getOne($id)
    {
        //获取用户数据
        $fileInfo = $this->fileRowCacheQuery->getOne($id);
        if (empty($fileInfo)) {
            return false;
        }
        return $this->translator->arrayToObject($fileInfo);
    }

    /**
     * 批量获取文件
     * @param array $ids 文件id数组
     */
    public function getList(array $ids)
    {

        $fileList = array();
        //获取用户数据
        $fileInfoList = $this->fileRowCacheQuery->getList($ids);
        
        foreach ($fileInfoList as $fileInfo) {
            //翻译器 -- 开始
            $fileTranslator = new FileTranslator();
            //翻译器 -- 结束
            $fileList[] = $this->translator->arrayToObject($fileInfo);
        }
        return $fileList;
    }
}
