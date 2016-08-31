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

            $this->getResponse()->view()->assign('seoTitle', 'Escalator Spare Parts Supplier Sale Escalator Handrail and Escalator Step Chain');
            $this->getResponse()->view()->assign('seoKeyWords', '');
            $this->getResponse()->view()->assign('seoDescription', 'Escalator spare parts supplier, supply escalator handrail, escalator step chain and escalator comb Plate  for you. More escalator parts products info click here.');
        } else {

            $this->getResponse()->view()->assign('seoTitle', 'One-Stop Elevator Spare Parts Service in Passion Elevator Parts Company');
            $this->getResponse()->view()->assign('seoKeyWords', '');
            $this->getResponse()->view()->assign('seoDescription', "We are a professional elevator parts and escalator parts supplier in China which have a great variety of goods such as OTIS, Schindler, KONE, Sigma, Mitsubishi, Hyundai,etc. Contact us for any elevator parts need - we're here to help !");
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

            $filter['brand'] = intval($filter['brand']);

            $repository = Core::$container->get('Product\Repository\Brand\BrandRepository');
            $brand = $repository->getOne($filter['brand']);

            if ($brand instanceof \Product\Model\Brand) {

                $this->getResponse()->view()->assign('brandSearch', true);
                $this->getResponse()->view()->assign('brand', $brand);
                $this->getResponse()->view()->assign('leftNavBrandActive', true);
            }
        }

        if (isset($filter['category'])) {

            $filter['category'] = intval($filter['category']);

            if (!empty($filter['category'])) {
                $repository = Core::$container->get('Product\Repository\Category\CategoryRepository');
                $category = $repository->getOne($filter['category']);

                if($category instanceof \Product\Model\Category) {
                    $this->getResponse()->view()->assign('categorySearch', true);
                    $this->getResponse()->view()->assign('category', $category);

                    $parentCategory = $repository->getOne($category->getParentId());
                    $this->getResponse()->view()->assign('parentCategory', $parentCategory);
                    $this->getResponse()->view()->assign('seoTitle', $category->getSeoTitle());
                    $this->getResponse()->view()->assign('seoKeyWords', $category->getSeoKeyword());
                    $this->getResponse()->view()->assign('seoDescription', $category->getSeoDescription());
                }
            }
        }

        if (isset($filter['parentCategory'])) {
            $filter['parentCategory'] = intval($filter['parentCategory']);
            $repository = Core::$container->get('Product\Repository\Category\CategoryRepository');
            $parentCategory = $repository->getOne($filter['parentCategory']);
            
            if($parentCategory instanceof \Product\Model\Category) {

                $this->getResponse()->view()->assign('parentCategorySearch', true);
                $this->getResponse()->view()->assign('parentCategory', $parentCategory);
                $this->getResponse()->view()->assign('seoTitle', $parentCategory->getSeoTitle());
                $this->getResponse()->view()->assign('seoKeyWords', $parentCategory->getSeoKeyword());
                $this->getResponse()->view()->assign('seoDescription', $parentCategory->getSeoDescription());
            }
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
        $this->getResponse()->view()->assign('grayBg', true);
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

        $this->getResponse()->view()->assign('seoTitle', $product->getSeoTitle());
        $this->getResponse()->view()->assign('seoKeyWords', $product->getSeoKeyword());
        $this->getResponse()->view()->assign('seoDescription', $product->getSeoDescription());

        $this->getResponse()->view()->assign('categoryList', $this->getCategories());
        $this->getResponse()->view()->assign('brandList', $this->getBrands());
        $this->getResponse()->view()->display('Home/product.tpl');
    }
}
