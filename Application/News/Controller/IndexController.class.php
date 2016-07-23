<?php
namespace News\Controller;

use System\Classes\Controller;
use Home\Controller\NavigationBarController;
use Marmot\Core;
use News\Model\News;

class IndexController extends Controller
{

    use NavigationBarController;

    public function __construct()
    {
        parent::__construct();
        $this->getResponse()->view()->assign('homeNavActive', true);
    }

    public function index()
    {
        $perpage = 20;
        $curpage = !empty($_GET['page']) ? $_GET['page'] : 1;
        $start = ($curpage-1)*$perpage;

        //新闻列表
        $filter = array('status'=>STATUS_NORMAL);
        $repository = Core::$container->get('News\Repository\News\NewsRepository');
        list($num, $newsList) = $repository->filter(
            $filter,
            array(),
            $start,
            $perpage
        );

        // $urlCondition = http_build_query(array('filter'=>$filter));
       
        $multi = $this->getResponse()->multiPages(
            $num,
            $perpage,
            $curpage,
            '/News'
        );

        $this->getResponse()->view()->assign('categoryList', $this->getCategories());
        $this->getResponse()->view()->assign('brandList', $this->getBrands());
        $this->getResponse()->view()->assign('multi', $multi);
        $this->getResponse()->view()->assign('newsList', $newsList);
        $this->getResponse()->view()->display('Home/newsIndex.tpl');
    }

    public function get(int $newsId = 0)
    {

        $repository = Core::$container->get('News\Repository\News\NewsRepository');

        $news = new News();
        $news = $repository->getOne($newsId);

        $this->getResponse()->view()->assign('news', $news);
        $this->getResponse()->view()->assign('categoryList', $this->getCategories());
        $this->getResponse()->view()->assign('brandList', $this->getBrands());
        $this->getResponse()->view()->display('Home/news.tpl');
    }
}
