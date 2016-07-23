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
        $category->setUpdateTime($expression['update_time']);
        $category->setStatusTime($expression['status_time']);
        $category->setStatus($expression['status']);
        $category->setParentId($expression['parent_id']);
        $category->setType($expression['type']);
        return $category;
    }

    public function objectToArray($category, array $keys = array())
    {
        if (!$category instanceof Category) {
            return false;
        }

        if (empty($keys)) {
            $keys = array(
                        'id',
                        'name',
                        'createTime',
                        'updateTime',
                        'statusTime',
                        'status',
                        'parentId',
                        'type',
                    );
        }

        $expression = array();
        if (in_array('id', $keys)) {
            $expression['category_id'] = $category->getId();
        }
        
        if (in_array('name', $keys)) {
            $expression['category_name'] = $category->getName();
        }

        if (in_array('updateTime', $keys)) {
            $expression['update_time'] = $category->getUpdateTime();
        }

        if (in_array('statusTime', $keys)) {
            $expression['status_time'] = $category->getStatusTime();
        }

        if (in_array('status', $keys)) {
            $expression['status'] = $category->getStatus();
        }

        if (in_array('createTime', $keys)) {
            $expression['create_time'] = $category->getCreateTime();
        }

        if (in_array('parentId', $keys)) {
            $expression['parent_id'] = $category->getParentId();
        }

        if (in_array('type', $keys)) {
            $expression['type'] = $category->getType();
        }

        return $expression;
    }
}
