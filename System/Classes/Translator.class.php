<?php
namespace System\Classes;

abstract class Translator
{

    public function arrayToObject(array $expression)
    {
    }

    public function objectToArray($object, array $keys)
    {
    }
    
    /**
     * 从 $expression 过滤出 key 为 $keys 的数组
     * @param array $keys
     * @param array $expression
     */
    public function filterKeysFromArray(array $keys, array $expression)
    {
        if (empty($keys)) {
            return $expression;
        }

        $result = array();

        foreach ($keys as $key) {
            $result[$key] = $expression[$key];
        }
        return $result;
    }
}
