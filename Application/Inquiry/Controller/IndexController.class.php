<?php
namespace Inquiry\Controller;

use System\Classes\Controller;
use Home\Controller\NavigationBarController;
use Marmot\Core;
use Inquiry\Model\Inquiry;
use Product\Model\Product;

class IndexController extends Controller
{

    use NavigationBarController;

    public function __construct()
    {
        parent::__construct();
        $this->getResponse()->view()->assign('inquiryNavActive', true);
    }

    public function index(int $productId = 0)
    {

        $hotProducts = array();
        
        $product = new Product();
        if ($productId > 0) {
            $repository = Core::$container->get('Product\Repository\Product\ProductRepository');

            $product = $repository->getOne($productId);
        }

        $hotProductIds = include S_ROOT.'Application/hotProductsConfig.php';

        if (!empty($hotProductIds)) {
            $hotProductIds = array_slice($hotProductIds, 0, 4);
            $repository = Core::$container->get('Product\Repository\Product\ProductRepository');
            $hotProducts =  $repository->getList($hotProductIds);
        }

        $this->getResponse()->view()->assign('hotProducts', $hotProducts);

        $this->getResponse()->view()->assign('product', $product);
        $this->getResponse()->view()->assign('categoryList', $this->getCategories());
        $this->getResponse()->view()->assign('brandList', $this->getBrands());
        $this->getResponse()->view()->display('Home/inquiry.tpl');
    }

    /**
     * 保存
     */
    public function action(int $productId = 0)
    {

        $name = $this->getRequest()->post('name');
        $content = $this->getRequest()->post('content');
        $email = $this->getRequest()->post('email');

        /**
         * 数据校验
         */
        $inquiry = new Inquiry();
        $inquiry->setName($name);
        $inquiry->setContent($content);
        $inquiry->setEmail($email);

        if ($productId > 0) {
            $inquiry->getProduct()->setId($productId);
        }

        $inquiry->save();

        header("Location: /Inquiry/Success");
        exit();
    }

    /**
     * 保存成功
     */
    public function success()
    {

        $this->getResponse()->view()->assign('categoryList', $this->getCategories());
        $this->getResponse()->view()->assign('brandList', $this->getBrands());
        $this->getResponse()->view()->display('Home/inquirySuccess.tpl');
    }
}
