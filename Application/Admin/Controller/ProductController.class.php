<?php
namespace Admin\Controller;

use System\Classes\Controller;
use Marmot\Core;
use Product\Model\Product;

class ProductController extends Controller
{

    use AdminController;

    /**
     * 列表
     */
    public function index()
    {
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
        $product = new Product();
        if (!empty($productId)) {
            $repository = Core::$container->get('Product\Repository\Product\ProductRepository');
            $product = $repository->getOne($productId);
        }

        $this->getResponse()->view()->assign('product', $product);
        $this->getResponse()->view()->display('Admin/productSave.tpl');
    }

    /**
     * 保存
     */
    public function action()
    {
        $title = $this->getRequest()->post('title');
        $content = $this->getRequest()->post('content');
        $id = $this->getRequest()->post('productId');
        /**
         * 数据校验
         */
        $Product = new Product(intval($id));
        $Product->setTitle($title);
        $Product->setContent($content);
        $Product->save();

        $this->message('保存成功', '/Admin/Product/'.$id);
    }


    /**
     * 详情
     */
    public function get(int $productId = 0)
    {
        $repository = Core::$container->get('Product\Repository\Product\ProductRepository');

        $Product = new Product();
        $Product = $repository->getOne($productId);

        $this->getResponse()->view()->assign('product', $product);
        $this->getResponse()->view()->display('Admin/productGet.tpl');
    }

    /**
     * 删除
     */
    public function delete(int $productId = 0)
    {
        $Product = new Product($productId);
        $Product->delete();

        $this->message('删除成功', '/Admin/Product');
    }
}
