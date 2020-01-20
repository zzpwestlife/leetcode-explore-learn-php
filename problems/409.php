<?php

/**
 * 给定一个包含大写字母和小写字母的字符串，找到通过这些字母构造成的最长的回文串。
    在构造过程中，请注意区分大小写。比如 "Aa" 不能当做一个回文字符串。

    注意:
    假设字符串的长度不会超过 1010。
 */
class Solution409
{

    /**
     * @param String $s
     * @return Integer
     */
    function longestPalindrome($s)
    {
        $arr = array_count_values(str_split($s, 1));
        // 用空间换时间的方法
        // $arr = count_chars($s);
        $return = 0;
        $hasOdd = false;
        foreach ($arr as $count) {
            if ($count % 2 == 0) {
                // 成对出现，直接添加
                $return += $count;
            } elseif ($count > 2) {
                // 奇数个，取成对的
                $return += $count - 1;
                $hasOdd = true;
            } else {
                // 只有一个
                $hasOdd = true;
            }
        }

        return $hasOdd ?++$return:$return;
    }
}

$str = "abccccdd";
echo (new Solution409())->longestPalindrome($str) . PHP_EOL;
