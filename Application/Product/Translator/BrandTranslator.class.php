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
        $brand->setLogo($expression['logo']);
        return $brand;
    }

    public function objectToArray($brand, array $keys)
    {
        if (!$brand instanceof Brand) {
            return false;
        }

        $expression = array();
        $expression['brand_id'] = $brand->getId();
        $expression['brand_name'] = $brand->getName();
        $expression['update_time'] = $brand->getUpdateTime();
        $expression['create_time'] = $brand->getCreateTime();
        $expression['status_time'] = $brand->getStatusTime();
        $expression['status'] = $brand->getStatus();
        $expression['logo'] = $brand->getLogo();

        return $this->filterKeysFromArray($keys, $expression);
    }
}
