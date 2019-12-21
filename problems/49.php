<?php

/**
 * @author ZouZhipeng <zzpwestlife@gmail.com>
 * @date 2019/12/21
 * @time 10:31
 * Class Solution49给定一个字符串数组，将字母异位词组合在一起。字母异位词指字母相同，但排列不同的字符串。
 *
 * 示例:
 *
 * 输入: ["eat", "tea", "tan", "ate", "nat", "bat"],
 * 输出:
 * [
 * ["ate","eat","tea"],
 * ["nat","tan"],
 * ["bat"]
 * ]
 * 说明：
 *
 * 所有输入均为小写字母。
 * 不考虑答案输出的顺序。
 */
class Solution49
{

    /**
     * @param String[] $strs
     * @return String[][]
     */
    function groupAnagrams1($strs)
    {
        $map = [];
        foreach ($strs as $str) {
            $arr = str_split($str);
            sort($arr);
            $tmp_str = implode("", $arr);
            $map[$tmp_str][] = $str;
        }
        return array_values($map);
    }

    function groupAnagrams($strs)
    {
        $resArr = [];
        // 将 26 个字母映射为 素数，求积可得唯一 key，相当于一个无冲突的 hash function
        $prime = [2, 3, 5, 7, 11, 13, 17, 19, 23, 29, 31, 41, 43, 47, 53, 59, 61, 67, 71, 73, 79, 83, 89, 97, 101, 103];
        foreach ($strs as $str) {
            $strlen = 1;
            for ($i = 0; $i < strlen($str); $i++) {
                $strlen *= $prime[ord($str[$i]) - 97];
            }
            $resArr[$strlen][] = $str;
        }
        return array_values($resArr);
    }
}

$strs = ["eat", "tea", "tan", "ate", "nat", "bat"];
//$strs = ["eat", "eat"];
var_dump((new Solution49)->groupAnagrams($strs)) . PHP_EOL;
