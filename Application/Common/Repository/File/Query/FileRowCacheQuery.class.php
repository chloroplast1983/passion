<?php
namespace Common\Repository\File\Query;

use System\Query\RowCacheQuery;
use Common\Persistence;

class FileRowCacheQuery extends RowCacheQuery
{

    /**
     * @var string $parimartKey 查询数据的键
     */
    private $primaryKey = 'file_id';

    /**
     * @var Persistence\FileCache $cacheLayer
     */
    private $cacheLayer;//缓存层

    /**
     * @var Persistence\FileDb $dbLayer
     */
    private $dbLayer;//数据层

    public function __construct(Persistence\FileCache $cacheLayer, Persistence\FileDb $dbLayer)
    {
        $this->dbLayer = $dbLayer;
        $this->cacheLayer = $cacheLayer;
        parent::__construct($this->primaryKey, $this->cacheLayer, $this->dbLayer);
    }
}
