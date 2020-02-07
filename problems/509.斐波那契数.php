<?php
/*
 * @lc app=leetcode.cn id=509 lang=php
 *
 * [509] 斐波那契数
 *
 * https://leetcode-cn.com/problems/fibonacci-number/description/
 *
 * algorithms
 * Easy (65.84%)
 * Likes:    89
 * Dislikes: 0
 * Total Accepted:    35.3K
 * Total Submissions: 53.5K
 * Testcase Example:  '2'
 *
 * 斐波那契数，通常用 F(n) 表示，形成的序列称为斐波那契数列。该数列由 0 和 1 开始，后面的每一项数字都是前面两项数字的和。也就是：
 * 
 * F(0) = 0,   F(1) = 1
 * F(N) = F(N - 1) + F(N - 2), 其中 N > 1.
 * 
 * 
 * 给定 N，计算 F(N)。
 * 
 * 
 * 
 * 示例 1：
 * 
 * 输入：2
 * 输出：1
 * 解释：F(2) = F(1) + F(0) = 1 + 0 = 1.
 * 
 * 
 * 示例 2：
 * 
 * 输入：3
 * 输出：2
 * 解释：F(3) = F(2) + F(1) = 1 + 1 = 2.
 * 
 * 
 * 示例 3：
 * 
 * 输入：4
 * 输出：3
 * 解释：F(4) = F(3) + F(2) = 2 + 1 = 3.
 * 
 * 
 * 
 * 
 * 提示：
 * 
 * 
 * 0 ≤ N ≤ 30
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
    function fib1($n)
    {
        if ($n <= 1) {
            return $n;
        }

        return $this->fib1($n - 1) + $this->fib1($n - 2);
    }

    function fib2($n)
    {
        // 备忘录全初始化为 0
        $memo = array_fill(0, $n + 1, 0);
        // 初始化最简情况
        return $this->helper($memo, $n);
    }

    private function helper(&$memo, $n)
    {
        // base case
        if ($n == 0 || $n == 1) {
            $memo[$n] = $n;
            return $memo[$n];
        }

        // 已经计算过
        if ($memo[$n] > 0) {
            return $memo[$n];
        }

        $memo[$n] = $this->helper($memo, $n - 1) + $this->helper($memo, $n - 2);
        return $memo[$n];
    }

    function fib3($n)
    {
        // 自底向上递推
        $dp = array_fill(0, $n + 1, 0);
        // base case
        $dp[0] = 0;
        $dp[1] = 1;
        for ($i = 2; $i <= $n; ++$i) {
            $dp[$i] = $dp[$i - 1] + $dp[$i - 2];
        }
        return $dp[$n];
    }

    function fib($n)
    {
        if ($n <= 1) {
            return $n;
        }
        $prev = 0;
        $cur = 1;
        $result = 1;
        for ($i = 2; $i <= $n; ++$i) {
            $result = $prev + $cur;
            $prev = $cur;
            $cur = $result;
        }
        return $result;
    }
}
// @lc code=end
$n = 50;
echo (new Solution())->fib($n) . PHP_EOL;
