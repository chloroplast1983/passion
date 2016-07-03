<?php
namespace Product\Persistence;

use System\Classes\Db;

/**
 * product_content表数据库层文件
 * @author chloroplast
 * @version 1.0.0: 20160223
 */
class ProductContentDb extends Db
{
    
    public function __construct()
    {
        parent::__construct('product_content');
    }
}
