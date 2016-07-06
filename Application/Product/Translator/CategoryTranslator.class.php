<?php
namespace Product\Translator;

use System\Classes\Translator;
use Product\Model\Category;

class CategoryTranslator extends Translator
{

    public function arrayToObject(array $expression)
    {
        $category = new Category($expression['category_id']);
        $category->setName($expression['category_name']);
        $category->setCreateTime($expression['create_time']);
        $category->setParentId($expression['parent_id']);
        $category->setType($expression['type']);
        return $category;
    }

    public function objectToArray($category, array $keys)
    {
        if (!$category instanceof Category) {
            return false;
        }

        $expression = array();
        $expression['category_id'] = $category->getId();
        $expression['category_name'] = $category->getName();
        $expression['create_time'] = $category->getCreateTime();
        $expression['parent_id'] = $category->getParentId();
        $expression['type'] = $category->getType();

        return $this->filterKeysFromArray($keys, $expression);
    }
}
