<?php
namespace Admin\Controller;

use System\Classes\Controller;
use Marmot\Core;
use Product\Model\Category;

class CategoryController extends Controller
{

    use AdminController;

    /**
     * 列表
     */
    public function index()
    {
        $categoryList = array();

        // $repository = Core::$container->get('Product\Repository\Category\CategoryRepository');
        // $categoryList = $repository->filter();
        // $this->getResponse()->view()->assign('categoryList', $categoryList);
        $this->getResponse()->view()->display('Admin/categoryIndex.tpl');
    }

    /**
     * 保存
     */
    public function save(int $categoryId = 0)
    {
        $category = new Category();
        if (!empty($categoryId)) {
            $repository = Core::$container->get('Product\Repository\Category\CategoryRepository');
            $category = $repository->getOne($categoryId);
        }

        $this->getResponse()->view()->assign('category', $category);
        $this->getResponse()->view()->display('Admin/categorySave.tpl');
    }

    /**
     * 保存
     */
    public function action()
    {
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

        $this->message('保存成功', '/Admin/News/'.$id);
    }
}
