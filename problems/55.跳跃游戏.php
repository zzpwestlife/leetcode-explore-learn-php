<?php
/*
 * @lc app=leetcode.cn id=55 lang=php
 *
 * [55] 跳跃游戏
 *
 * https://leetcode-cn.com/problems/jump-game/description/
 *
 * algorithms
 * Medium (37.68%)
 * Likes:    563
 * Dislikes: 0
 * Total Accepted:    82.5K
 * Total Submissions: 211.9K
 * Testcase Example:  '[2,3,1,1,4]'
 *
 * 给定一个非负整数数组，你最初位于数组的第一个位置。
 * 
 * 数组中的每个元素代表你在该位置可以跳跃的最大长度。
 * 
 * 判断你是否能够到达最后一个位置。
 * 
 * 示例 1:
 * 
 * 输入: [2,3,1,1,4]
 * 输出: true
 * 解释: 我们可以先跳 1 步，从位置 0 到达 位置 1, 然后再从位置 1 跳 3 步到达最后一个位置。
 * 
 * 
 * 示例 2:
 * 
 * 输入: [3,2,1,0,4]
 * 输出: false
 * 解释: 无论怎样，你总会到达索引为 3 的位置。但该位置的最大跳跃长度是 0 ， 所以你永远不可能到达最后一个位置。
 * 
 * 
 */

// @lc code=start
class Solution
{

    /**
     * @param Integer[] $nums
     * @return Boolean
     */
    function canJump1($nums)
    {
        // 最远可以到达的位置
        $k = 0;
        for ($i = 0; $i < count($nums); ++$i) {
            if ($i > $k) return false;
            $k = max($k, $i + $nums[$i]);
        }
        return true;
    }

    function canJump($nums)
    {
        // 从后向前
        $pos = count($nums) - 1;
        for ($i = $pos; $i >= 0; --$i) {
            // 从第 i 个位置可到达目标位
            if ($i + $nums[$i] >= $pos) {
                $pos = $i;
            }
        }
        return $pos == 0;
    }
}
// @lc code=end
error_reporting(E_ALL);
ini_set('display_errors', 1);
$nums = [2, 3, 1, 1, 4];
// $nums = [0];
// $nums = [1, 2];
// $nums = [3, 2, 1, 0, 4];
$nums = [3, 0, 8, 2, 0, 0, 1];
$nums = [2, 0, 6, 9, 8, 4, 5, 0, 8, 9, 1, 2, 9, 6, 8, 8, 0, 6, 3, 1, 2, 2, 1, 2, 6, 5, 3, 1, 2, 2, 6, 4, 2, 4, 3, 0, 0, 0, 3, 8, 2, 4, 0, 1, 2, 0, 1, 4, 6, 5, 8, 0, 7, 9, 3, 4, 6, 6, 5, 8, 9, 3, 4, 3, 7, 0, 4, 9, 0, 9, 8, 4, 3, 0, 7, 7, 1, 9, 1, 9, 4, 9, 0, 1, 9, 5, 7, 7, 1, 5, 8, 2, 8, 2, 6, 8, 2, 2, 7, 5, 1, 7, 9, 6];
$nums = [6, 5, 4, 3, 2, 1, 0, 0];
var_dump((new Solution())->canJump($nums));
