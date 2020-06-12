<?php
/*
 * @lc app=leetcode.cn id=152 lang=php
 *
 * [152] 乘积最大子序列
 *
 * https://leetcode-cn.com/problems/maximum-product-subarray/description/
 *
 * algorithms
 * Medium (36.67%)
 * Likes:    505
 * Dislikes: 0
 * Total Accepted:    52.5K
 * Total Submissions: 136.7K
 * Testcase Example:  '[2,3,-2,4]'
 *
 * 给你一个整数数组 nums ，请你找出数组中乘积最大的连续子数组（该子数组中至少包含一个数字），并返回该子数组所对应的乘积。
 * 
 * 
 * 
 * 示例 1:
 * 
 * 输入: [2,3,-2,4]
 * 输出: 6
 * 解释: 子数组 [2,3] 有最大乘积 6。
 * 
 * 
 * 示例 2:
 * 
 * 输入: [-2,0,-1]
 * 输出: 0
 * 解释: 结果不能为 2, 因为 [-2,-1] 不是子数组。
 * 
 */

// @lc code=start
class Solution
{

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function maxProduct($nums)
    {
        // dp[i][j]：以 nums[i] 结尾的连续子数组的最值，计算最大值还是最小值由 j 来表示，j 就两个值；
        // 当 j = 0 的时候，表示计算的是最小值；
        // 当 j = 1 的时候，表示计算的是最大值。
        $n = count($nums);
        $dp = array_fill(0, $n, array_fill(0, 2, 1));
        $dp[0][0] = $dp[0][1] = $nums[0];
        for ($i = 1; $i < $n; ++$i) {
            if ($nums[$i] == 0) {
                $dp[$i][0] = $dp[$i][1] = 0;
                continue;
            }
            if ($nums[$i] > 0) {
                $dp[$i][0] = min($nums[$i], $dp[$i - 1][0] * $nums[$i]);
                $dp[$i][1] = max($nums[$i], $dp[$i - 1][1] * $nums[$i]);
            } else {
                $dp[$i][0] = min($nums[$i], $dp[$i - 1][1] * $nums[$i]);
                $dp[$i][1] = max($nums[$i], $dp[$i - 1][0] * $nums[$i]);
            }
        }

        $ans = $dp[0][1];
        for ($i = 1; $i < $n; ++$i) {
            $ans = max($ans, $dp[$i][1]);
        }
        return $ans;
    }
}
// @lc code=end
