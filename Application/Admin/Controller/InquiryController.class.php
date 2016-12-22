<?php
namespace Admin\Controller;

use System\Classes\Controller;
use Marmot\Core;
use Inquiry\Model\Inquiry;

class InquiryController extends Controller
{

    use AdminController;

    public function __construct()
    {
        parent::__construct();
        
        $this->checkLogin();
        
        $this->getResponse()->view()->assign('inquirySideBar', true);
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

        $inquiryList = array();

        $repository = Core::$container->get('Inquiry\Repository\Inquiry\InquiryRepository');
        list($num, $inquiryList) = $repository->filter(
            array(),
            array(),
            $start,
            $perpage
        );

        $multi = $this->getResponse()->multiPages(
            $num,
            $perpage,
            $curpage,
            '/Admin/Inquiry?'.$urlCondition
        );

        $this->getResponse()->view()->assign('inquiryList', $inquiryList);
        $this->getResponse()->view()->assign('multi', $multi);
        $this->getResponse()->view()->display('Admin/inquiryIndex.tpl');
    }

    /**
     * 详情
     */
    public function get(int $inquiryId = 0)
    {
        //触发导航栏链接高亮
        $this->getResponse()->view()->assign('inquiryListRef', true);

        $repository = Core::$container->get('Inquiry\Repository\Inquiry\InquiryRepository');

        $inquiry = new Inquiry();
        $inquiry = $repository->getOne($inquiryId);
        
        if ($inquiry->getProduct()->getId() > 0) {
            $repository = Core::$container->get('Product\Repository\Product\ProductRepository');

            $product = $repository->getOne($inquiry->getProduct()->getId());
            $inquiry->setProduct($product);
        }

        $this->getResponse()->view()->assign('inquiry', $inquiry);
        $this->getResponse()->view()->display('Admin/inquiryGet.tpl');
    }
}
