<?php
namespace Product\Model;

use Common\Model\ModifyTime;
use Common\Model\Status;
use Marmot\Core;

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
     * @var int $logo 品牌logo
     */
    private $logo;

    /**
     * Brand 商品品牌领域对象 构造函数
     */
    public function __construct(int $id = 0)
    {
        global $_FWGLOBAL;
        $this->id = !empty($id) ? $id : 0;
        $this->name = '';
        $this->createTime = $_FWGLOBAL['timestamp'];
        $this->updateTime = $_FWGLOBAL['timestamp'];
        $this->statusTime = $_FWGLOBAL['timestamp'];
        $this->status = STATUS_NORMAL;
        $this->logo = 0;
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
        unset($this->logo);
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

    /**
     * 设定品牌 logo
     * @param int $logo 品牌logo
     */
    public function setLogo(int $logo)
    {
        $this->logo = $logo;
    }

    /**
     * 返回品牌 logo
     * @return int $logo 品牌logo
     */
    public function getLogo()
    {
        return $this->logo;
    }

    /**
     * 保存品牌
     */
    public function save()
    {
        $repository = Core::$container->get('Product\Repository\Brand\BrandRepository');
        if ($this->getId() == 0) {
            return $repository->add($this);
        } else {
            return $repository->update($this, array('updateTime','name','logo'));
        }
    }

    /**
     * 删除品牌
     */
    public function delete()
    {
        $repository = Core::$container->get('Product\Repository\Brand\BrandRepository');
        if ($this->getId() == 0) {
            return false;
        }
        //设置删除状态
        $this->setStatus(STATUS_DELETE);
        return $repository->update($this, array('status','statusTime'));
    }
}
