<?php
namespace Product\Repository\Product;

use Product\Repository\Product\Query;
use Product\Model\Product;
use Product\Translator\ProductTranslator;
use Marmot\Core;
use Common\Model\File;

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

    /**
     * @var Query\ProductSlidesVectorQuery $productSlidesVectorQuery 幻灯片关系缓存
     */

    public function __construct(
        Query\ProductRowCacheQuery $productRowCacheQuery,
        Query\ProductContentRowCacheQuery $productContentRowCacheQuery,
        Query\ProductSlidesVectorQuery $productSlidesVectorQuery
    ) {
    
        $this->productRowCacheQuery = $productRowCacheQuery;
        $this->productContentRowCacheQuery = $productContentRowCacheQuery;
        $this->productSlidesVectorQuery = $productSlidesVectorQuery;
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
     * Product 对象, File 对象
     * 转换成数组
     */
    private function slideArrayTranslator(Product $product, File $file)
    {
        list($productArray, $productContentArray) = $this->translator->objectToArray($product, array('id'));
        $fileTranslator = new \Common\Translator\FileTranslator();
        $fileArray = $fileTranslator->objectToArray($file, array('id'));

        return array($productArray, $fileArray);
    }

    /**
     * 添加幻灯片
     */
    public function addSlide(Product $product, File $file)
    {
        $this->productSlidesVectorQuery->add(
            $this->slideArrayTranslator($product, $file)
        );
    }
    
    /**
     * 删除幻灯片
     */
    public function deleteSlide(Product $product, File $file)
    {
        $this->productSlidesVectorQuery->delete(
            $this->slideArrayTranslator($product, $file)
        );
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

        $productContentInfo = $this->productContentRowCacheQuery->getOne($id);

        $productInfo = array_merge($productInfo, $productContentInfo);

        $product = $this->translator->arrayToObject($productInfo);

        //获取品牌
        $repository = Core::$container->get('Product\Repository\Brand\BrandRepository');
        $product->setBrand($repository->getOne($product->getBrand()->getId()));
        //获取分类
        if ($product->getCategory()->getId() > 0) {
            $repository = Core::$container->get('Product\Repository\Category\CategoryRepository');
            $product->setCategory($repository->getOne($product->getCategory()->getId()));
        }
        //获取幻灯片 -- 开始
        // $this->productSlidesVectorQuery->
        //获取幻灯片 -- 结束
        return $product;
    }

    /**
     * 批量获取询价
     * @param array $ids 商户申请表id数组
     */
    public function getList(array $ids)
    {
        $productList = $catrgoryIds = $brandIds = array();
        //获取用户数据
        $productInfoList = $this->productRowCacheQuery->getList($ids);
        
        foreach ($productInfoList as $productInfo) {
            $product = $this->translator->arrayToObject($productInfo);
            $brandIds[] = $product->getBrand()->getId();
            $categoryIds[] = $product->getCategory()->getId();
            $productList[] = $product;
        }

        //获取品牌
        $repository = Core::$container->get('Product\Repository\Brand\BrandRepository');
        $brandList = $repository->getList($brandIds);

        $generator = function ($brandList) {
            foreach ($brandList as $brand) {
                yield $brand;
            }
        };
        $brandListGenerator = $generator($brandList);
        //获取分类
        $repository = Core::$container->get('Product\Repository\Category\CategoryRepository');
        $categoryList = $repository->getList($categoryIds);

        $generator = function ($categoryList) {
            foreach ($categoryList as $category) {
                yield $category;
            }
        };
        $categoryListGenerator = $generator($categoryList);

        //拼接数组
        foreach ($productList as $product) {
            if ($product->getBrand()->getId() > 0) {
                $product->setBrand($brandListGenerator->current());
                $brandListGenerator->next();
            }

            if ($product->getCategory()->getId() > 0) {
                $product->setCategory($categoryListGenerator->current());
                $categoryListGenerator->next();
            }
        }

        return $productList;
    }

    /**
     * 根据条件查询询价
     */
    public function filter(array $filter = array(), array $sort = array(), int $offset = 0, int $size = 20)
    {

        $condition = '1';

        if (isset($filter['status'])) {
            $condition .= ' AND status = '.$filter['status'];
        }

        $productList = $this->productRowCacheQuery->find($condition, $offset, $size);

        if (empty($productList)) {
            return false;
        }
        $ids = array();
        foreach ($productList as $productInfo) {
            $ids[] = $productInfo['product_id'];
        }
        return $this->getList($ids);
    }
}
