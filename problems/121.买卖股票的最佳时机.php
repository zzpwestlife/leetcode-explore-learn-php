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
        // dp[i][k][0 or 1]
        // dp[i][k][0] = max(dp[i-1][k][0], dp[i-1][k][1] + prices[i])
        // dp[i][k][1] = max(dp[i-1][k][1], dp[i-1][k-1][0] - prices[i])
        // dp[0][k][0] = 0, dp[0][k][1] = -INF
        // dp[i][0][0] = 0, dp[i][0][1] = -INF
        // k = 1
        // dp[i][1][0] = max(dp[i-1][1][0], dp[i-1][1][1] + prices[i])
        // dp[i][1][1] = max(dp[i-1][1][1], dp[i-1][0][0] - prices[i]) 
        //             = max(dp[i-1][1][1], -prices[i])
        // dp[i][0] = max(dp[i-1][0], dp[i-1][1] + prices[i])
        // dp[i][1] = max(dp[i-1][1], -prices[i])
        // dp[i][0] = 0, dp[i][1] = -INF
        $len = count($prices);
        if ($len <= 1) {
            return 0;
        }

        $dpi0 = 0;
        $dpi1 = PHP_INT_MIN;
        for ($i = 0; $i < $len; ++$i) {
            $dpi0 = max($dpi0, $dpi1 + $prices[$i]);
            $dpi1 = max($dpi1, -$prices[$i]);
        }
        return $dpi0;
    }
}
// @lc code=end
