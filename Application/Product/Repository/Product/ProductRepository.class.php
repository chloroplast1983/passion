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
    private $productSlidesVectorQuery;

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
        $productContentArray[$this->productRowCacheQuery->getPrimaryKey()] = $id;
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

        $conditionArray[$this->productRowCacheQuery->getPrimaryKey()] = $product->getId();

        list($productArray, $productContentArray) = $this->translator->objectToArray($product, $keys);

        $result = $this->productRowCacheQuery->update($productArray, $conditionArray);

        if (!$result) {
            return false;
        }

        if (!empty($productContentArray)) {
            return $this->productContentRowCacheQuery->update($productContentArray, $conditionArray);
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

        return array_merge($productArray, $fileArray);
    }

    /**
     * 添加幻灯片
     */
    public function addSlide(Product $product, File $file)
    {
        return $this->productSlidesVectorQuery->add(
            $this->slideArrayTranslator($product, $file)
        );
    }
    
    /**
     * 删除幻灯片
     */
    public function deleteSlide(Product $product, File $file)
    {
        return $this->productSlidesVectorQuery->delete(
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
        //获取logo -- 开始
        if ($product->getLogo()->getId()) {
            //获取图片 -- 开始
            $repository = Core::$container->get('Common\Repository\File\FileRepository');
            $product->setLogo($repository->getOne($product->getLogo()->getId()));
            //获取图片 -- 结束
        }
        //获取logo -- 结束

        //轮播图 -- 开始
        $slideIds = $this->productSlidesVectorQuery->getSlideIds($product->getId());
        if (!empty($slideIds)) {
            $repository = Core::$container->get('Common\Repository\File\FileRepository');
            $slideList = $repository->getList($slideIds);

            $product->setSlides($slideList);
        }
        //轮播图 -- 结束
        return $product;
    }

    /**
     * 批量获取询价
     * @param array $ids 商户申请表id数组
     */
    public function getList(array $ids)
    {
        $productList = $categoryList = $brandList = $logoList = array();
        $catrgoryIds = $brandIds = $logoIds = array();
        //获取用户数据
        $productInfoList = $this->productRowCacheQuery->getList($ids);
        
        foreach ($productInfoList as $productInfo) {
            $product = $this->translator->arrayToObject($productInfo);
            $brandIds[] = $product->getBrand()->getId();
            $categoryIds[] = $product->getCategory()->getId();
            $logoIds[] = $product->getLogo()->getId();
            $productList[] = $product;
        }

        //获取品牌
        $repository = Core::$container->get('Product\Repository\Brand\BrandRepository');
        $brandList = $repository->getList($brandIds);

        // $generator = function ($brandList) {
        //     foreach ($brandList as $brand) {
        //         yield $brand;
        //     }
        // };
        // $brandListGenerator = $generator($brandList);
        //获取分类
        $repository = Core::$container->get('Product\Repository\Category\CategoryRepository');
        $categoryList = $repository->getList($categoryIds);

        // $generator = function ($categoryList) {
        //     foreach ($categoryList as $category) {
        //         yield $category;
        //     }
        // };
        // $categoryListGenerator = $generator($categoryList);

        $repository = Core::$container->get('Common\Repository\File\FileRepository');
        $logoList = $repository->getList($logoIds);
        //拼接数组
        foreach ($productList as $product) {
            if ($product->getBrand()->getId() > 0) {
                $product->setBrand(current($brandList));
                next($brandList);
            }

            if ($product->getCategory()->getId() > 0) {
                $product->setCategory(current($categoryList));
                next($categoryList);
            }

            if ($product->getLogo()->getId() > 0) {
                $product->setLogo(current($logoList));
                next($logoList);
            }
        }

        return $productList;
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

        $product = new Product();

        if (isset($filter['status'])) {
            $product->setStatus($filter['status']);
        }

        if (isset($filter['brand'])) {
            $product->getBrand()->setId($filter['brand']);
        }

        if (isset($filter['category'])) {
            $product->getCategory()->setId($filter['category']);
        }

        list($productArray, $productContentArray) = $this->translator->objectToArray($product, array_keys($filter));
       
        foreach ($productArray as $key => $val) {
            $val = is_numeric($val) ? $val : '\''.$val.'\'';
            $condition .= $conjection.$key.' = '.$val;
            $conjection = ' AND ';
        }

        if (empty($condition)) {
            $condition = ' 1 ';
        }
       
        $productList = $this->productRowCacheQuery->find($condition, $offset, $size);

        if (empty($productList)) {
            return false;
        }
        $ids = array();
        foreach ($productList as $productInfo) {
            $ids[] = $productInfo[$this->productRowCacheQuery->getPrimaryKey()];
        }

        if ($countAble) {
            //计算总数
            $count = $this->productRowCacheQuery->count($condition);
            return array($count, $this->getList($ids));
        }
        return $this->getList($ids);
    }

    /**
     * 搜索
     * 这里需要优化使用sphinx继承抽象SearchQuery来实现,
     * 这里暂时使用链表方案来解决
     */
    public function search(
        array $filter = array(),
        array $sort = array(),
        int $offset = 0,
        int $size = 20,
        bool $countAble = true
    ) {

        $condition = $conjection = '';

        $ids = array();

        if (isset($filter['parentCategory']) && intval($filter['parentCategory']) > 0) {
            $condition .= $conjection.'parent_id='.intval($filter['parentCategory']);
            $conjection = ' AND ';
        }

        if (isset($filter['type']) && intval($filter['type']) > 0) {
            $condition .= $conjection.'type='.intval($filter['type']);
            $conjection = ' AND ';
        }

        if (isset($filter['brand']) && intval($filter['brand']) > 0) {
            $condition .= $conjection.'product.brand_id='.intval($filter['brand']);
            $conjection = ' AND ';
        }

        if (isset($filter['keyword'])) {
            $condition .= $conjection.
            ' (title like \'%'.$filter['keyword'].
            '%\' OR brand_name like \'%'.$filter['keyword'].'%\')';
        }

        $productIds = Core::$dbDriver->query('
                        SELECT product_id FROM pcore_product AS product 
                        LEFT JOIN pcore_product_category AS category 
                        ON product.category_id=category.category_id
                        LEFT JOIN pcore_product_brand AS brand 
                        ON product.brand_id=brand.brand_id
                        WHERE '.$condition. ' LIMIT '.$offset.','.$size);

        foreach ($productIds as $productId) {
            $ids[] = $productId['product_id'];
        }

        if (empty($ids)) {
            if ($countAble) {
                return array(0, array());
            }

            return array();
        }

        if ($countAble) {
            $count = Core::$dbDriver->query('
                        SELECT count(*) as count FROM pcore_product AS product 
                        LEFT JOIN pcore_product_category AS category 
                        ON product.category_id=category.category_id
                        LEFT JOIN pcore_product_brand AS brand 
                        ON product.brand_id=brand.brand_id
                        WHERE '.$condition);

            return array($count['count'], $this->getList($ids));
        }

        return $this->getList($ids);
    }
}
