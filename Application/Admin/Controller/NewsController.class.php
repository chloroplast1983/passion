<?php
namespace Admin\Controller;

use System\Classes\Controller;
use Marmot\Core;
use News\Model\News;

class NewsController extends Controller
{

    use AdminController;

    public function __construct()
    {
        parent::__construct();

        $this->getResponse()->view()->assign('newsSideBar', true);
    }
    /**
     * 列表
     */
    public function index()
    {
        //触发导航栏链接高亮
        $this->getResponse()->view()->assign('newsListRef', true);

        $newsList = array();

        $repository = Core::$container->get('News\Repository\News\NewsRepository');
        $newsList = $repository->filter(
            array('status'=>STATUS_NORMAL)
        );
        $this->getResponse()->view()->assign('newsList', $newsList);
        $this->getResponse()->view()->display('Admin/newsIndex.tpl');
    }

    /**
     * 保存
     */
    public function save(int $newsId = 0)
    {

        //触发导航栏链接高亮
        $this->getResponse()->view()->assign('newsSaveRef', true);

        $news = new News();
        if (!empty($newsId)) {
            $repository = Core::$container->get('News\Repository\News\NewsRepository');
            $news = $repository->getOne($newsId);
        }

        $this->getResponse()->view()->assign('news', $news);
        $this->getResponse()->view()->display('Admin/newsSave.tpl');
    }

    /**
     * 保存
     */
    public function action()
    {
        //触发导航栏链接高亮
        $this->getResponse()->view()->assign('newsSaveRef', true);

        $title = $this->getRequest()->post('title');
        $content = $this->getRequest()->post('content');
        $id = $this->getRequest()->post('newsId');
        /**
         * 数据校验
         */
        $news = new News(intval($id));
        $news->setTitle($title);
        $news->setContent($content);
        $news->save();

        $this->message('保存成功', '/Admin/News/'.$news->getId());
    }


    /**
     * 详情
     */
    public function get(int $newsId = 0)
    {

        //触发导航栏链接高亮
        $this->getResponse()->view()->assign('newsListRef', true);

        $repository = Core::$container->get('News\Repository\News\NewsRepository');

        $news = new News();
        $news = $repository->getOne($newsId);

        $this->getResponse()->view()->assign('news', $news);
        $this->getResponse()->view()->display('Admin/newsGet.tpl');
    }

    /**
     * 删除
     */
    public function delete(int $newsId = 0)
    {
        //触发导航栏链接高亮
        $this->getResponse()->view()->assign('newsListRef', true);
        
        $news = new News($newsId);
        $news->delete();

        $this->message('删除成功', '/Admin/News');
    }
}
