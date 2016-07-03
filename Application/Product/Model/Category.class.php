<?php
namespace Product\Model;

/**
 * Category 商品分类领域对象
 * @author chloroplast
 * @version 1.0.0:2016.07.03
 */

class Category
{
    /**
     * @var int $id 分类id
     */
    private $id;
    /**
     * @var string $name 商品分类名称
     */
    private $name;
    /**
     * @var int $parentId 分类父id
     */
    private $parentId;
    /**
     * @var int $createTime 分类创建时间
     */
    private $createTime;
    /**
     * @var int $type 商品分类类型
     */
    private $type;

    /**
     * Category 商品分类领域对象 构造函数
     */
    public function __construct()
    {
        global $_FWGLOBAL;
        $this->id = 0;
        $this->name = '';
        $this->parentId = 0;
        $this->createTime = $_FWGLOBAL['timestamp'];
        $this->type = TYPE_ELEVATOR;
    }

    /**
     * Category 商品分类领域对象 析构函数
     */
    public function __destruct()
    {
        unset($this->id);
        unset($this->name);
        unset($this->parentId);
        unset($this->createTime);
        unset($this->type);
    }

    /**
     * 设置分类id
     * @param int $id 分类id
     */
    public function setId(int $id)
    {
        $this->id = $id;
    }

    /**
     * 获取分类id
     * @return int $id 分类id
     */
    public function getId()
    {
        return $this->id;
    }
    /**
     * 设置商品分类名称
     * @param string $name 商品分类名称
     */
    public function setName(string $name)
    {
        $this->name = $name;
    }

    /**
     * 获取商品分类名称
     * @return string $name 商品分类名称
     */
    public function getName()
    {
        return $this->name;
    }
    /**
     * 设置分类父id
     * @param int $parentId 分类父id
     */
    public function setParentId(int $parentId)
    {
        $this->parentId = $parentId;
    }

    /**
     * 获取分类父id
     * @return int $parentId 分类父id
     */
    public function getParentId()
    {
        return $this->parentId;
    }
    /**
     * 设置分类创建时间
     * @param int $createTime 分类创建时间
     */
    public function setCreateTime(int $createTime)
    {
        $this->createTime = $createTime;
    }

    /**
     * 获取分类创建时间
     * @return int $createTime 分类创建时间
     */
    public function getCreateTime()
    {
        return $this->createTime;
    }
    /**
     * 设置商品分类类型
     * @param int $type 商品分类类型
     */
    public function setType(int $type)
    {
        $this->type= in_array($type, array(TYPE_ESCALATOR,TYPE_ELEVATOR)) ? $type : TYPE_ELEVATOR;
    }

    /**
     * 获取商品分类类型
     * @return int $type 商品分类类型
     */
    public function getType()
    {
        return $this->type;
    }
}
