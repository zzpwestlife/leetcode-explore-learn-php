<?php

class Solution242
{

    /**
     * @param String $s
     * @param String $t
     * @return Boolean
     * 1. 排序，看两个字符串是否相等 O(nlogn)
     * 2. 哈希表，key 为 字母， value 为 频次，O(n)
     */
    function isAnagram1($s, $t)
    {
        $s = str_split($s, 1);
        $t = str_split($t, 1);
        sort($s);
        sort($t);
        return $s == $t;
    }

    function isAnagram($s, $t)
    {
        if (strlen($s) != strlen($t)) {
            return false;
        }

        $hash = [];
        for ($i = 0; $i < strlen($s); ++$i) {
            if (!isset($hash[$s[$i]])) {
                $hash[$s[$i]] = 1;
            } else {
                $hash[$s[$i]]++;
            }

            if (!isset($hash[$t[$i]])) {
                $hash[$t[$i]] = -1;
            } else {
                $hash[$t[$i]]--;
            }
        }

        foreach ($hash as $v) {
            if ($v != 0) {
                return false;
            }
        }

        return true;
    }
}

$s = 'a';
$t = 'b';

$s = "anagram";
$t = "nagaram";
var_dump((new Solution242)->isAnagram($s, $t)) . PHP_EOL;
