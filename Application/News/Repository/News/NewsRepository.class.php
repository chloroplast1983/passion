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
    }

    public function add(News $news)
    {
        $newsArray = $newsContentArray = array();
        $newsTranslator = new NewsTranslator();

        //list
        list($newsArray, $newsContentArray) = $newsTranslator->objectToArray($news);

        $id = $this->newsRowCacheQuery->add($newsArray);
        if (!$id) {
            return false;
        }
        $news->setId($id);
        $newsContentArray['news_id'] = $id;

        $rows = $this->newsContentRowCacheQuery->add($newsContentArray, false);
        if (!$rows) {
            return false;
        }
        return true;
    }

    public function update(News $news, array $keys = array())
    {
        $newsTranslator = new NewsTranslator();

        $newsArray = $newsContentArray = array();

        list($newsArray, $newsContentArray) = $newsTranslator->objectToArray($news, $keys);

        $result = $this->newsRowCacheQuery->update($newsArray);

        if (!$result) {
            return false;
        }

        if (!empty($newsContentArray)) {
            return $this->newsContentRowCacheQuery->update($newsContentArray);
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

        //翻译器 -- 开始
        $newsTranslator = new NewsTranslator();
        //翻译器 -- 结束
        $news = $newsTranslator->arrayToObject($newsInfo);
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
        
        foreach ($newsInfoList as $newsInfo) {
            //翻译器 -- 开始
            $newsTranslator = new NewsTranslator();
            //翻译器 -- 结束
            $news = $newsTranslator->arrayToObject($newsInfo);

            $newsList[] = $news;
        }
        
        return $newsList;
    }

    /**
     * 根据条件查询询价
     */
    public function filter(array $filter = array(), array $sort = array(), int $offset = 0, int $size = 20)
    {

        $newsList = $this->newsRowCacheQuery->find($condition, $offset, $size);

        if (empty($newsList)) {
            return false;
        }
        $ids = array();
        foreach ($newsList as $newsInfo) {
            $ids[] = $newsInfo['news_id'];
        }
        return $this->getList($ids);
    }
}
