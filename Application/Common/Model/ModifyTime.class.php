<?php
namespace Common\Model;

/**
 * 时间性状,包括 创建时间 和 更新时间.
 * @author chloroplast
 * @version 1.0.0:2016.07.03
 */

trait ModifyTime
{
    /**
     * @var int $createTime 新闻发布时间
     */
    private $createTime;
    /**
     * @var int $updateTime 新闻更新时间
     */
    private $updateTime;

    /**
     * 设置新闻发布时间
     * @param int $createTime 新闻发布时间
     */
    public function setCreateTime(int $createTime)
    {
        $this->createTime = $createTime;
    }

    /**
     * 获取新闻发布时间
     * @return int $createTime 新闻发布时间
     */
    public function getCreateTime()
    {
        return $this->createTime;
    }
    /**
     * 设置新闻更新时间
     * @param int $updateTime 新闻更新时间
     */
    public function setUpdateTime(int $updateTime)
    {
        $this->updateTime = $updateTime;
    }

    /**
     * 获取新闻更新时间
     * @return int $updateTime 新闻更新时间
     */
    public function getUpdateTime()
    {
        return $this->updateTime;
    }
}
