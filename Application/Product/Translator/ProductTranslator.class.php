<?php
namespace Product\Translator;

use System\Classes\Translator;
use Product\Model\product;

class ProductTranslator extends Translator
{

    public function arrayToObject(array $expression)
    {
        $product = new product($expression['product_id']);
        $product->setTitle($expression['title']);
        $product->setUpdateTime($expression['update_time']);
        $product->setCreateTime($expression['create_time']);
        $product->setStatusTime($expression['status_time']);
        $product->setStatus($expression['status']);
        $product->getCategory()->setId($expression['category_id']);
        $product->getBrand()->setId($expression['brand_id']);
        $product->setModel($expression['model']);
        $product->setNumber($expression['number']);
        $product->setMoq($expression['moq']);
        $product->setWarrantyTime($expression['warranty_time']);
        $product->setCertificates($expression['certificates']);
        if (isset($expression['content'])) {
            $product->setContent($expression['content']);
        }
        return $product;
    }

    public function objectToArray($product, array $keys = array())
    {
        if (!$product instanceof Product) {
            return false;
        }

        $expression = array();
        $expression['product_id'] = $product->getId();
        $expression['title'] = $product->getTitle();
        $expression['update_time'] = $product->getUpdateTime();
        $expression['create_time'] = $product->getCreateTime();
        $expression['status_time'] = $product->getStatusTime();
        $expression['status'] = $product->getStatus();
        $expression['content'] = $product->getContent();
        $expression['category_id'] = $product->getCategory()->getId();
        $expression['brand_id'] = $product->getBrand()->getId();
        $expression['model'] = $product->getModel();
        $expression['number'] = $product->getNumber();
        $expression['moq'] = $product->getMoq();
        $expression['warranty_time'] = $product->getWarrantyTime();
        $expression['certificates'] = $product->getCertificates();

        $filteredResult = $this->filterKeysFromArray($keys, $expression);

        if (isset($filteredResult['content'])) {
            $productContent['product_id'] = $expression['product_id'];
            $productContent['content'] = $expression['content'];
            unset($filteredResult['content']);
        }

        return array($filteredResult, $productContent);
    }
}
