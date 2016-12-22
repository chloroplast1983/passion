<?php
namespace Admin\Controller;

use System\Classes\Controller;
use Marmot\Core;
use Product\Model\Category;

class CategoryController extends Controller
{

    use AdminController;

    public function __construct()
    {
        parent::__construct();

        $this->checkLogin();
        
        $this->getResponse()->view()->assign('productSideBar', true);
        $this->getResponse()->view()->assign('categoryListRef', true);
    }

    /**
     * 列表
     * filter : http://jsonapi.org/ 协议规范
     */
    public function index()
    {
        $perpage = 20;
        $curpage = !empty($_GET['page']) ? $_GET['page'] : 1;
        $start = ($curpage-1)*$perpage;

        $categoryList = array();
        
        $filter = is_array($this->getRequest()->get('filter')) ? $this->getRequest()->get('filter') : array();

        $repository = Core::$container->get('Product\Repository\Category\CategoryRepository');
        list($num, $categoryList) = $repository->filter(
            $filter,
            array(),
            $start,
            $perpage
        );

        if ($this->getRequest()->isAjax()) {
            $categoryListArray = array();
            if (!empty($categoryList)) {
                foreach ($categoryList as $category) {
                    $categoryListArray['list'][] = array(
                        'id'=>$category->getId(),
                        'name'=>$category->getName()
                    );
                }
            }
            $this->getResponse()->jsonOut($categoryListArray);
        }

        //父id数组
        $parentIdList = $parentCategoryList = array();

        if (!empty($categoryList)) {
            foreach ($categoryList as $category) {
                $parentIdList[] = $category->getParentId();
            }

            $parentCategoryList = $repository->getList($parentIdList);

            //smarty 使用匿名函数?
            // if (!empty($parentCategoryList)) {

            //     $parentCategoryGenerator = function ($parentCategoryList) {
            //         foreach ($parentCategoryList as $parentCategory) {
            //             yield $parentCategory;
            //         }
            //     };
            // }
        }

        $urlCondition = http_build_query(array('filter'=>$filter));

        $multi = $this->getResponse()->multiPages(
            $num,
            $perpage,
            $curpage,
            '/Admin/Category?'.$urlCondition
        );

        $this->getResponse()->view()->assign('type', $filter['type']);
        $this->getResponse()->view()->assign('parentCategoryList', $parentCategoryList);
        $this->getResponse()->view()->assign('categoryList', $categoryList);
        $this->getResponse()->view()->assign('multi', $multi);
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
        $name = $this->getRequest()->post('name');
        $type = $this->getRequest()->post('type');
        $parentId = $this->getRequest()->post('parentId');
        $seoKeyword = $this->getRequest()->post('seoKeyWord');
        $seoTitle = $this->getRequest()->post('seoTitle');
        $seoDescription = $this->getRequest()->post('seoDescription');

        $id = $this->getRequest()->post('categoryId');

        //检查父id和类型是否匹配
        if ($parentId > 0) {
            $repository = Core::$container->get('Product\Repository\Category\CategoryRepository');
            $category = $repository->getOne($parentId);
            if (!$category instanceof Category) {
                $this->message('数据父id错误', '/Admin/Category');
            }
            if ($category->getType() != $type) {
                $this->message('数据类型错误', '/Admin/Category');
            }
        }

        $category = new Category(intval($id));
        $category->setName($name);
        $category->setType($type);
        $category->setParentId($parentId);
        $category->setSeoKeyWord($seoKeyword);
        $category->setSeoDescription($seoDescription);
        $category->setSeoTitle($seoTitle);
        // var_dump($category);exit();
        $category->save();

        $this->message('保存成功', '/Admin/Category');
    }
}
