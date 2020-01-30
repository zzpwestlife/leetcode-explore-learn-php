<?php
/*
 * @lc app=leetcode.cn id=309 lang=php
 *
 * [309] 最佳买卖股票时机含冷冻期
 *
 * https://leetcode-cn.com/problems/best-time-to-buy-and-sell-stock-with-cooldown/description/
 *
 * algorithms
 * Medium (50.82%)
 * Likes:    206
 * Dislikes: 0
 * Total Accepted:    12.8K
 * Total Submissions: 25.3K
 * Testcase Example:  '[1,2,3,0,2]'
 *
 * 给定一个整数数组，其中第 i 个元素代表了第 i 天的股票价格 。​
 * 
 * 设计一个算法计算出最大利润。在满足以下约束条件下，你可以尽可能地完成更多的交易（多次买卖一支股票）:
 * 
 * 
 * 你不能同时参与多笔交易（你必须在再次购买前出售掉之前的股票）。
 * 卖出股票后，你无法在第二天买入股票 (即冷冻期为 1 天)。
 * 
 * 
 * 示例:
 * 
 * 输入: [1,2,3,0,2]
 * 输出: 3 
 * 解释: 对应的交易状态为: [买入, 卖出, 冷冻期, 买入, 卖出]
 * 
 */

// @lc code=start
class Solution
{

    /**
     * @param Integer[] $prices
     * @return Integer
     */
    function maxProfit($prices)
    {
        // dp
        // dp[day][k][0 or 1]
        // dp[i][0] = max(dp[i - 1][0], dp[i - 1][1] + prices[i])
        // dp[i][1] = max(dp[i - 1][0], dp[i - 2][0] - prices[i])

        $len = count($prices);
        if ($len <= 1) {
            return 0;
        }

        $dp_i_0 = 0;
        $dp_i_1 = PHP_INT_MIN;
        $dp_pre_0 = 0;
        for ($i = 0; $i < $len; ++$i) {
            $temp = $dp_i_0;
            $dp_i_0 = max($dp_i_0, $dp_i_1 + $prices[$i]);
            $dp_i_1 = max($dp_i_1, $dp_pre_0 - $prices[$i]);
            $dp_pre_0 = $temp;
        }

        return $dp_i_0;
    }
}
// @lc code=end
