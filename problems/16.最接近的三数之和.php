<?php
/*
 * @lc app=leetcode.cn id=16 lang=php
 *
 * [16] 最接近的三数之和
 *
 * https://leetcode-cn.com/problems/3sum-closest/description/
 *
 * algorithms
 * Medium (42.61%)
 * Likes:    352
 * Dislikes: 0
 * Total Accepted:    69.9K
 * Total Submissions: 163.7K
 * Testcase Example:  '[-1,2,1,-4]\n1'
 *
 * 给定一个包括 n 个整数的数组 nums 和 一个目标值 target。找出 nums 中的三个整数，使得它们的和与 target
 * 最接近。返回这三个数的和。假定每组输入只存在唯一答案。
 * 
 * 例如，给定数组 nums = [-1，2，1，-4], 和 target = 1.
 * 
 * 与 target 最接近的三个数的和为 2. (-1 + 2 + 1 = 2).
 * 
 * 
 */

// @lc code=start
class Solution
{

    /**
     * @param Integer[] $nums
     * @param Integer $target
     * @return Integer
     */
    function threeSumClosest($nums, $target)
    {
        sort($nums);
        $len = count($nums);    
        $distance = PHP_INT_MAX;
        $ans = null;
        for ($i = 0; $i < $len - 2; ++$i) {
            if ($i > 0 && $nums[$i] == $nums[$i - 1]) continue;
            $left = $i + 1;
            $right = $len - 1;
            while ($left < $right) {
                $sum = $nums[$left] + $nums[$right] + $nums[$i];
                $diff = $sum - $target;
                if ($sum == $target) {
                    return $sum;
                } elseif ($sum > $target) {
                    while ($left < $right && $nums[$right - 1] == $nums[$right]) {
                        $right--;
                    }
                    $right--;
                } else {
                    while ($left < $right && $nums[$left + 1] == $nums[$left]) {
                        $left++;
                    }
                    $left++;
                }

                if (abs($diff) < $distance) {
                    $distance = abs($diff);
                    $ans = $sum;
                }
            }
        }
        return $ans;
    }
}
// @lc code=end
