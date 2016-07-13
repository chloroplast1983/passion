<?php
namespace Admin\Controller;

use System\Classes\Controller;
use Marmot\Core;
use Product\Model\Brand;

class BrandController extends Controller
{

    use AdminController;

    /**
     * 列表
     */
    public function index()
    {
        $brandList = array();

        $repository = Core::$container->get('Product\Repository\Brand\BrandRepository');
        $brandList = $repository->filter(
            array('status'=>STATUS_NORMAL)
        );
        $this->getResponse()->view()->assign('brandList', $brandList);
        $this->getResponse()->view()->display('Admin/brandIndex.tpl');
    }

    /**
     * 保存
     */
    public function save(int $brandId = 0)
    {
        $brand = new brand();
        if (!empty($brandId)) {
            $repository = Core::$container->get('Product\Repository\Brand\BrandRepository');
            $brand = $repository->getOne($brandId);
        }

        $this->getResponse()->view()->assign('brand', $brand);
        $this->getResponse()->view()->display('Admin/brandSave.tpl');
    }

    /**
     * 保存
     */
    public function action()
    {
        $name = $this->getRequest()->post('name');
        // $content = $this->getRequest()->post('content');
        $id = $this->getRequest()->post('brandId');
        /**
         * 数据校验
         */
        $brand = new Brand(intval($id));
        $brand->setName($name);
        // $brand->setLogo(1);
        $brand->save();

        $this->message('保存成功', '/Admin/Brand/'.$brand->getId());
    }


    /**
     * 详情
     */
    public function get(int $brandId = 0)
    {
        $repository = Core::$container->get('Product\Repository\Brand\BrandRepository');

        $brand = new Brand();
        $brand = $repository->getOne($brandId);

        if ($brand instanceof Brand) {
            //临时
            $this->message('品牌不正确', '/Admin/Brand');
        }

        $this->getResponse()->view()->assign('brand', $brand);
        $this->getResponse()->view()->display('Admin/brandGet.tpl');
    }

    /**
     * 删除
     */
    public function delete(int $brandId = 0)
    {
        $brand = new brand($brandId);
        $brand->delete();

        $this->message('删除成功', '/Admin/Brand');
    }
}
