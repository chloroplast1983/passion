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

        $this->getResponse()->view()->assign('seoTitle', 'Buy Elevator Parts, Escalator Parts from China Elevator Parts Suppliers');
        $this->getResponse()->view()->assign('seoKeyWords', 'elevator parts, escalator parts, elevator parts suppliers, elevator parts company, elevator parts manufacturer');
        $this->getResponse()->view()->assign('seoDescription', 'We are the professional elevator parts manufacturer in china. We can produce elevator parts and escalator parts to your requirements. If you want get more types of elevator parts please contact us');

        $this->getResponse()->view()->display('Home/index.tpl');
    }

    public function about()
    {
        $this->getResponse()->view()->assign('aboutNavActive', true);
        $this->getResponse()->view()->assign('categoryList', $this->getCategories());
        $this->getResponse()->view()->assign('brandList', $this->getBrands());

        $this->getResponse()->view()->assign('seoTitle', 'Elevator Parts Wholesale from The Elevator Parts Website');
        $this->getResponse()->view()->assign('seoKeyWords', 'elevator parts, escalator parts, elevator parts website, elevator parts wholesale, elevator parts factory');
        $this->getResponse()->view()->assign('seoDescription', 'Passion elevator parts factory supply elevator parts&escalator parts, elevator parts wholesale from the elevator parts website. Our product has spreaded the whole elevator parts market, welcome to buy.');
            
        $this->getResponse()->view()->display('Home/about.tpl');
    }

    public function contacts()
    {
        $this->getResponse()->view()->assign('categoryList', $this->getCategories());
        $this->getResponse()->view()->assign('brandList', $this->getBrands());
        $this->getResponse()->view()->assign('contactsNavActive', true);

        $this->getResponse()->view()->assign('seoTitle', 'Buy Elevator Parts, Escalator Parts, Elevator Spare Parts Please Contact US');
        $this->getResponse()->view()->assign('seoKeyWords', 'elevator parts, escalator parts, elevator spare parts, elevator encoder, escalator step');
        $this->getResponse()->view()->assign('seoDescription', "xi'an passion elevator parts co.,Ltd supplies elevator parts & escalator parts, elevator encoder,escalator step. If you need elevator parts and know more about the parts information ,please contact us.");

        $this->getResponse()->view()->display('Home/contacts.tpl');
    }
}
