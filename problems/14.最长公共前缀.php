<?php
/*
 * @lc app=leetcode.cn id=14 lang=php
 *
 * [14] 最长公共前缀
 */

// @lc code=start
class Solution
{
    /**
     * @param String[] $strs
     * @return String
     */
    function longestCommonPrefix($strs)
    {
        $n = count($strs);
        if ($n == 0) return '';
        if ($n == 1) return $strs[0];
        $shortestStr = $strs[0];
        $shortest = strlen($strs[0]);
        for ($i = 1; $i < $n; ++$i) {
            if (strlen($strs[$i]) < $shortestStr) {
                $shortestStr = $strs[$i];
                $shortest = strlen($strs[$i]);
            }
        }

        $left = 0;
        $right = $shortest;
        while ($left < $right) {
            // 左闭右开区间一般取右中位数
            $mid = $left + floor(($right - $left + 1) >> 1);
            if ($this->common($strs, substr($shortestStr, 0, $mid))) {
                $left = $mid;
            } else {
                $right = $mid - 1;
            }
        }

        return substr($shortestStr, 0, $left);
    }

    private function common($strs, $pre)
    {
        foreach ($strs as $str) {
            if (substr($str, 0, strlen($pre)) !== $pre) return false;
        }
        return true;
    }
}
// @lc code=end

error_reporting(E_ALL);
ini_set('display_errors', 1);
$strs = ["flower", "flow", "flight"];
// $strs = ["", ""];
// $strs = ["c", "c"];
var_dump((new Solution())->longestCommonPrefix($strs));
