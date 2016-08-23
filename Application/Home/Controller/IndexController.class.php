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
        $this->getResponse()->view()->assign('grayBg', true);
        $this->getResponse()->view()->assign('newsList', $newsList);
        $this->getResponse()->view()->assign('categoryList', $this->getCategories());
        $this->getResponse()->view()->assign('brandList', $this->getBrands());

        $this->getResponse()->view()->assign('seoTitle', 'Top10 Elevator Parts and Escalator Parts Supplier | Passion Elevator Parts');
        $this->getResponse()->view()->assign('seoKeyWords', '');
        $this->getResponse()->view()->assign('seoDescription', "We are a professional elevator parts and escalator parts supplier in China which have a great variety of goods such as OTIS, Schindler, KONE, Sigma, Mitsubishi, Hyundai,etc. Contact us for any elevator parts need - we're here to help !");

        $this->getResponse()->view()->display('Home/index.tpl');
    }

    public function about()
    {
        $this->getResponse()->view()->assign('aboutNavActive', true);
        $this->getResponse()->view()->assign('categoryList', $this->getCategories());
        $this->getResponse()->view()->assign('brandList', $this->getBrands());

        $this->getResponse()->view()->assign('seoTitle', 'Elevator Components Sale on Passion Elevator Parts Manufacturer');
        $this->getResponse()->view()->assign('seoKeyWords', '');
        $this->getResponse()->view()->assign('seoDescription', 'We are the professional elevator parts manufacturer in china. We can produce elevator parts and escalator parts to your requirements. If you want get more types of  elevator components please contact us.');
            
        $this->getResponse()->view()->display('Home/about.tpl');
    }

    public function contacts()
    {
        $this->getResponse()->view()->assign('categoryList', $this->getCategories());
        $this->getResponse()->view()->assign('brandList', $this->getBrands());
        $this->getResponse()->view()->assign('contactsNavActive', true);

        $this->getResponse()->view()->assign('seoTitle', 'Get Elevator Parts Price and Information Please Contact Us');
        $this->getResponse()->view()->assign('seoKeyWords', '');
        $this->getResponse()->view()->assign('seoDescription', 'Passion elevator parts factory sales directly with cheaper price. Welcome to contact us for the elevator parts.');

        $this->getResponse()->view()->display('Home/contacts.tpl');
    }
}
