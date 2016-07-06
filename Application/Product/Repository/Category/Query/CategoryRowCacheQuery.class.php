<?php
namespace Product\Repository\Category\Query;

use System\Query\RowCacheQuery;
use Product\Persistence;

class CategoryRowCacheQuery extends RowCacheQuery
{

    /**
     * @var string $parimartKey 查询数据的键
     */
    private $primaryKey = 'category_id';

    /**
     * @var Persistence\ProductCategoryCache $cacheLayer
     */
    private $cacheLayer;//缓存层

    /**
     * @var Persistence\ProductCategoryDb $dbLayer
     */
    private $dbLayer;//数据层

    public function __construct(Persistence\ProductCategoryCache $cacheLayer, Persistence\ProductCategoryDb $dbLayer)
    {
        $this->dbLayer = $dbLayer;
        $this->cacheLayer = $cacheLayer;
        parent::__construct($this->primaryKey, $this->cacheLayer, $this->dbLayer);
    }
}
