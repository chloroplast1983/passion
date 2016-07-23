<?php
namespace Product\Repository\Category;

use Product\Repository\Category\Query;
use Product\Model\Category;
use Product\Translator\CategoryTranslator;

/**
 * Category仓库
 *
 * @author chloroplast
 * @version 1.0:20160227
 */
class CategoryRepository
{

    /**
     * @var Query\CategoryRowCacheQuery $CategoryRowCacheQuery 行缓存
     */
    private $categoryRowCacheQuery;

    /**
     * @var CategoryTranslator $translator
     */
    private $translator;

    public function __construct(Query\CategoryRowCacheQuery $categoryRowCacheQuery)
    {
        $this->categoryRowCacheQuery = $categoryRowCacheQuery;
        $this->translator = new CategoryTranslator();
    }

    public function add(Category $category)
    {
        $categoryArray = $this->translator->objectToArray($category);
        $id = $this->categoryRowCacheQuery->add($categoryArray);
        if (!$id) {
            return false;
        }
        $category->setId($id);
        return true;
    }

    public function update(Category $category, array $keys = array())
    {
        $categoryArray = $this->translator->objectToArray($category, $keys);

        $conditionArray[$this->categoryRowCacheQuery->getPrimaryKey()] = $category->getId();

        return $this->categoryRowCacheQuery->update($categoryArray, $conditionArray);
    }

    /**
     * 获取询价
     * @param integer $id 商品id
     */
    public function getOne($id)
    {
        //获取用户数据
        $categoryInfo = $this->categoryRowCacheQuery->getOne($id);
        if (empty($categoryInfo)) {
            return false;
        }

        $category = $this->translator->arrayToObject($categoryInfo);

        return $category;
    }

    /**
     * 批量获取询价
     * @param array $ids 商户申请表id数组
     */
    public function getList(array $ids)
    {

        $categoryList = array();
        //获取用户数据
        $categoryInfoList = $this->categoryRowCacheQuery->getList($ids);
        
        foreach ($categoryInfoList as $categoryInfo) {
            $category = $this->translator->arrayToObject($categoryInfo);
            $categoryList[] = $category;
        }
        
        return $categoryList;
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
            $category = new Category();

            if (isset($filter['type'])) {
                $category->setType($filter['type']);
                // $condition .= ' AND type = '.$filter['type'];
            }

            if (isset($filter['parentId'])) {
                $category->setParentId($filter['parentId']);
                // $condition .= ' AND parent_id = '.$filter['parentId'];
            }

            if (isset($filter['status'])) {
                $category->setStatus($filter['status']);
                // $condition .= ' AND status = '.$filter['status'];
            }

            $categoryArray = $this->translator->objectToArray($category, array_keys($filter));

            foreach ($categoryArray as $key => $val) {
                $val = is_numeric($val) ? $val : '\''.$val.'\'';
                $condition .= $conjection.$key.' = '.$val;
                $conjection = ' AND ';
            }
        }

        if (empty($condition)) {
            $condition = ' 1 ';
        }

        $categoryList = $this->categoryRowCacheQuery->find($condition, $offset, $size);

        if (empty($categoryList)) {
            return false;
        }
        $ids = array();
        foreach ($categoryList as $categoryInfo) {
            $ids[] = $categoryInfo[$this->categoryRowCacheQuery->getPrimaryKey()];
        }
        
        if ($countAble) {
            //计算总数
            $count = $this->categoryRowCacheQuery->count($condition);
            return array($count, $this->getList($ids));
        }
        
        return $this->getList($ids);
    }
}
