<?php
//powered by chloroplast
namespace System\Classes;

use Marmot\Core;

class Response
{
    private $view;

    public function __construct()
    {
        $this->view = new \SmartyBC;
        $this->view->setTemplateDir(S_ROOT.'View/Smarty/Templates');
        $this->view->setCompileDir(S_ROOT.'View/Smarty/Compile');
        $this->view->setCacheDir(S_ROOT.'View/Smarty/Cache');
    }

    public function view()
    {
        return $this->view;
    }

    public function jsonOut($data)
    {
        echo json_encode($data);
        exit();
    }

    public function multiPages($num, $perpage, $curpage, $mpurl)
    {
        $page = 5;
        $multipage = array();
        $mpurl .= strpos($mpurl, '?') ? '&' : '?';
        $realpages = 1;
        if ($num > $perpage) {
            $offset = 2;
            $realpages = @ceil($num / $perpage);
            $pages = $realpages;
            if ($page > $pages) {
                $from = 1;
                $to = $pages;
            } else {
                $from = $curpage - $offset;
                $to = $from + $page - 1;
                if ($from < 1) {
                    $to = $curpage + 1 - $from;
                    $from = 1;
                    if ($to - $from < $page) {
                        $to = $page;
                    }
                } elseif ($to > $pages) {
                    $from = $pages - $page + 1;
                    $to = $pages;
                }
            }
            $n=1;
            if ($curpage - $offset > 1 && $pages > $page) {
                $multipage[$n] = array('url'=>$mpurl.'page=1','html'=>'1 ...');
                $n++;
            }
            if ($curpage > 1) {
                $multipage[$n] = array('url'=>$mpurl.'page='.($curpage - 1),'html'=>'&lsaquo; Prev');
                $n++;
            }
            for ($i = $from; $i <= $to; $i++) {
                $multipage[$n] = ($i == $curpage) ? array('url'=>'#','html'=>$i,'class'=>' class="active"') :
                    array('url'=>$mpurl.'page='.$i,'html'=>$i);
                $n++;
            }
            if ($curpage < $pages) {
                $multipage[$n] = array('url'=>$mpurl.'page='.($curpage + 1),'html'=>'Next &rsaquo;');
                $n++;
            }
            if ($to < $pages) {
                $multipage[$n] = array('url'=>$mpurl.'page='.$pages,'html'=>'... '.$realpages);
                $n++;
            }
            $multipage[0] = empty($multipage) ? array() : array(
                'url'=>'',
//                'html'=>'<p class="total_data">共 '.$num.' 条数据</p> <p class="total_page">共 '.$pages.' 页</p> '
                'html'=>'<p class="total">Showing <b>1-12</b> of <b>'.$num.'</b> Products</p>'
            );
        }
        ksort($multipage);
        return $multipage;
    }
}
