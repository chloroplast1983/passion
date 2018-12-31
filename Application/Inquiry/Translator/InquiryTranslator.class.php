<?php
namespace Inquiry\Translator;

use System\Classes\Translator;
use Inquiry\Model\Inquiry;

class InquiryTranslator extends Translator
{

    public function arrayToObject(array $expression)
    {
        $inquiry = new Inquiry($expression['inquiry_id']);
        $inquiry->setName($expression['name']);
        $inquiry->setContent($expression['content']);
        $inquiry->setCreateTime($expression['create_time']);
        $inquiry->setEmail($expression['email']);
        $inquiry->getProduct()->setId($expression['product_id']);
        $inquiry->setClientIp($expression['client_ip']);
        $inquiry->setStatusTime($expression['status_time']);
        $inquiry->setStatus($expression['status']);
        return $inquiry;
    }

    public function objectToArray($inquiry, array $keys = array())
    {
        if (!$inquiry instanceof Inquiry) {
            return false;
        }

        if (empty($keys)) {
            $keys = array(
                        'id',
                        'name',
                        'createTime',
                        'content',
                        'email',
                        'product',
                        'clientIp',
                        'statusTime',
                        'status'
                    );
        }

        $expression = array();

        if (in_array('id', $keys)) {
            $expression['inquiry_id'] = $inquiry->getId();
        }
        
        if (in_array('name', $keys)) {
            $expression['name'] = $inquiry->getName();
        }

        if (in_array('content', $keys)) {
            $expression['content'] = $inquiry->getContent();
        }

        if (in_array('createTime', $keys)) {
            $expression['create_time'] = $inquiry->getCreateTime();
        }

        if (in_array('email', $keys)) {
            $expression['email'] = $inquiry->getEmail();
        }

        if (in_array('product', $keys)) {
            $expression['product_id'] = $inquiry->getProduct()->getId();
        }

        if (in_array('clientIp', $keys)) {
            $expression['client_ip'] = $inquiry->getClientIp();
        }

        if (in_array('statusTime', $keys)) {
            $expression['status_time'] = $inquiry->getStatusTime();
        }
       
        if (in_array('status', $keys)) {
            $expression['status'] = $inquiry->getStatus();
        }
        return $expression;
    }
}
