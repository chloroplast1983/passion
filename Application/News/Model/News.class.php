<?php
namespace News\Model;

/**
 * News 新闻领域对象
 * @author chloroplast
 * @version 1.0.0:2016.07.03
 */

class News
{
    /**
     * @var int $id 新闻id
     */
    private $id;
    /**
     * @var string $title 标题
     */
    private $title;
    /**
     * @var string $content 内容
     */
    private $content;
    /**
     * @var int $createTime 新闻发布时间
     */
    private $createTime;
    /**
     * @var int $updateTime 新闻更新时间
     */
    private $updateTime;
    /**
     * @var int $statusTime 新闻状态更新时间
     */
    private $statusTime;
    /**
     * @var int $status 新闻状态
     */
    private $status;

    /**
     * News 新闻领域对象 构造函数
     */
    public function __construct()
    {
        global $_FWGLOBAL;
        $this->id = 0;
        $this->title = '';
        $this->content = '';
        $this->createTime = $_FWGLOBAL['timestamp'];
        $this->updateTime = $_FWGLOBAL['timestamp'];
        $this->statusTime = $_FWGLOBAL['timestamp'];
        $this->status = STATUS_NORMAL;
    }

    /**
     * News 新闻领域对象 析构函数
     */
    public function __destruct()
    {
        unset($this->id);
        unset($this->title);
        unset($this->content);
        unset($this->createTime);
        unset($this->updateTime);
        unset($this->statusTime);
        unset($this->status);
    }

    /**
     * 设置新闻id
     * @param int $id 新闻id
     */
    public function setId(int $id)
    {
        $this->id = $id;
    }

    /**
     * 获取新闻id
     * @return int $id 新闻id
     */
    public function getId()
    {
        return $this->id;
    }
    /**
     * 设置标题
     * @param string $title 标题
     */
    public function setTitle(string $title)
    {
        $this->title = $title;
    }

    /**
     * 获取标题
     * @return string $title 标题
     */
    public function getTitle()
    {
        return $this->title;
    }
    /**
     * 设置内容
     * @param string $content 内容
     */
    public function setContent(string $content)
    {
        $this->content = $content;
    }

    /**
     * 获取内容
     * @return string $content 内容
     */
    public function getContent()
    {
        return $this->content;
    }
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
