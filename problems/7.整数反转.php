<?php
/*
 * @lc app=leetcode.cn id=7 lang=php
 *
 * [7] 整数反转
 *
 * https://leetcode-cn.com/problems/reverse-integer/description/
 *
 * algorithms
 * Easy (33.52%)
 * Likes:    1833
 * Dislikes: 0
 * Total Accepted:    332.1K
 * Total Submissions: 975.8K
 * Testcase Example:  '123'
 *
 * 给出一个 32 位的有符号整数，你需要将这个整数中每位上的数字进行反转。
 * 
 * 示例 1:
 * 
 * 输入: 123
 * 输出: 321
 * 
 * 
 * 示例 2:
 * 
 * 输入: -123
 * 输出: -321
 * 
 * 
 * 示例 3:
 * 
 * 输入: 120
 * 输出: 21
 * 
 * 
 * 注意:
 * 
 * 假设我们的环境只能存储得下 32 位的有符号整数，则其数值范围为 [−2^31,  2^31 − 1]。请根据这个假设，如果反转后整数溢出那么就返回
 * 0。
 * 
 */

// @lc code=start
class Solution
{

    /**
     * @param Integer $x
     * @return Integer
     */
    function reverse($x)
    {
        $isNegative = false;
        if ($x < 0) $isNegative = true;
        $x = abs($x);
        $ans = 0;
        while ($x != 0) {
            $num = $x % 10;
            if ($ans > 214748364) return 0;
            if ($ans == 214748364) {
                if (!$isNegative && $num > 7) return 0;
                if ($isNegative && $num > 8) return 0;
            }
            $ans = 10 * $ans + $num;
            $x = floor($x / 10);
        }

        if ($isNegative) return -$ans;
        return $ans;
    }
}
// @lc code=end

error_reporting(E_ALL);
ini_set('display_errors', 1);
$x = -123;
$x = 7463847412;
$x = 8463847412;
$x = 1563847412;
$x = -8463847412;
$x = -8563847412;
$x = -9463847412;
echo (new Solution())->reverse($x) . PHP_EOL;
