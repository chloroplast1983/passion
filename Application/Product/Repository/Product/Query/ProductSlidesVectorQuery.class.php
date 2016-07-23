<?php
namespace Product\Repository\Product\Query;

use System\Query\VectorQuery;
use System\Query\VectorDbQuery;
use Product\Persistence;

class ProductSlidesVectorQuery extends VectorQuery
{

    /**
     * @var string $parimartKey 查询数据的键
     */
    private $primaryKey = 'file_id';

    use VectorDbQuery;
    
    public function __construct(Persistence\ProductSlidesDb $dbLayer)
    {
        $this->dbLayer = $dbLayer;
    }

    public function getSlideIds(int $productId = 0)
    {
        $ids = $slideIdsList = array();

        $condition = 'product_id = '.$productId;

        $slideIdsList = $this->find($condition, 0, 0);

        if (!empty($slideIdsList)) {
            foreach ($slideIdsList as $slideInfo) {
                $ids[] = $slideInfo['file_id'];
            }
        }
        return $ids;
    }
}
