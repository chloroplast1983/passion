<?php
namespace News\Repository\News;

use News\Repository\News\Query;
use News\Model\News;
use News\Translator\NewsTranslator;

/**
 * News仓库
 *
 * @author chloroplast
 * @version 1.0:20160227
 */
class NewsRepository
{

    /**
     * @var Query\NewsRowCacheQuery $newsRowCacheQuery 行缓存
     */
    private $newsRowCacheQuery;

    /**
     * @var Query\NewsContentRowCacheQuery $newsRowCacheQuery 行缓存
     */
    private $newsContentRowCacheQuery;


    public function __construct(
        Query\NewsRowCacheQuery $newsRowCacheQuery,
        Query\NewsContentRowCacheQuery $newsContentRowCacheQuery
    ) {
    
        $this->newsRowCacheQuery = $newsRowCacheQuery;
        $this->newsContentRowCacheQuery = $newsContentRowCacheQuery;
        $this->translator = new NewsTranslator();
    }

    public function add(News $news)
    {
        $newsArray = $newsContentArray = array();

        //list
        list($newsArray, $newsContentArray) = $this->translator->objectToArray($news);

        $id = $this->newsRowCacheQuery->add($newsArray);
        if (!$id) {
            return false;
        }
        $news->setId($id);
        $newsContentArray[$this->newsContentRowCacheQuery->getPrimaryKey()] = $id;

        $rows = $this->newsContentRowCacheQuery->add($newsContentArray, false);
        if (!$rows) {
            return false;
        }
        return true;
    }

    public function update(News $news, array $keys = array())
    {

        $newsArray = $newsContentArray = array();

        list($newsArray, $newsContentArray) = $this->translator->objectToArray($news, $keys);
        
        $conditionArray[$this->newsRowCacheQuery->getPrimaryKey()] = $news->getId();

        $result = $this->newsRowCacheQuery->update($newsArray, $conditionArray);

        if (!$result) {
            return false;
        }

        if (!empty($newsContentArray)) {
            return $this->newsContentRowCacheQuery->update($newsContentArray, $conditionArray);
        }

        return true;
    }

    /**
     * 获取询价
     * @param integer $id 商品id
     */
    public function getOne($id)
    {
        //获取用户数据
        $newsInfo = $this->newsRowCacheQuery->getOne($id);
        if (empty($newsInfo)) {
            return false;
        }

        $newsContentInfo = $this->newsContentRowCacheQuery->getOne($id);

        $newsInfo = array_merge($newsInfo, $newsContentInfo);

        $news = $this->translator->arrayToObject($newsInfo);
        //获取图片 -- 开始
        //获取图片 -- 结束
        return $news;
    }

    /**
     * 批量获取询价
     * @param array $ids 商户申请表id数组
     */
    public function getList(array $ids)
    {

        $newsList = array();
        //获取用户数据
        $newsInfoList = $this->newsRowCacheQuery->getList($ids);

        $newsContentInfoList = $this->newsContentRowCacheQuery->getList($ids);
        
        foreach ($newsInfoList as $newsInfo) {
            $news = $this->translator->arrayToObject(
                array_merge(
                    $newsInfo,
                    current($newsContentInfoList)
                )
            );
            next($newsContentInfoList);
            $newsList[] = $news;
        }
        
        return $newsList;
    }

    /**
     * 根据条件查询询价
     */
    public function filter(
        array $filter = array(),
        array $sort = array(),
        int $offset = 0,
        int $size = 20,
        bool $countAble = true
    ) {

        $conjection = $condition = '';

         $news = new News();

        if (!empty($filter)) {

            if (isset($filter['status'])) {
                $news->setStatus($filter['status']);
            }
            
            list($newsArray, $newsContentArray) = $this->translator->objectToArray($news, array_keys($filter));

            foreach ($newsArray as $key => $val) {
                $val = is_numeric($val) ? $val : '\''.$val.'\'';
                $condition .= $conjection.$key.' = '.$val;
                $conjection = ' AND ';
            }
        }
        if (empty($condition)) {
            $condition = ' 1 ';
        }
        
        list($newsArray, $newsContentArray) = $this->translator->objectToArray($news, array('id'));
        $condition .= ' ORDER BY '.key($newsArray).' DESC';

        $newsList = $this->newsRowCacheQuery->find($condition, $offset, $size);

        if (empty($newsList)) {
            return false;
        }

        $ids = array();
        foreach ($newsList as $newsInfo) {
            $ids[] = $newsInfo[$this->newsRowCacheQuery->getPrimaryKey()];
        }

        if (empty($ids)) {
            return false;
        }

        if ($countAble) {
            //计算总数
            $count = $this->newsRowCacheQuery->count($condition);
            return array($count, $this->getList($ids));
        }

        return $this->getList($ids);
    }
}
