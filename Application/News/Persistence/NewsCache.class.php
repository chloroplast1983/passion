<?php
namespace News\Persistence;

use System\Classes\Cache;

/**
 * news表缓存文件
 * @author chloroplast
 * @version 1.0.0: 20160223
 */
class NewsCache extends Cache
{

    /**
     * 构造函数初始化key和表名一致
     */
    public function __construct()
    {
        parent::__construct('news');
    }
}
