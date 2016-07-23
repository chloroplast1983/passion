<?php
namespace Home\Controller;

use Marmot\Core;

trait NavigationBarController
{
    private function getCategories()
    {

        $repository = Core::$container->get('Product\Repository\Category\CategoryRepository');
        $categoryList = $repository->filter(
            array('status'=>STATUS_NORMAL),
            array(),
            0,
            0,
            false
        );

        $result = array();

        foreach ($categoryList as $category) {
            if ($category->getParentId() == 0) {
                $result['type'][$category->getType()][] = $category;
            } else {
                $result['parent'][$category->getParentId()][] = $category;
            }
        }

        return $result;
    }

    private function getBrands(int $size = 0)
    {
        $repository = Core::$container->get('Product\Repository\Brand\BrandRepository');
        $brandList = $repository->filter(
            array('status'=>STATUS_NORMAL),
            array(),
            0,
            $size,
            false
        );

        return $brandList;
    }
}
