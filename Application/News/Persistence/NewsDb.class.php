<?php
namespace News\Persistence;

use System\Classes\Db;

/**
 * news表数据库层文件
 * @author chloroplast
 * @version 1.0.0: 20160223
 */
class NewsDb extends Db
{
    
    public function __construct()
    {
        parent::__construct('news');
    }
}
