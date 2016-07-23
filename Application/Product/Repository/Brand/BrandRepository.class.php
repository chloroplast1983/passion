<?php
namespace Product\Repository\Brand;

use Product\Repository\Brand\Query;
use Product\Model\Brand;
use Product\Translator\BrandTranslator;
use Marmot\Core;

/**
 * Brand仓库
 *
 * @author chloroplast
 * @version 1.0:20160227
 */
class BrandRepository
{

    /**
     * @var Query\BrandRowCacheQuery $brandRowCacheQuery 行缓存
     */
    private $brandRowCacheQuery;

    /**
     * @var BrandTranslator $translator
     */
    private $translator;

    public function __construct(Query\BrandRowCacheQuery $brandRowCacheQuery)
    {
        $this->brandRowCacheQuery = $brandRowCacheQuery;
        $this->translator = new BrandTranslator();
    }

    public function add(Brand $brand)
    {
        $brandArray = $this->translator->objectToArray($brand);
        $id = $this->brandRowCacheQuery->add($brandArray);
        if (!$id) {
            return false;
        }
        $brand->setId($id);
        return true;
    }

    public function update(Brand $brand, array $keys = array())
    {
        $brandArray = $this->translator->objectToArray($brand, $keys);

        $conditionArray[$this->brandRowCacheQuery->getPrimaryKey()] = $brand->getId();

        return $this->brandRowCacheQuery->update($brandArray, $conditionArray);
    }

    /**
     * 获取询价
     * @param integer $id 商品id
     */
    public function getOne($id)
    {
        //获取用户数据
        $brandInfo = $this->brandRowCacheQuery->getOne($id);
        if (empty($brandInfo)) {
            return false;
        }

        $brand = $this->translator->arrayToObject($brandInfo);
        if ($brand->getLogo()->getId() > 0) {
            //获取图片 -- 开始
            $repository = Core::$container->get('Common\Repository\File\FileRepository');
            $brand->setLogo($repository->getOne($brand->getLogo()->getId()));
            //获取图片 -- 结束
        }
        return $brand;
    }

    /**
     * 批量获取询价
     * @param array $ids 商户申请表id数组
     */
    public function getList(array $ids)
    {

        $brandList = $logoList = array();

        $logoIds = array();
        //获取用户数据
        $brandInfoList = $this->brandRowCacheQuery->getList($ids);
       
        foreach ($brandInfoList as $brandInfo) {
            $brand = $this->translator->arrayToObject($brandInfo);
            $logoIds[] = $brand->getLogo()->getId();
            $brandList[] = $brand;
        }
        
        $repository = Core::$container->get('Common\Repository\File\FileRepository');
        $logoList = $repository->getList($logoIds);

        foreach ($brandList as $brand) {
            if ($brand->getLogo()->getId() > 0) {
                $brand->setLogo(current($logoList));
                next($logoList);
            }
        }
        return $brandList;
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

        if (!empty($filter)) {
            $brand = new Brand();
            
            if (isset($filter['status'])) {
                $brand->setStatus($filter['status']);
                //$condition = 'status = '.$filter['status'];
            }

            $brandArray = $this->translator->objectToArray($brand, array_keys($filter));

            foreach ($brandArray as $key => $val) {
                $val = is_numeric($val) ? $val : '\''.$val.'\'';
                $condition .= $conjection.$key.' = '.$val;
                $conjection = ' AND ';
            }
        }

        if (empty($condition)) {
            $condition = ' 1 ';
        }

        $brandList = $this->brandRowCacheQuery->find($condition, $offset, $size);
        
        if (empty($brandList)) {
            return false;
        }
        $ids = array();
        foreach ($brandList as $brandInfo) {
            $ids[] = $brandInfo[$this->brandRowCacheQuery->getPrimaryKey()];
        }

        if ($countAble) {
            //计算总数
            $count = $this->brandRowCacheQuery->count($condition);
            return array($count, $this->getList($ids));
        }
        return $this->getList($ids);
    }
}
