<?php
/*
 * @lc app=leetcode.cn id=264 lang=php
 *
 * [264] 丑数 II
 *
 * https://leetcode-cn.com/problems/ugly-number-ii/description/
 *
 * algorithms
 * Medium (48.84%)
 * Likes:    201
 * Dislikes: 0
 * Total Accepted:    15.3K
 * Total Submissions: 31.3K
 * Testcase Example:  '10'
 *
 * 编写一个程序，找出第 n 个丑数。
 * 
 * 丑数就是只包含质因数 2, 3, 5 的正整数。
 * 
 * 示例:
 * 
 * 输入: n = 10
 * 输出: 12
 * 解释: 1, 2, 3, 4, 5, 6, 8, 9, 10, 12 是前 10 个丑数。
 * 
 * 说明:  
 * 
 * 
 * 1 是丑数。
 * n 不超过1690。
 * 
 * 
 */

// @lc code=start
class Solution
{

    /**
     * @param Integer $n
     * @return Integer
     */
    function nthUglyNumber($n)
    {
        // 三指针 + dp
        $dp = [1];
        $index2 = $index3 = $index5 = 0;
        for ($i = 0; $i < $n - 1; ++$i) {
            $min = min($dp[$index2] * 2, $dp[$index3] * 3, $dp[$index5] * 5);
            if ($min == $dp[$index2] * 2) {
                $index2++;
            }
            if ($min == $dp[$index3] * 3) {
                $index3++;
            }
            if ($min == $dp[$index5] * 5) {
                $index5++;
            }
            $dp[] = $min;
        }
        return $dp[$n - 1];
    }
}
// @lc code=end
$n = 10;
echo (new Solution())->nthUglyNumber($n) . PHP_EOL;
