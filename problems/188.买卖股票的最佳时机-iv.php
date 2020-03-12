<?php
/*
 * @lc app=leetcode.cn id=188 lang=php
 *
 * [188] 买卖股票的最佳时机 IV
 *
 * https://leetcode-cn.com/problems/best-time-to-buy-and-sell-stock-iv/description/
 *
 * algorithms
 * Hard (28.54%)
 * Likes:    149
 * Dislikes: 0
 * Total Accepted:    10K
 * Total Submissions: 34.9K
 * Testcase Example:  '2\n[2,4,1]'
 *
 * 给定一个数组，它的第 i 个元素是一支给定的股票在第 i 天的价格。
 * 
 * 设计一个算法来计算你所能获取的最大利润。你最多可以完成 k 笔交易。
 * 
 * 注意: 你不能同时参与多笔交易（你必须在再次购买前出售掉之前的股票）。
 * 
 * 示例 1:
 * 
 * 输入: [2,4,1], k = 2
 * 输出: 2
 * 解释: 在第 1 天 (股票价格 = 2) 的时候买入，在第 2 天 (股票价格 = 4) 的时候卖出，这笔交易所能获得利润 = 4-2 = 2 。
 * 
 * 
 * 示例 2:
 * 
 * 输入: [3,2,6,5,0,3], k = 2
 * 输出: 7
 * 解释: 在第 2 天 (股票价格 = 2) 的时候买入，在第 3 天 (股票价格 = 6) 的时候卖出, 这笔交易所能获得利润 = 6-2 = 4
 * 。
 * 随后，在第 5 天 (股票价格 = 0) 的时候买入，在第 6 天 (股票价格 = 3) 的时候卖出, 这笔交易所能获得利润 = 3-0 = 3 。
 * 
 * 
 */

// @lc code=start
class Solution
{

    /**
     * @param Integer $k
     * @param Integer[] $prices
     * @return Integer
     */
    function maxProfit($k, $prices)
    {
        $n = count($prices);
        if ($k <= 0 || $n <= 1) return 0;
        if ($k >= floor($n / 2)) {
            // k = inf
            $dp_i_0 = 0;
            $dp_i_1 = PHP_INT_MIN;
            for ($i = 0; $i < $n; ++$i) {
                $dp_i_0 = max($dp_i_0, $dp_i_1 + $prices[$i]);
                $dp_i_1 = max($dp_i_1, $dp_i_0 - $prices[$i]);
            }

            return $dp_i_0;
        }

        $dp = array_fill(0, $n, array_fill(0, $k, array_fill(0, 2, null)));
        for ($i = 0; $i < $n; ++$i) {
            for ($j = 0; $j < $k; ++$j) {
                if ($i == 0) {
                    $dp[$i][$j][0] = max(0, PHP_INT_MIN + $prices[$i]);
                    $dp[$i][$j][1] = max(PHP_INT_MIN, -$prices[$i]);
                } else {
                    $dp[$i][$j][0] = max($dp[$i - 1][$j][0], $dp[$i - 1][$j][1] + $prices[$i]);
                    if ($j == 0) {
                        $dp[$i][$j][1] = max($dp[$i - 1][$j][1], -$prices[$i]);
                    } else {
                        $dp[$i][$j][1] = max($dp[$i - 1][$j][1], $dp[$i - 1][$j - 1][0] - $prices[$i]);
                    }
                }
            }
        }

        return $dp[$n - 1][$k - 1][0];
    }
}
// @lc code=end
$k = 2;
$prices = [3, 3, 5, 0, 0, 3, 1, 4];
$prices = [3, 2, 6, 5, 0, 3];
echo (new Solution())->maxProfit($k, $prices) . PHP_EOL;
