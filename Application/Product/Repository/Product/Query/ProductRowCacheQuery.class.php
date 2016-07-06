<?php
namespace Product\Repository\Product\Query;

use System\Query\RowCacheQuery;
use Product\Persistence;

class ProductRowCacheQuery extends RowCacheQuery
{

    /**
     * @var string $parimartKey 查询数据的键
     */
    private $primaryKey = 'product_id';

    /**
     * @var Persistence\ProductCache $cacheLayer
     */
    private $cacheLayer;//缓存层

    /**
     * @var Persistence\ProductDb $dbLayer
     */
    private $dbLayer;//数据层

    public function __construct(Persistence\ProductCache $cacheLayer, Persistence\ProductDb $dbLayer)
    {
        $this->dbLayer = $dbLayer;
        $this->cacheLayer = $cacheLayer;
        parent::__construct($this->primaryKey, $this->cacheLayer, $this->dbLayer);
    }
}
