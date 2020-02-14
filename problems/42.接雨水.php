<?php
/*
 * @lc app=leetcode.cn id=42 lang=php
 *
 * [42] 接雨水
 *
 * https://leetcode-cn.com/problems/trapping-rain-water/description/
 *
 * algorithms
 * Hard (48.07%)
 * Likes:    845
 * Dislikes: 0
 * Total Accepted:    52.2K
 * Total Submissions: 107.8K
 * Testcase Example:  '[0,1,0,2,1,0,1,3,2,1,2,1]'
 *
 * 给定 n 个非负整数表示每个宽度为 1 的柱子的高度图，计算按此排列的柱子，下雨之后能接多少雨水。
 * 
 * 
 * 
 * 上面是由数组 [0,1,0,2,1,0,1,3,2,1,2,1] 表示的高度图，在这种情况下，可以接 6 个单位的雨水（蓝色部分表示雨水）。 感谢
 * Marcos 贡献此图。
 * 
 * 示例:
 * 
 * 输入: [0,1,0,2,1,0,1,3,2,1,2,1]
 * 输出: 6
 * 
 */

// @lc code=start
class Solution
{

    /**
     * @param Integer[] $height
     * @return Integer
     */
    // TODO 多做几遍
    function trap($height)
    {
        $len = count($height);
        if ($len <= 1) return 0;
        $result = 0;
        $maxLeft = $maxRight = array_fill(0, $len, 0);
        // 从左向右计算 l_max
        for ($i = 1; $i < $len - 1; ++$i) {
            $maxLeft[$i] = max($maxLeft[$i - 1], $height[$i - 1]);
        }

        // 从右向左计算 r_max
        for ($i = $len - 1; $i > 0; --$i) {
            $maxRight[$i] = max($maxRight[$i + 1], $height[$i + 1]);
        }

        for ($i = 1; $i < $len - 1; ++$i) {
            $diff = min($maxLeft[$i], $maxRight[$i]) - $height[$i];
            if ($diff > 0) {
                $result += $diff;
            }
        }

        return $result;
    }
}
// @lc code=end
$height = [2, 0, 2];
print_r((new Solution())->trap($height));
echo PHP_EOL;
