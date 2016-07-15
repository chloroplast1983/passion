<?php
namespace Product\Translator;

use System\Classes\Translator;
use Product\Model\Brand;

class BrandTranslator extends Translator
{

    public function arrayToObject(array $expression)
    {
        $brand = new Brand($expression['brand_id']);
        $brand->setName($expression['brand_name']);
        $brand->setUpdateTime($expression['update_time']);
        $brand->setCreateTime($expression['create_time']);
        $brand->setStatusTime($expression['status_time']);
        $brand->setStatus($expression['status']);
        $brand->getLogo()->setId($expression['logo']);
        return $brand;
    }

    public function objectToArray($brand, array $keys = array())
    {
        if (!$brand instanceof Brand) {
            return false;
        }

        if (empty($keys)) {
            $keys = array(
                        'id',
                        'name',
                        'updateTime',
                        'createTime',
                        'statusTime',
                        'status',
                        'logo'
                    );
        }

        $expression = array();
        $expression['brand_id'] = $brand->getId();

        if (in_array('name', $keys)) {
            $expression['brand_name'] = $brand->getName();
        }

        if (in_array('updateTime', $keys)) {
            $expression['update_time'] = $brand->getUpdateTime();
        }

        if (in_array('createTime', $keys)) {
            $expression['create_time'] = $brand->getCreateTime();
        }

        if (in_array('statusTime', $keys)) {
            $expression['status_time'] = $brand->getStatusTime();
        }

        if (in_array('status', $keys)) {
            $expression['status'] = $brand->getStatus();
        }

        if (in_array('logo', $keys)) {
            $expression['logo'] = $brand->getLogo()->getId();
        }

        return $expression;
    }
}
