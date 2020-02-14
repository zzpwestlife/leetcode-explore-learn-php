<?php
/*
 * @lc app=leetcode.cn id=50 lang=php
 *
 * [50] Pow(x, n)
 *
 * https://leetcode-cn.com/problems/powx-n/description/
 *
 * algorithms
 * Medium (33.66%)
 * Likes:    256
 * Dislikes: 0
 * Total Accepted:    50.5K
 * Total Submissions: 149.4K
 * Testcase Example:  '2.00000\n10'
 *
 * 实现 pow(x, n) ，即计算 x 的 n 次幂函数。
 * 
 * 示例 1:
 * 
 * 输入: 2.00000, 10
 * 输出: 1024.00000
 * 
 * 
 * 示例 2:
 * 
 * 输入: 2.10000, 3
 * 输出: 9.26100
 * 
 * 
 * 示例 3:
 * 
 * 输入: 2.00000, -2
 * 输出: 0.25000
 * 解释: 2^-2 = 1/2^2 = 1/4 = 0.25
 * 
 * 说明:
 * 
 * 
 * -100.0 < x < 100.0
 * n 是 32 位有符号整数，其数值范围是 [−2^31, 2^31 − 1] 。
 * 
 * 
 */

// @lc code=start
class Solution
{

    /**
     * @param Float $x
     * @param Integer $n
     * @return Float
     */
    function myPow($x, $n)
    {
        if ($x == 1 || $n == 0) return 1;
        if ($x == 0) return 0;
        if ($n < 0) {
            $x = 1 / $x;
            $n = -$n;
        }
        return $this->helper($x, $n);
    }

    private function helper($x, $n)
    {
        // terminator
        if ($n == 1) {
            return $x;
        }
        if ($n % 2 == 1) {
            $n = (int) ($n / 2);
            $tmp = $this->helper($x, $n);
            return $tmp * $tmp * $x;
        } else {
            $n = $n / 2;
            $tmp = $this->helper($x, $n);
            return $tmp * $tmp;
        }
    }
}
// @lc code=end
