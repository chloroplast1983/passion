<?php
namespace Product\Repository\Product;

use Product\Repository\Product\Query;
use Product\Model\Product;
use Product\Translator\ProductTranslator;

/**
 * Product仓库
 *
 * @author chloroplast
 * @version 1.0:20160227
 */
class ProductRepository
{

    /**
     * @var Query\ProductRowCacheQuery $productRowCacheQuery 行缓存
     */
    private $productRowCacheQuery;

    /**
     * @var Query\ProductContentRowCacheQuery $productRowCacheQuery 行缓存
     */
    private $productContentRowCacheQuery;


    public function __construct(
        Query\ProductRowCacheQuery $productRowCacheQuery,
        Query\ProductContentRowCacheQuery $productContentRowCacheQuery
    ) {
    
        $this->productRowCacheQuery = $productRowCacheQuery;
        $this->productContentRowCacheQuery = $productContentRowCacheQuery;
        $this->translator = new ProductTranslator();
    }

    public function add(Product $product)
    {
        $productArray = $productContentArray = array();
        
        //list
        list($productArray, $productContentArray) = $this->translator->objectToArray($product);

        $id = $this->productRowCacheQuery->add($productArray);
       
        if (!$id) {
            return false;
        }
        $product->setId($id);
        $productContentArray['product_id'] = $id;
        $rows = $this->productContentRowCacheQuery->add($productContentArray, false);

        if (!$rows) {
            return false;
        }
        return true;
    }

    public function update(Product $product, array $keys = array())
    {
        $productTranslator = new ProductTranslator();

        $productArray = $productContentArray = array();

        list($productArray, $productContentArray) = $this->translator->objectToArray($product, $keys);

        $result = $this->productRowCacheQuery->update($productArray);

        if (!$result) {
            return false;
        }

        if (!empty($productContentArray)) {
            return $this->productContentRowCacheQuery->update($productContentArray);
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
        $productInfo = $this->productRowCacheQuery->getOne($id);
        if (empty($productInfo)) {
            return false;
        }

        $product = $this->translator->arrayToObject($productInfo);
        //获取图片 -- 开始
        //获取图片 -- 结束
        return $product;
    }

    /**
     * 批量获取询价
     * @param array $ids 商户申请表id数组
     */
    public function getList(array $ids)
    {

        $productList = array();
        //获取用户数据
        $productInfoList = $this->productRowCacheQuery->getList($ids);
        
        foreach ($productInfoList as $productInfo) {
            $product = $this->translator->arrayToObject($productInfo);

            $productList[] = $product;
        }
        
        return $productList;
    }

    /**
     * 根据条件查询询价
     */
    public function filter(array $filter = array(), array $sort = array(), int $offset = 0, int $size = 20)
    {

        $productList = $this->ProductRowCacheQuery->find($condition, $offset, $size);

        if (empty($productList)) {
            return false;
        }
        $ids = array();
        foreach ($productList as $productInfo) {
            $ids[] = $productInfo['Product_id'];
        }
        return $this->getList($ids);
    }
}
