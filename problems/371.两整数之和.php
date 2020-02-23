<?php
/*
 * @lc app=leetcode.cn id=371 lang=php
 *
 * [371] 两整数之和
 *
 * https://leetcode-cn.com/problems/sum-of-two-integers/description/
 *
 * algorithms
 * Easy (53.51%)
 * Likes:    195
 * Dislikes: 0
 * Total Accepted:    22.5K
 * Total Submissions: 41.9K
 * Testcase Example:  '1\n2'
 *
 * 不使用运算符 + 和 - ​​​​​​​，计算两整数 ​​​​​​​a 、b ​​​​​​​之和。
 * 
 * 示例 1:
 * 
 * 输入: a = 1, b = 2
 * 输出: 3
 * 
 * 
 * 示例 2:
 * 
 * 输入: a = -2, b = 3
 * 输出: 1
 * 
 */

// @lc code=start
class Solution
{

    /**
     * @param Integer $a
     * @param Integer $b
     * @return Integer
     */
    function getSum($a, $b)
    {
        if ($a == 0) return $b;
        if ($b == 0) return $a;
        $c = $a ^ $b;
        $d = ($a & $b) << 1;
        return $this->getSum($c, $d);
    }
}
// @lc code=end
