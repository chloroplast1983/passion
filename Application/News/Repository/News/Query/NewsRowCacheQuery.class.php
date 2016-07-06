<?php
namespace News\Repository\News\Query;

use System\Query\RowCacheQuery;
use News\Persistence;

class NewsRowCacheQuery extends RowCacheQuery
{

    /**
     * @var string $parimartKey 查询数据的键
     */
    private $primaryKey = 'news_id';

    /**
     * @var Persistence\NewsCache $cacheLayer
     */
    private $cacheLayer;//缓存层

    /**
     * @var Persistence\NewsDb $dbLayer
     */
    private $dbLayer;//数据层

    public function __construct(Persistence\NewsCache $cacheLayer, Persistence\NewsDb $dbLayer)
    {
        $this->dbLayer = $dbLayer;
        $this->cacheLayer = $cacheLayer;
        parent::__construct($this->primaryKey, $this->cacheLayer, $this->dbLayer);
    }
}
