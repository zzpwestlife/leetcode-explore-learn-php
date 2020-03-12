<?php
/*
 * @lc app=leetcode.cn id=322 lang=php
 *
 * [322] 零钱兑换
 *
 * https://leetcode-cn.com/problems/coin-change/description/
 *
 * algorithms
 * Medium (37.05%)
 * Likes:    349
 * Dislikes: 0
 * Total Accepted:    38.8K
 * Total Submissions: 104.1K
 * Testcase Example:  '[1,2,5]\n11'
 *
 * 给定不同面额的硬币 coins 和一个总金额
 * amount。编写一个函数来计算可以凑成总金额所需的最少的硬币个数。如果没有任何一种硬币组合能组成总金额，返回 -1。
 * 
 * 示例 1:
 * 
 * 输入: coins = [1, 2, 5], amount = 11
 * 输出: 3 
 * 解释: 11 = 5 + 5 + 1
 * 
 * 示例 2:
 * 
 * 输入: coins = [2], amount = 3
 * 输出: -1
 * 
 * 说明:
 * 你可以认为每种硬币的数量是无限的。
 * 
 */

// @lc code=start
class Solution
{

    /**
     * @param Integer[] $coins
     * @param Integer $amount
     * @return Integer
     */
    function coinChange1($coins, $amount)
    {
        $memo = array_fill(0, $amount + 1, null);
        $memo[$amount] = $this->helper($coins, $amount, $memo);
        return $memo[$amount];
    }

    private function helper($coins, $amount, &$memo)
    {
        // base case
        if ($amount == 0) {
            return 0;
        }

        if ($amount < 0) {
            return -1;
        }

        if (isset($memo[$amount])) {
            return $memo[$amount];
        }


        $res = PHP_INT_MAX;
        foreach ($coins as $coin) {
            $subproblem = $this->helper($coins, $amount - $coin, $memo);
            // 子问题无解，跳过
            if ($subproblem == -1) {
                continue;
            }
            $res = min($res, $subproblem + 1);
        }

        $res = $res == PHP_INT_MAX ? -1 : $res;
        $memo[$amount] = $res;
        return $res;
    }

    function coinChange($coins, $amount)
    {
        if (count($coins) == 0 || $amount <= 0) return -1;
        // 自底向上 数组大小为 amount + 1，初始值也为 amount + 1
        $dp = array_fill(0, $amount + 1, $amount + 1);
        $dp[0] = 0;
        for ($i = 1; $i <= $amount; ++$i) {
            foreach ($coins as $coin) {
                if ($i < $coin) continue;
                $dp[$i] = min($dp[$i], $dp[$i - $coin] + 1);
            }
        }

        return ($dp[$amount] == $amount + 1) ? -1 : $dp[$amount];
    }
}
// @lc code=end

error_reporting(E_ALL);
ini_set('display_errors', 1);
$coins = [1, 2, 5];
$amount = 11;

echo (new Solution())->coinChange($coins, $amount) . PHP_EOL;
