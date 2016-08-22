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

            $this->getResponse()->view()->assign('seoTitle', 'Escalator Parts – Cheap Escalator Step, Escalator Rollers, Escalator Comb Plate online Sale');
            $this->getResponse()->view()->assign('seoKeyWords', 'escalator parts, escalator step, escalator rollers, escalator comb plate, escalator handrail');
            $this->getResponse()->view()->assign('seoDescription', 'Escalator parts product on buyelevatorparts.com. Choose quality escalator step, escalator rollers, escalator comb plate, escalator handrail products from escalator parts manufacturers and suppliers.');
        } else {

        $this->getResponse()->view()->assign('seoTitle', 'Escalator Parts - OTIS Elevator Parts and LG Elevator Parts on Elevator Parts Website Sale');
        $this->getResponse()->view()->assign('seoKeyWords', 'OTIS elevator parts, LG elevator parts, escalator parts, elevator parts website');
        $this->getResponse()->view()->assign('seoDescription', 'OTIS elevator parts,LG elevator parts and escalator parts, please choose the  sanjin elevator parts website, we are the professional manufacturer in elevator and Escalator parts field, we will offer the best service and the optimal price to you.');
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

        if (isset($filter['brand'])) {
            $this->getResponse()->view()->assign('leftNavBrandActive', true);
        }

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

            $hotProducts = array();
            
            if (!empty($hotProductIds)) {
                $hotProductIds = array_slice($hotProductIds, 0, 4);
                $repository = Core::$container->get('Product\Repository\Product\ProductRepository');
                $hotProducts =  $repository->getList($hotProductIds);
            }
            $this->getResponse()->view()->assign('hotProducts', $hotProducts);
        }

        $this->getResponse()->view()->assign('multi', $multi);
        $this->getResponse()->view()->assign('grayBg', false);
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
        if ($product->getCategory()->getParentId() > 0) {
            $repository = Core::$container->get('Product\Repository\Category\CategoryRepository');
            $parentCategory = $repository->getOne($product->getCategory()->getParentId());
            $this->getResponse()->view()->assign('parentCategory', $parentCategory);
        }

        $this->getResponse()->view()->assign('categoryList', $this->getCategories());
        $this->getResponse()->view()->assign('brandList', $this->getBrands());
        $this->getResponse()->view()->display('Home/product.tpl');
    }
}
