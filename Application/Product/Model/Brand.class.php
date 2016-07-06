<?php
namespace Product\Model;

use Common\Model\ModifyTime;
use Common\Model\Status;

/**
 * Brand 商品品牌领域对象
 * @author chloroplast
 * @version 1.0.0:2016.07.03
 */

class Brand
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
     * @var int $id 品牌id
     */
    private $id;
    /**
     * @var string $name 品牌名称
     */
    private $name;

    /**
     * Brand 商品品牌领域对象 构造函数
     */
    public function __construct()
    {
        global $_FWGLOBAL;
        $this->id = 0;
        $this->name = '';
        $this->createTime = $_FWGLOBAL['timestamp'];
        $this->updateTime = $_FWGLOBAL['timestamp'];
        $this->statusTime = $_FWGLOBAL['timestamp'];
        $this->status = STATUS_NORMAL;
    }

    /**
     * Brand 商品品牌领域对象 析构函数
     */
    public function __destruct()
    {
        unset($this->id);
        unset($this->name);
        unset($this->createTime);
        unset($this->updateTime);
        unset($this->statusTime);
        unset($this->status);
    }

    /**
     * 设置品牌id
     * @param int $id 品牌id
     */
    public function setId(int $id)
    {
        $this->id = $id;
    }

    /**
     * 获取品牌id
     * @return int $id 品牌id
     */
    public function getId()
    {
        return $this->id;
    }
    /**
     * 设置品牌名称
     * @param string $name 品牌名称
     */
    public function setName(string $name)
    {
        $this->name = $name;
    }

    /**
     * 获取品牌名称
     * @return string $name 品牌名称
     */
    public function getName()
    {
        return $this->name;
    }
}
