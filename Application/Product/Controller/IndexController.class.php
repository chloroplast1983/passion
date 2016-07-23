<?php
namespace Product\Controller;

use System\Classes\Controller;
use Home\Controller\NavigationBarController;
use Marmot\Core;
use Product\Model\Product;

class IndexController extends Controller
{

    use NavigationBarController;

    public function __construct()
    {
        
        parent::__construct();

        $filter = $this->getRequest()->get('filter');

        if ($filter['type'] == 1) {
            $this->getResponse()->view()->assign('productEscalatorNavActive', true);
        } else {
            $this->getResponse()->view()->assign('productNavActive', true);
        }
    }

    public function index()
    {

        $perpage = 12;
        $curpage = !empty($_GET['page']) ? $_GET['page'] : 1;
        $start = ($curpage-1)*$perpage;

        $this->getResponse()->view()->assign('productListRef', true);

        $productList = $filter = array();

        $filter = $this->getRequest()->get('filter');

        $filter = is_array($filter) ? $filter : array('status'=>STATUS_NORMAL);

        $repository = Core::$container->get('Product\Repository\Product\ProductRepository');

        if (isset($filter['parentCategory']) || isset($filter['type']) || isset($filter['keyword'])) {
            list($num, $productList) = $repository->search(
                $filter,
                array(),
                $start,
                $perpage
            );
        } else {
            list($num, $productList) = $repository->filter(
                $filter,
                array(),
                $start,
                $perpage
            );
        }

        $urlCondition = http_build_query(array('filter'=>$filter));
       
        $multi = $this->getResponse()->multiPages(
            $num,
            $perpage,
            $curpage,
            '/Product?'.$urlCondition
        );

        $this->getResponse()->view()->assign('productList', $productList);

        if (empty($productList)) {
            $hotProductIds = include S_ROOT.'Application/hotProductsConfig.php';

            $hotProductIds = array_slice($hotProductIds, 0, 4);
            $repository = Core::$container->get('Product\Repository\Product\ProductRepository');
            $hotProducts =  $repository->getList($hotProductIds);
            $this->getResponse()->view()->assign('hotProducts', $hotProducts);
        }

        $this->getResponse()->view()->assign('multi', $multi);
        $this->getResponse()->view()->assign('categoryList', $this->getCategories());
        $this->getResponse()->view()->assign('brandList', $this->getBrands());
        $this->getResponse()->view()->display('Home/productIndex.tpl');
    }

    public function get(int $productId)
    {

        $repository = Core::$container->get('Product\Repository\Product\ProductRepository');

        $product = new Product();
        $product = $repository->getOne($productId);
        
        $this->getResponse()->view()->assign('product', $product);
        $this->getResponse()->view()->assign('categoryList', $this->getCategories());
        $this->getResponse()->view()->assign('brandList', $this->getBrands());
        $this->getResponse()->view()->display('Home/product.tpl');
    }
}
