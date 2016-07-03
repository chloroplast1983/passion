<?php
namespace Inquiry\Persistence;

use System\Classes\Cache;

/**
 * Inquiry 表缓存文件
 * @author chloroplast
 * @version 1.0.0: 20160223
 */
class InquiryCache extends Cache
{

    /**
     * 构造函数初始化key和表名一致
     */
    public function __construct()
    {
        parent::__construct('inquiry');
    }
}
