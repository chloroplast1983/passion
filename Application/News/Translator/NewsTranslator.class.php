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

        $expression = $result = $newsContent = array();

        $expression['news_id'] = $news->getId();
        $expression['title'] = $news->getTitle();
        $expression['update_time'] = $news->getUpdateTime();
        $expression['create_time'] = $news->getCreateTime();
        $expression['status_time'] = $news->getStatusTime();
        $expression['status'] = $news->getStatus();
        $expression['content'] = $news->getContent();

        $filteredResult = $this->filterKeysFromArray($keys, $expression);

        if (isset($filteredResult['content'])) {
            $newsContent['news_id'] = $expression['news_id'];
            $newsContent['content'] = $expression['content'];
            unset($filteredResult['content']);
        }

        return array($filteredResult, $newsContent);
    }
}
