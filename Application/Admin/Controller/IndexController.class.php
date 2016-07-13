<?php
namespace Admin\Controller;

use System\Classes\Controller;
use Marmot\Core;

class IndexController extends Controller
{

    public function index()
    {
        $this->getResponse()->view()->display('Admin/index.tpl');
    }
}
