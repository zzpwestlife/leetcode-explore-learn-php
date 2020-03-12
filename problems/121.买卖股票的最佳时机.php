<?php
/*
 * @lc app=leetcode.cn id=121 lang=php
 *
 * [121] 买卖股票的最佳时机
 *
 * https://leetcode-cn.com/problems/best-time-to-buy-and-sell-stock/description/
 *
 * algorithms
 * Easy (52.07%)
 * Likes:    708
 * Dislikes: 0
 * Total Accepted:    117.9K
 * Total Submissions: 226.4K
 * Testcase Example:  '[7,1,5,3,6,4]'
 *
 * 给定一个数组，它的第 i 个元素是一支给定股票第 i 天的价格。
 * 
 * 如果你最多只允许完成一笔交易（即买入和卖出一支股票），设计一个算法来计算你所能获取的最大利润。
 * 
 * 注意你不能在买入股票前卖出股票。
 * 
 * 示例 1:
 * 
 * 输入: [7,1,5,3,6,4]
 * 输出: 5
 * 解释: 在第 2 天（股票价格 = 1）的时候买入，在第 5 天（股票价格 = 6）的时候卖出，最大利润 = 6-1 = 5 。
 * ⁠    注意利润不能是 7-1 = 6, 因为卖出价格需要大于买入价格。
 * 
 * 
 * 示例 2:
 * 
 * 输入: [7,6,4,3,1]
 * 输出: 0
 * 解释: 在这种情况下, 没有交易完成, 所以最大利润为 0。
 * 
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
        $n = count($prices);
        if ($n <= 1) return 0;
        // dp[i][k][0/1], 0<=n<=n-1, k=0/1
        // status transfer
        // dp[i][k][0] = max(dp[i-1][k][0], dp[i-1][k][1]+prices[i]);
        // dp[i][k][1] = max(dp[i-1][k][1], dp[i-1][k-1][0]-prices[i]);
        // base case
        // dp[0][k][0] = 0, dp[0][k][1] = -inf
        // dp[i][0][0] = 0, dp[i][0][1] = -inf
        // simplify
        // dp[i][0] = max(dp[i-1][0], dp[i-1][1]+prices[i]);
        // dp[i][1] = max(dp[i-1][1], -prices[i]);
        $dp_i_0 = 0;
        $dp_i_1 = PHP_INT_MIN;
        for ($i = 0; $i < $n; ++$i) {
            $dp_i_0 = max($dp_i_0, $dp_i_1 + $prices[$i]);
            $dp_i_1 = max($dp_i_1, -$prices[$i]);
        }
        return $dp_i_0;
    }
}
// @lc code=end
