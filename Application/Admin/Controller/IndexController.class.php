<?php
namespace Admin\Controller;

use System\Classes\Controller;
use Marmot\Core;

class IndexController extends Controller
{

 	use AdminController;

    public function index()
    {
    	$data = $this->getRequest()->get();
    	
    	if (!empty($data['adminAuth'])) {
    		$_SESSION['adminAuth'] = $data['adminAuth'];
    	}
    	$this->checkLogin();

        $this->getResponse()->view()->display('Admin/index.tpl');
    }
}
