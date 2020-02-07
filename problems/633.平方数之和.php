<?php
/*
 * @lc app=leetcode.cn id=633 lang=php
 *
 * [633] 平方数之和
 *
 * https://leetcode-cn.com/problems/sum-of-square-numbers/description/
 *
 * algorithms
 * Easy (32.26%)
 * Likes:    86
 * Dislikes: 0
 * Total Accepted:    13.1K
 * Total Submissions: 40.6K
 * Testcase Example:  '5'
 *
 * 给定一个非负整数 c ，你要判断是否存在两个整数 a 和 b，使得 a^2 + b^2 = c。
 * 
 * 示例1:
 * 
 * 
 * 输入: 5
 * 输出: True
 * 解释: 1 * 1 + 2 * 2 = 5
 * 
 * 
 * 
 * 
 * 示例2:
 * 
 * 
 * 输入: 3
 * 输出: False
 * 
 * 
 */

// @lc code=start
class Solution
{
    /**
     * @param Integer $c
     * @return Boolean
     */
    function judgeSquareSum($c)
    {
        // double pointer
        $l = 0;
        $r = floor(sqrt($c));
        while ($l <= $r) {
            if ($c - $l * $l == $r * $r) {
                return true;
            } elseif ($c - $l * $l < $r * $r) {
                $r--;
            } else {
                $l++;
            }
        }

        return false;
    }
}
// @lc code=end
