<?php

/**
 * @author ZouZhipeng <zzpwestlife@gmail.com>
 * @date 2019/12/21
 * @time 10:30
 * Class Solution242
 * 给定两个字符串 s 和 t ，编写一个函数来判断 t 是否是 s 的字母异位词。
 *
 * 示例 1:
 *
 * 输入: s = "anagram", t = "nagaram"
 * 输出: true
 * 示例 2:
 *
 * 输入: s = "rat", t = "car"
 * 输出: false
 * 说明:
 * 你可以假设字符串只包含小写字母。
 */
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
