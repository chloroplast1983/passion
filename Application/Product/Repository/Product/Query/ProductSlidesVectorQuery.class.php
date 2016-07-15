<?php
namespace Product\Repository\Product\Query;

use System\Query\VectorQuery;
use System\Query\VectorDbQuery;
use Product\Persistence;

class ProductSlidesVectorQuery extends VectorQuery
{

    use VectorDbQuery;
    
    public function __construct(Persistence\ProductSlidesDb $dbLayer)
    {
        $this->dbLayer = $dbLayer;
    }

    public function getFileIds()
    {
    }
}
