<?php

class Solution
{

    /**
     * @param String $astr
     * @return Boolean
     */
    function isUnique($astr)
    {
        $len = count($astr);
        if ($len <= 1) {
            return true;
        }

        $hash = [];
        for ($i = 0; $i < $len; ++$i) {
            $char = substr($astr, $i, 1);
            if (isset($hash[$char])) {
                return false;
            }
            $hash[$char] = 1;
            print_r($hash);
        }

        return true;
    }
}

error_reporting(E_ALL);
ini_set('display_errors', 1);

$str = 'leetcode';
var_dump((new Solution())->isUnique($str));
