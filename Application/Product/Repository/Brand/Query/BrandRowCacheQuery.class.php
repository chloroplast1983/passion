<?php
namespace Product\Repository\Brand\Query;

use System\Query\RowCacheQuery;
use Product\Persistence;

class BrandRowCacheQuery extends RowCacheQuery
{

    /**
     * @var string $parimartKey 查询数据的键
     */
    private $primaryKey = 'brand_id';

    /**
     * @var Persistence\ProductBrandCache $cacheLayer
     */
    private $cacheLayer;//缓存层

    /**
     * @var Persistence\ProductBrandDb $dbLayer
     */
    private $dbLayer;//数据层

    public function __construct(Persistence\ProductBrandCache $cacheLayer, Persistence\ProductBrandDb $dbLayer)
    {
        $this->dbLayer = $dbLayer;
        $this->cacheLayer = $cacheLayer;
        parent::__construct($this->primaryKey, $this->cacheLayer, $this->dbLayer);
    }
}
