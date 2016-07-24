<?php
namespace Home\Controller;

use System\Classes\Controller;
use Marmot\Core;

class IndexController extends Controller
{

    use NavigationBarController;

    public function index()
    {
        //新闻列表
        $repository = Core::$container->get('News\Repository\News\NewsRepository');
        $newsList = $repository->filter(
            array('status'=>STATUS_NORMAL),
            array(),
            0,
            5,
            false
        );

        $hotProductIds = include S_ROOT.'Application/hotProductsConfig.php';
       
        if (!empty($hotProductIds)) {
            $repository = Core::$container->get('Product\Repository\Product\ProductRepository');
            $hotProducts =  $repository->getList($hotProductIds);
        }

        $featuredCategories = include S_ROOT.'Application/featuredCategoriesConfig.php';
        $this->getResponse()->view()->assign('hotProducts', $hotProducts);
        $this->getResponse()->view()->assign('featuredCategories', $featuredCategories);

        $this->getResponse()->view()->assign('homeNavActive', true);
        $this->getResponse()->view()->assign('newsList', $newsList);
        $this->getResponse()->view()->assign('categoryList', $this->getCategories());
        $this->getResponse()->view()->assign('brandList', $this->getBrands());
        $this->getResponse()->view()->display('Home/index.tpl');
    }

    public function about()
    {
        $this->getResponse()->view()->assign('aboutNavActive', true);
        $this->getResponse()->view()->assign('categoryList', $this->getCategories());
        $this->getResponse()->view()->assign('brandList', $this->getBrands());
        $this->getResponse()->view()->display('Home/about.tpl');
    }

    public function contacts()
    {
        $this->getResponse()->view()->assign('categoryList', $this->getCategories());
        $this->getResponse()->view()->assign('brandList', $this->getBrands());
        $this->getResponse()->view()->assign('contactsNavActive', true);
        $this->getResponse()->view()->display('Home/contacts.tpl');
    }
}
