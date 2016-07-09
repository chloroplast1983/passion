<?php
namespace Inquiry\Translator;

use System\Classes\Translator;
use Inquiry\Model\Inquiry;

class InquiryTranslator extends Translator
{

    public function arrayToObject(array $expression)
    {
        $inquiry = new Inquiry($expression['inquiry_id']);
        $inquiry->setTitle($expression['title']);
        $inquiry->setContent($expression['content']);
        $inquiry->setCreateTime($expression['create_time']);
        $inquiry->setEmail($expression['email']);
        return $inquiry;
    }

    public function objectToArray($inquiry, array $keys = array())
    {
        if (!$inquiry instanceof Inquiry) {
            return false;
        }

        $expression = array();
        $expression['inquiry_id'] = $inquiry->getId();
        $expression['title'] = $inquiry->getTitle();
        $expression['content'] = $inquiry->getContent();
        $expression['create_time'] = $inquiry->getCreateTime();
        $expression['email'] = $inquiry->getEmail();
        $expression['pic'] = 0;

        return $this->filterKeysFromArray($keys, $expression);
    }
}
