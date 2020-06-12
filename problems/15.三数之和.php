<?php
/*
 * @lc app=leetcode.cn id=15 lang=php
 *
 * [15] 三数之和
 *
 * https://leetcode-cn.com/problems/3sum/description/
 *
 * algorithms
 * Medium (25.18%)
 * Likes:    1756
 * Dislikes: 0
 * Total Accepted:    150.1K
 * Total Submissions: 593.9K
 * Testcase Example:  '[-1,0,1,2,-1,-4]'
 *
 * 给定一个包含 n 个整数的数组 nums，判断 nums 中是否存在三个元素 a，b，c ，使得 a + b + c = 0
 * ？找出所有满足条件且不重复的三元组。
 * 
 * 注意：答案中不可以包含重复的三元组。
 * 
 * 
 * 
 * 示例：
 * 
 * 给定数组 nums = [-1, 0, 1, 2, -1, -4]，
 * 
 * 满足要求的三元组集合为：
 * [
 * ⁠ [-1, 0, 1],
 * ⁠ [-1, -1, 2]
 * ]
 * 
 * 
 */

// @lc code=start
class Solution
{

    /**
     * @param Integer[] $nums
     * @return Integer[][]
     */
    function threeSum($nums)
    {
        $len = count($nums);
        $ans = [];
        if ($len < 3) {
            return $ans;
        }

        sort($nums);
        if (reset($nums) > 0 || end($nums) < 0) {
            return $ans;
        }

        for ($i = 0; $i < $len - 2; ++$i) {
            $left = $i + 1;
            $right = $len - 1;
            $target = -$nums[$i];
            while ($left < $right) {
                $sum = $nums[$left] + $nums[$right];
                if ($sum == $target) {
                    $key = sprintf('%d_%d_%d', $nums[$i], $nums[$left], $nums[$right]);
                    $ans[$key] = [$nums[$i], $nums[$left], $nums[$right]];
                    while ($left < $right && $nums[$left + 1] == $nums[$left]) {
                        $left++;
                    }
                    while ($left < $right && $nums[$right - 1] == $nums[$right]) {
                        $right--;
                    }
                    $left++;
                    $right--;
                } elseif ($sum < $target) {
                    $left++;
                } else {
                    $right--;
                }
            }
        }

        return array_values($ans);
    }
}
// @lc code=end

error_reporting(E_ALL);
ini_set('display_errors', 1);
$nums = [0, 0, 0, 0];
$nums = [-1, 0, 1, 2, -1, -4];
print_r((new Solution())->threeSum($nums));
