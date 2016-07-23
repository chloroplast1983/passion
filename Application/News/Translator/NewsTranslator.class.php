<?php
namespace News\Translator;

use System\Classes\Translator;
use News\Model\News;

class NewsTranslator extends Translator
{

    public function arrayToObject(array $expression)
    {
        $news = new News($expression['news_id']);
        $news->setTitle($expression['title']);
        $news->setUpdateTime($expression['update_time']);
        $news->setCreateTime($expression['create_time']);
        $news->setStatusTime($expression['status_time']);
        $news->setStatus($expression['status']);
        if (isset($expression['content'])) {
            $news->setContent($expression['content']);
        }
        return $news;
    }

    public function objectToArray($news, array $keys = array())
    {
        if (!$news instanceof News) {
            return false;
        }

        if (empty($keys)) {
            $keys = array(
                        'id',
                        'title',
                        'updateTime',
                        'createTime',
                        'statusTime',
                        'status',
                        'content'
                    );
        }

        $expression = $newsContent = array();

        if (in_array('id', $keys)) {
            $expression['news_id'] = $news->getId();
        }
        
        if (in_array('title', $keys)) {
            $expression['title'] = $news->getTitle();
        }

        if (in_array('updateTime', $keys)) {
            $expression['update_time'] = $news->getUpdateTime();
        }

        if (in_array('createTime', $keys)) {
            $expression['create_time'] = $news->getCreateTime();
        }

        if (in_array('statusTime', $keys)) {
            $expression['status_time'] = $news->getStatusTime();
        }
       
        if (in_array('status', $keys)) {
            $expression['status'] = $news->getStatus();
        }

        if (in_array('content', $keys)) {
            $newsContent['content'] = $news->getContent();
        }

        return array($expression, $newsContent);
    }
}
