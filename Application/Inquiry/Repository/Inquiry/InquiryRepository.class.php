<?php
namespace Inquiry\Repository\Inquiry;

use Inquiry\Repository\Inquiry\Query;
use Inquiry\Model\Inquiry;
use Inquiry\Translator\InquiryTranslator;
use Marmot\Core;

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
        $this->translator = new InquiryTranslator();
    }

    public function add(Inquiry $inquiry)
    {
        $inquiryArray = $this->translator->objectToArray($inquiry);
        $id = $this->inquiryRowCacheQuery->add($inquiryArray);
        if (!$id) {
            return false;
        }
        $inquiry->setId($id);
        return true;
    }

    public function update(Inquiry $inquiry, array $keys = array())
    {
        
        $inquiryArray = $this->translator->objectToArray($inquiry, $keys);
        $conditionArray[$this->inquiryRowCacheQuery->getPrimaryKey()] = $inquiry->getId();
        return $this->inquiryRowCacheQuery->update($inquiryArray, $conditionArray);
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

        $inquiry = $this->translator->arrayToObject($inquiryInfo);
        //获取附件 -- 开始
        //获取附件 -- 结束

        if ($inquiry->getProduct()->getId() > 0) {
            $repository = Core::$container->get('Product\Repository\Product\ProductRepository');
            $product = $repository->getOne($inquiry->getProduct()->getId());
            $inquiry->setProduct($product);
        }

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
            $inquiry = $this->translator->arrayToObject($inquiryInfo);

            $inquiryList[] = $inquiry;
        }
        
        return $inquiryList;
    }

    /**
     * 根据条件查询询价
     */
    public function filter(array $filter = array(), array $sort = array(), int $offset = 0, int $size = 20)
    {

        $conjection = $condition = '';

        $inquiry = new Inquiry();
        
        if (!empty($filter)) {
            if (isset($filter['status'])) {
                $inquiry->setStatus($filter['status']);
            }

            $inquiryArray = $this->translator->objectToArray($inquiry, array_keys($filter));

            foreach ($inquiryArray as $key => $val) {
                $val = is_numeric($val) ? $val : '\''.$val.'\'';
                $condition .= $conjection.$key.' = '.$val;
                $conjection = ' AND ';
            }
        }

        if (empty($condition)) {
            $condition = ' 1 ';
        }

        $inquiryArray = $this->translator->objectToArray($inquiry, array('id'));
        $condition .= ' ORDER BY '.key($inquiryArray).' DESC';

        $inquiryList = $this->inquiryRowCacheQuery->find($condition, $offset, $size);

        if (empty($inquiryList)) {
            return false;
        }
        $ids = array();
        foreach ($inquiryList as $inquiryInfo) {
            $ids[] = $inquiryInfo[$this->inquiryRowCacheQuery->getPrimaryKey()];
        }

        //计算总数
        $count = $this->inquiryRowCacheQuery->count($condition);
        
        return array($count, $this->getList($ids));
    }
}
