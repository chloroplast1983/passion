<?php
//powered by kevin
namespace Common\Persistence;

use System\Classes\Cache;

/**
 * 文件缓存类
 */
class FileCache extends Cache
{

    public function __construct()
    {
        parent::__construct('file');
    }
}
