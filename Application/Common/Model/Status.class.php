<?php
namespace Common\Model;

/**
 * 状态性状,包括 修改状态 和 状态修改的时间.
 * @author chloroplast
 * @version 1.0.0:2016.07.03
 */

trait Status
{
    /**
     * @var int $statusTime 新闻状态更新时间
     */
    private $statusTime;
    /**
     * @var int $status 新闻状态
     */
    private $status;

    /**
     * 设置新闻状态更新时间
     * @param int $statusTime 新闻状态更新时间
     */
    public function setStatusTime(int $statusTime)
    {
        $this->statusTime = $statusTime;
    }

    /**
     * 获取新闻状态更新时间
     * @return int $statusTime 新闻状态更新时间
     */
    public function getStatusTime()
    {
        return $this->statusTime;
    }

    /**
     * 设置新闻状态
     * @param int $status 新闻状态
     */
    public function setStatus(int $status)
    {
        $this->status= in_array($status, array(STATUS_NORMAL,STATUS_DELETE)) ? $status : STATUS_NORMAL;
    }

    /**
     * 获取新闻状态
     * @return int $status 新闻状态
     */
    public function getStatus()
    {
        return $this->status;
    }
}
