<?php
/*
 * @lc app=leetcode.cn id=367 lang=php
 *
 * [367] 有效的完全平方数
 *
 * https://leetcode-cn.com/problems/valid-perfect-square/description/
 *
 * algorithms
 * Easy (42.91%)
 * Likes:    87
 * Dislikes: 0
 * Total Accepted:    22.2K
 * Total Submissions: 51.8K
 * Testcase Example:  '16'
 *
 * 给定一个正整数 num，编写一个函数，如果 num 是一个完全平方数，则返回 True，否则返回 False。
 * 
 * 说明：不要使用任何内置的库函数，如  sqrt。
 * 
 * 示例 1：
 * 
 * 输入：16
 * 输出：True
 * 
 * 示例 2：
 * 
 * 输入：14
 * 输出：False
 * 
 * 
 */

// @lc code=start
class Solution
{

    /**
     * @param Integer $num
     * @return Boolean
     */
    function isPerfectSquare($num)
    {
        if ($num == 1) {
            return true;
        }
        // 二分查找 注意边界
        $l = 1;
        $r = $num;
        while ($l < $r) {
            $mid = $l + floor((($r - $l) / 2));
            if ($mid * $mid == $num) {
                return true;
            } elseif ($mid * $mid < $num) {
                $l = $mid + 1;
            } else {
                $r = $mid - 1;
            }
        }
        return $l * $l == $num;
    }
}
// @lc code=end
