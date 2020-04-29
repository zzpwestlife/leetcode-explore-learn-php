<?php
/*
 * @lc app=leetcode.cn id=33 lang=php
 *
 * [33] 搜索旋转排序数组
 *
 * https://leetcode-cn.com/problems/search-in-rotated-sorted-array/description/
 *
 * algorithms
 * Medium (36.30%)
 * Likes:    636
 * Dislikes: 0
 * Total Accepted:    101.1K
 * Total Submissions: 273.8K
 * Testcase Example:  '[4,5,6,7,0,1,2]\n0'
 *
 * 假设按照升序排序的数组在预先未知的某个点上进行了旋转。
 *
 * ( 例如，数组 [0,1,2,4,5,6,7] 可能变为 [4,5,6,7,0,1,2] )。
 *
 * 搜索一个给定的目标值，如果数组中存在这个目标值，则返回它的索引，否则返回 -1 。
 *
 * 你可以假设数组中不存在重复的元素。
 *
 * 你的算法时间复杂度必须是 O(log n) 级别。
 *
 * 示例 1:
 *
 * 输入: nums = [4,5,6,7,0,1,2], target = 0
 * 输出: 4
 *
 *
 * 示例 2:
 *
 * 输入: nums = [4,5,6,7,0,1,2], target = 3
 * 输出: -1
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
    public function search($nums, $target)
    {
        $n = count($nums);
        if ($n == 0) {
            return -1;
        }

        // 变形的二分查找
        $left = 0;
        $right = $n - 1;
        return $this->find($nums, $left, $right, $target);
    }

    private function find($nums, $left, $right, $target)
    {
        if ($left > $right) {
            return -1;
        }

        $mid = $left + floor(($right - $left) / 2);
        $leftVal = $nums[$left];
        $midVal = $nums[$mid];
        $rightVal = $nums[$right];
        if ($target == $leftVal) {
            return $left;
        }

        if ($target == $midVal) {
            return $mid;
        }

        if ($target == $rightVal) {
            return $right;
        }

        
        if ($leftVal < $midVal) {
            // 左半边有序
            if ($leftVal < $target && $target < $midVal) {
                return $this->find($nums, $left + 1, $mid - 1, $target);
            } else {
                return $this->find($nums, $mid + 1, $right - 1, $target);
            }
        } else {
            if ($midVal < $target && $target < $rightVal) {
                return $this->find($nums, $mid + 1, $right - 1, $target);
            } else {
                return $this->find($nums, $left + 1, $mid - 1, $target);
            }
        }

        return -1;
    }
}
// @lc code=end
$nums = range(1, 50);
$target = 40;
$nums = [4, 5, 6, 7, 0, 1, 2];
$target = 0;
echo (new Solution())->search($nums, $target) . PHP_EOL;
