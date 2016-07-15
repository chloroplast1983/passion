<?php
namespace Admin\Controller;

use System\Classes\Controller;
use Marmot\Core;
use Product\Model\Product;

class ProductController extends Controller
{

    use AdminController;

    public function __construct()
    {
        parent::__construct();

        $this->getResponse()->view()->assign('productSideBar', true);
    }

    /**
     * 列表
     */
    public function index()
    {
        $this->getResponse()->view()->assign('productListRef', true);

        $productList = array();

        $repository = Core::$container->get('Product\Repository\Product\ProductRepository');
        $productList = $repository->filter(
            array('status'=>STATUS_NORMAL)
        );
        $this->getResponse()->view()->assign('productList', $productList);
        $this->getResponse()->view()->display('Admin/productIndex.tpl');
    }

    /**
     * 保存
     */
    public function save(int $productId = 0)
    {
        $this->getResponse()->view()->assign('producSaveRef', true);

        $product = new Product();
        if (!empty($productId)) {
            $repository = Core::$container->get('Product\Repository\Product\ProductRepository');
            $product = $repository->getOne($productId);
        }
        //品牌
        $repository = Core::$container->get('Product\Repository\Brand\BrandRepository');
        $brandList = $repository->filter(
            array('status'=>STATUS_NORMAL)
        );

        $this->getResponse()->view()->assign('product', $product);
        $this->getResponse()->view()->assign('brandList', $brandList);
        $this->getResponse()->view()->display('Admin/productSave.tpl');
    }

    /**
     * 保存
     */
    public function action()
    {
        $this->getResponse()->view()->assign('producSaveRef', true);

        $title = $this->getRequest()->post('title');
        $content = $this->getRequest()->post('content');
        $brand = $this->getRequest()->post('brand');
        $categroy = $this->getRequest()->post('categroy');
        $model = $this->getRequest()->post('model');
        $number = $this->getRequest()->post('number');
        $moq = $this->getRequest()->post('moq');
        $warrantyTime = $this->getRequest()->post('warrantyTime');
        $certificates = $this->getRequest()->post('certificates');
        $id = $this->getRequest()->post('productId');
        /**
         * 数据校验
         */
        $product = new Product(intval($id));
        $product->setTitle($title);
        $product->setContent($content);
        $product->getBrand()->setId($brand);
        $product->getCategory()->setId($categroy);
        $product->setModel($model);
        $product->setNumber($number);
        $product->setMoq($moq);
        $product->setWarrantyTime($warrantyTime);
        $product->setCertificates($certificates);

        if (isset($_FILES)) {
            $product->getLogo()->upload('logo');
        }
        
        $product->save();

        $this->message('保存成功', '/Admin/Product/'.$product->getId());
    }


    /**
     * 详情
     */
    public function get(int $productId = 0)
    {
        $this->getResponse()->view()->assign('productListRef', true);

        $repository = Core::$container->get('Product\Repository\Product\ProductRepository');

        $product = new Product();
        $product = $repository->getOne($productId);
 
        $this->getResponse()->view()->assign('product', $product);
        $this->getResponse()->view()->display('Admin/productGet.tpl');
    }

    /**
     * 删除
     */
    public function delete(int $productId = 0)
    {
        $this->getResponse()->view()->assign('productListRef', true);

        $product = new Product($productId);
        $product->delete();

        $this->message('删除成功', '/Admin/Product');
    }

    /**
     * 幻灯列表
     */
    public function slides(int $productId)
    {
        $this->getResponse()->view()->assign('productListRef', true);

        $repository = Core::$container->get('Product\Repository\Product\ProductRepository');

        $product = new Product();
        $product = $repository->getOne($productId);
        $this->getResponse()->view()->assign('product', $product);
    }
}
