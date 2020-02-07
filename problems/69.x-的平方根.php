<?php
/*
 * @lc app=leetcode.cn id=69 lang=php
 *
 * [69] x 的平方根
 *
 * https://leetcode-cn.com/problems/sqrtx/description/
 *
 * algorithms
 * Easy (37.41%)
 * Likes:    294
 * Dislikes: 0
 * Total Accepted:    89.2K
 * Total Submissions: 238.1K
 * Testcase Example:  '4'
 *
 * 实现 int sqrt(int x) 函数。
 * 
 * 计算并返回 x 的平方根，其中 x 是非负整数。
 * 
 * 由于返回类型是整数，结果只保留整数的部分，小数部分将被舍去。
 * 
 * 示例 1:
 * 
 * 输入: 4
 * 输出: 2
 * 
 * 
 * 示例 2:
 * 
 * 输入: 8
 * 输出: 2
 * 说明: 8 的平方根是 2.82842..., 
 * 由于返回类型是整数，小数部分将被舍去。
 * 
 * 
 */

// @lc code=start
class Solution
{

    /**
     * @param Integer $x
     * @return Integer
     */
    function mySqrt($x)
    {
        if ($x <= 1) {
            return $x;
        }
        $l = 1;
        $r = floor($x / 2) + 1;
        while ($l < $r) {
            // 取右中位数，否则会死循环
            $mid = $l + floor(($r - $l + 1) / 2);
            if ($mid * $mid == $x) {
                return $mid;
            } elseif ($mid * $mid < $x) {
                $l = $mid;
            } else {
                $r = $mid - 1;
            }
        }

        return $l;
    }
}
// @lc code=end
