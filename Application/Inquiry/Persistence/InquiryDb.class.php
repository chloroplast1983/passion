<?php
namespace Inquiry\Persistence;

use System\Classes\Db;

/**
 * inquiry表数据库层文件
 * @author chloroplast
 * @version 1.0.0: 20160223
 */
class InquiryDb extends Db
{
    
    public function __construct()
    {
        parent::__construct('inquiry');
    }
}
