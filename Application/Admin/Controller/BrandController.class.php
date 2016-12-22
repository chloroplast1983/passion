<?php
namespace Admin\Controller;

use System\Classes\Controller;
use Marmot\Core;
use Product\Model\Brand;
use System\Classes\Transaction;

class BrandController extends Controller
{

    use AdminController;

    public function __construct()
    {
        parent::__construct();

        $this->checkLogin();
        
        $this->getResponse()->view()->assign('productSideBar', true);
        $this->getResponse()->view()->assign('brandListRef', true);
    }
    /**
     * 列表
     */
    public function index()
    {
        $perpage = 20;
        $curpage = !empty($_GET['page']) ? $_GET['page'] : 1;
        $start = ($curpage-1)*$perpage;

        //触发导航栏链接高亮
        $this->getResponse()->view()->assign('inquiryListRef', true);

        $brandList = array();

        $filter = is_array($this->getRequest()->get('filter')) ? $this->getRequest()->get('filter') : array();

        $repository = Core::$container->get('Product\Repository\Brand\BrandRepository');
        list($num, $brandList) = $repository->filter(
            $filter,
            array(),
            $start,
            $perpage
        );

        $urlCondition = http_build_query(array('filter'=>$filter));

        $multi = $this->getResponse()->multiPages(
            $num,
            $perpage,
            $curpage,
            '/Admin/Brand?'.$urlCondition
        );

        $this->getResponse()->view()->assign('brandList', $brandList);
        $this->getResponse()->view()->assign('multi', $multi);
        $this->getResponse()->view()->display('Admin/brandIndex.tpl');
    }

    /**
     * 保存
     */
    public function save(int $brandId = 0)
    {
        //触发导航栏链接高亮
        $this->getResponse()->view()->assign('inquiryListRef', true);

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
        //触发导航栏链接高亮
        $this->getResponse()->view()->assign('inquiryListRef', true);

        $name = $this->getRequest()->post('name');
        $id = $this->getRequest()->post('brandId');

        /**
         * 数据校验
         */
        $brand = new Brand(intval($id));

        Transaction::beginTransaction();
        if (isset($_FILES)) {
            if (!$brand->getLogo()->upload('logo')) {
                Transaction::rollBack();
            }
        }

        $brand->setName($name);
        if (!$brand->save()) {
            Transaction::rollBack();
        }

        Transaction::Commit();
        $this->message('保存成功', '/Admin/Brand/'.$brand->getId());
    }


    /**
     * 详情
     */
    public function get(int $brandId = 0)
    {
        //触发导航栏链接高亮
        $this->getResponse()->view()->assign('inquiryListRef', true);

        $repository = Core::$container->get('Product\Repository\Brand\BrandRepository');

        $brand = new Brand();
        $brand = $repository->getOne($brandId);

        if (!$brand instanceof Brand) {
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
        //触发导航栏链接高亮
        $this->getResponse()->view()->assign('inquiryListRef', true);

        $brand = new brand($brandId);
        $brand->delete();

        $this->message('删除成功', '/Admin/Brand');
    }
}
