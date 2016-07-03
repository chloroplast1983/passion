<?php
namespace Product\Persistence;

use System\Classes\Db;

/**
 * product表数据库层文件
 * @author chloroplast
 * @version 1.0.0: 20160223
 */
class ProductDb extends Db
{
    
    public function __construct()
    {
        parent::__construct('product');
    }
}
