<?php
/*
 * @lc app=leetcode.cn id=1 lang=php
 *
 * [1] 两数之和
 *
 * https://leetcode-cn.com/problems/two-sum/description/
 *
 * algorithms
 * Easy (47.43%)
 * Likes:    7612
 * Dislikes: 0
 * Total Accepted:    811.7K
 * Total Submissions: 1.7M
 * Testcase Example:  '[2,7,11,15]\n9'
 *
 * 给定一个整数数组 nums 和一个目标值 target，请你在该数组中找出和为目标值的那 两个 整数，并返回他们的数组下标。
 * 
 * 你可以假设每种输入只会对应一个答案。但是，你不能重复利用这个数组中同样的元素。
 * 
 * 示例:
 * 
 * 给定 nums = [2, 7, 11, 15], target = 9
 * 
 * 因为 nums[0] + nums[1] = 2 + 7 = 9
 * 所以返回 [0, 1]
 * 
 * 
 */

// @lc code=start
class Solution
{

    /**
     * @param Integer[] $nums
     * @param Integer $target
     * @return Integer[]
     */
    function twoSum($nums, $target)
    {
        $len = count($nums);
        if ($len <= 1) {
            return [];
        }

        $hash = [];
        for ($i = 0; $i < $len; ++$i) {
            $diff = $target - $nums[$i];
            if (isset($hash[$diff])) {
                return [$i, $hash[$diff]];
            }
            if (!isset($hash[$nums[$i]])) {
                $hash[$nums[$i]] = $i;
            }
        }

        return [];
    }
}
// @lc code=end
$nums = [3, 3, 11, 15];
$target = 6;
print_r((new Solution())->twoSum($nums, $target));
