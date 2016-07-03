<?php
namespace Product\Persistence;

use System\Classes\Db;

/**
 * product_category表数据库层文件
 * @author chloroplast
 * @version 1.0.0: 20160223
 */
class ProductCategoryDb extends Db
{
    
    public function __construct()
    {
        parent::__construct('product_category');
    }
}
