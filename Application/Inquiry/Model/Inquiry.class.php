<?php
namespace Inquiry\Model;

use Common\Model\ModifyTime;

/**
 * Inquiry 询价领域对象
 * @author chloroplast
 * @version 1.0.0:2016.07.03
 */

class Inquiry
{
    /**
     * @var ModifyTime 时间性状
     */
    use ModifyTime;
    /**
     * @var int $id 询价id
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
     * @var string $email 邮箱
     */
    private $email;

    /**
     * Inquiry 询价领域对象 构造函数
     */
    public function __construct(int $id = 0)
    {
        global $_FWGLOBAL;
        $this->id = !empty($id) ? $id : 0;
        $this->title = '';
        $this->content = '';
        $this->createTime = $_FWGLOBAL['timestamp'];
        $this->updateTime = $_FWGLOBAL['timestamp'];
        $this->email = '';
    }

    /**
     * Inquiry 询价领域对象 析构函数
     */
    public function __destruct()
    {
        unset($this->id);
        unset($this->title);
        unset($this->content);
        unset($this->createTime);
        unset($this->updateTime);
        unset($this->email);
    }

    /**
     * 设置询价id
     * @param int $id 询价id
     */
    public function setId(int $id)
    {
        $this->id = $id;
    }

    /**
     * 获取询价id
     * @return int $id 询价id
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
     * 设置邮箱
     * @param string $email 用户邮箱
     */
    public function setEmail(string $email)
    {
        $this->email = filter_var($email, FILTER_VALIDATE_EMAIL) ? $email : '';
    }

    /**
     * 获取邮箱
     * @return string $email 用户邮箱
     */
    public function getEmail()
    {
        return $this->email;
    }
}
