<?php
namespace News\Model;

use Common\Model\ModifyTime;
use Common\Model\Status;
use Marmot\Core;

/**
 * News 新闻领域对象
 * @author chloroplast
 * @version 1.0.0:2016.07.03
 */

class News
{
    /**
     * @var ModifyTime 时间性状
     */
    use ModifyTime;
    /**
     * @var Status 状态性状
     */
    use Status;
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
     * News 新闻领域对象 构造函数
     */
    public function __construct(int $id = 0)
    {
        global $_FWGLOBAL;
        $this->id = !empty($id) ? $id : 0;
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
     * 获取简介
     */
    public function getAbstract()
    {
        $length = 20;

        $input = html_entity_decode($this->getContent());
        //strip tags, if desired
        // if ($strip_html) {
        $input = strip_tags($input);
        // }
        
        //no need to trim, already shorter than trim length
        if (strlen($input) <= $length) {
            return $input;
        }
     
        //find last space within length
        $lastSpace = strrpos(substr($input, 0, $length), ' ');
        $abstract = substr($input, 0, $lastSpace);
    
        $abstract .= '...';
     
        return $abstract;
    }

    /**
     * 保存新闻
     */
    public function save()
    {
        $repository = Core::$container->get('News\Repository\News\NewsRepository');
        if ($this->getId() == 0) {
            return $repository->add($this);
        } else {
            return $repository->update($this, array('updateTime','title','content'));
        }
    }

    /**
     * 删除新闻
     */
    public function delete()
    {
        $repository = Core::$container->get('News\Repository\News\NewsRepository');
        if ($this->getId() == 0) {
            return false;
        }
        //设置删除状态
        $this->setStatus(STATUS_DELETE);
        return $repository->update($this, array('status','statusTime'));
    }
}
