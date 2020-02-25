<?php
/*
 * @lc app=leetcode.cn id=169 lang=php
 *
 * [169] 多数元素
 *
 * https://leetcode-cn.com/problems/majority-element/description/
 *
 * algorithms
 * Easy (61.18%)
 * Likes:    449
 * Dislikes: 0
 * Total Accepted:    111.2K
 * Total Submissions: 180.4K
 * Testcase Example:  '[3,2,3]'
 *
 * 给定一个大小为 n 的数组，找到其中的多数元素。多数元素是指在数组中出现次数大于 ⌊ n/2 ⌋ 的元素。
 * 
 * 你可以假设数组是非空的，并且给定的数组总是存在多数元素。
 * 
 * 示例 1:
 * 
 * 输入: [3,2,3]
 * 输出: 3
 * 
 * 示例 2:
 * 
 * 输入: [2,2,1,1,1,2,2]
 * 输出: 2
 * 
 * 
 */

// @lc code=start
class Solution
{

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function majorityElement($nums)
    {
        sort($nums);
        return $nums[floor(count($nums) / 2)];
    }
}
// @lc code=end
$nums = [2, 2, 1, 1, 1, 2, 2, 1, 1, 1];
// $nums = [3, 2, 3];
// $nums = [3, 2, 3, 3];
// $nums = [3];
echo (new Solution())->majorityElement($nums);
