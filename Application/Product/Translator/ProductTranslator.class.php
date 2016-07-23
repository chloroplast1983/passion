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
        $product->getLogo()->setId($expression['logo']);
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

        if (empty($keys)) {
            $keys = array(
                        'id',
                        'title',
                        'updateTime',
                        'createTime',
                        'statusTime',
                        'status',
                        'category',
                        'brand',
                        'model',
                        'number',
                        'moq',
                        'warrantyTime',
                        'certificates',
                        'content',
                        'logo'
                    );
        }

        $expression = $productContent = array();

        if (in_array('id', $keys)) {
            $expression['product_id'] = $product->getId();
        }

        if (in_array('title', $keys)) {
            $expression['title'] = $product->getTitle();
        }
        
        if (in_array('updateTime', $keys)) {
            $expression['update_time'] = $product->getUpdateTime();
        }

        if (in_array('createTime', $keys)) {
            $expression['create_time'] = $product->getCreateTime();
        }

        if (in_array('statusTime', $keys)) {
            $expression['status_time'] = $product->getStatusTime();
        }
       
        if (in_array('status', $keys)) {
            $expression['status'] = $product->getStatus();
        }

        if (in_array('category', $keys)) {
            $expression['category_id'] = $product->getCategory()->getId();
        }

        if (in_array('brand', $keys)) {
            $expression['brand_id'] = $product->getBrand()->getId();
        }

        if (in_array('model', $keys)) {
            $expression['model'] = $product->getModel();
        }

        if (in_array('number', $keys)) {
            $expression['number'] = $product->getNumber();
        }

        if (in_array('moq', $keys)) {
            $expression['moq'] = $product->getMoq();
        }

        if (in_array('warrantyTime', $keys)) {
            $expression['warranty_time'] = $product->getWarrantyTime();
        }

        if (in_array('certificates', $keys)) {
            $expression['certificates'] = $product->getCertificates();
        }

        if (in_array('content', $keys)) {
            $productContent['product_id'] = $expression['product_id'];
            $productContent['content'] = $product->getContent();
        }

        if (in_array('logo', $keys)) {
            $expression['logo'] = $product->getLogo()->getId();
        }
        
        return array($expression, $productContent);
    }
}
