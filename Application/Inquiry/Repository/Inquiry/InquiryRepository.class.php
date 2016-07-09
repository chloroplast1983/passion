<?php
namespace Inquiry\Repository\Inquiry;

use Inquiry\Repository\Inquiry\Query;
use Inquiry\Model\Inquiry;
use Inquiry\Translator\InquiryTranslator;

/**
 * Inquiry仓库
 *
 * @author chloroplast
 * @version 1.0:20160227
 */
class InquiryRepository
{

    /**
     * @var Query\InquiryRowCacheQuery $inquiryRowCacheQuery 行缓存
     */
    private $inquiryRowCacheQuery;


    public function __construct(Query\InquiryRowCacheQuery $inquiryRowCacheQuery)
    {
        $this->inquiryRowCacheQuery = $inquiryRowCacheQuery;
    }

    public function add(Inquiry $inquiry)
    {
        $inquiryTranslator = new InquiryTranslator();
        $inquiryArray = $inquiryTranslator->objectToArray($inquiry);
        $id = $this->inquiryRowCacheQuery->add($inquiryArray);
        if (!$id) {
            return false;
        }
        $inquiry->setId($id);
        return true;
    }

    public function update(Inquiry $inquiry, array $keys = array())
    {
        $inquiryTranslator = new InquiryTranslator();
        $inquiryArray = $inquiryTranslator->objectToArray($inquiry, $keys);
        return $this->inquiryRowCacheQuery->update($inquiryArray);
    }

    /**
     * 获取询价
     * @param integer $id 商品id
     */
    public function getOne($id)
    {
        //获取用户数据
        $inquiryInfo = $this->inquiryRowCacheQuery->getOne($id);
        if (empty($inquiryInfo)) {
            return false;
        }

        //翻译器 -- 开始
        $inquiryTranslator = new InquiryTranslator();
        //翻译器 -- 结束
        $inquiry = $inquiryTranslator->arrayToObject($inquiryInfo);
        //获取图片 -- 开始
        //获取图片 -- 结束
        return $inquiry;
    }

    /**
     * 批量获取询价
     * @param array $ids 商户申请表id数组
     */
    public function getList(array $ids)
    {

        $inquiryList = array();
        //获取用户数据
        $inquiryInfoList = $this->inquiryRowCacheQuery->getList($ids);
        
        foreach ($inquiryInfoList as $inquiryInfo) {
            //翻译器 -- 开始
            $inquiryTranslator = new inquiryTranslator();
            //翻译器 -- 结束
            $inquiry = $inquiryTranslator->arrayToObject($inquiryInfo);

            $inquiryList[] = $inquiry;
        }
        
        return $inquiryList;
    }

    /**
     * 根据条件查询询价
     */
    public function filter(array $filter = array(), array $sort = array(), int $offset = 0, int $size = 20)
    {

        $inquiryList = $this->inquiryRowCacheQuery->find($condition, $offset, $size);

        if (empty($inquiryList)) {
            return false;
        }
        $ids = array();
        foreach ($inquiryList as $inquiryInfo) {
            $ids[] = $inquiryInfo['inquiry_id'];
        }
        return $this->getList($ids);
    }
}
