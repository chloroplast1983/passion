<?php
namespace Inquiry\Repository\Inquiry\Query;

use System\Query\RowCacheQuery;
use Inquiry\Persistence;

class InquiryRowCacheQuery extends RowCacheQuery
{

    /**
     * @var string $parimartKey 查询数据的键
     */
    private $primaryKey = 'inquiry_id';

    /**
     * @var Persistence\InquiryCache $cacheLayer
     */
    private $cacheLayer;//缓存层

    /**
     * @var Persistence\InquiryDb $dbLayer
     */
    private $dbLayer;//数据层

    public function __construct(Persistence\InquiryCache $cacheLayer, Persistence\InquiryDb $dbLayer)
    {
        $this->dbLayer = $dbLayer;
        $this->cacheLayer = $cacheLayer;
        parent::__construct($this->primaryKey, $this->cacheLayer, $this->dbLayer);
    }
}
