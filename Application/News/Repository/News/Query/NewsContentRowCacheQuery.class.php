<?php
namespace News\Repository\News\Query;

use System\Query\RowCacheQuery;
use News\Persistence;

class NewsContentRowCacheQuery extends RowCacheQuery
{

    /**
     * @var string $parimartKey 查询数据的键
     */
    private $primaryKey = 'news_id';

    /**
     * @var Persistence\NewsContentCache $cacheLayer
     */
    private $cacheLayer;//缓存层

    /**
     * @var Persistence\NewsContentDb $dbLayer
     */
    private $dbLayer;//数据层

    public function __construct(Persistence\NewsContentCache $cacheLayer, Persistence\NewsContentDb $dbLayer)
    {
        $this->dbLayer = $dbLayer;
        $this->cacheLayer = $cacheLayer;
        parent::__construct($this->primaryKey, $this->cacheLayer, $this->dbLayer);
    }
}
