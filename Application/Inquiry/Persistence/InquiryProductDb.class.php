<?php
namespace Inquiry\Persistence;

use System\Classes\Db;

/**
 * inquiry_product_relation表数据库层文件
 * @author chloroplast
 * @version 1.0.0: 20160223
 */
class InquiryProductDb extends Db
{
    
    public function __construct()
    {
        parent::__construct('inquiry_product_relation');
    }
}
