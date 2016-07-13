<?php
namespace Admin\Controller;

use System\Classes\Controller;
use Marmot\Core;
use Inquiry\Model\Inquiry;

class InquiryController extends Controller
{

    use AdminController;

    /**
     * 列表
     */
    public function index()
    {
        $inquiryList = array();

        $repository = Core::$container->get('Inquiry\Repository\Inquiry\InquiryRepository');
        $inquiryList = $repository->filter();
        $this->getResponse()->view()->assign('inquiryList', $inquiryList);
        $this->getResponse()->view()->display('Admin/inquiryIndex.tpl');
    }

    /**
     * 详情
     */
    public function get(int $inquiryId = 0)
    {
        $repository = Core::$container->get('Inquiry\Repository\Inquiry\InquiryRepository');

        $inquiry = new Inquiry();
        $inquiry = $repository->getOne($inquiryId);
        
        $this->getResponse()->view()->assign('inquiry', $inquiry);
        $this->getResponse()->view()->display('Admin/inquiryGet.tpl');
    }

}
