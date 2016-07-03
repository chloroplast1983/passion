<?php
namespace News\Persistence;

use System\Classes\Db;

/**
 * news_content表数据库层文件
 * @author chloroplast
 * @version 1.0.0: 20160223
 */
class NewsContentDb extends Db
{
    
    public function __construct()
    {
        parent::__construct('news_content');
    }
}
