<?php
/*
 * @lc app=leetcode.cn id=189 lang=php
 *
 * [189] 旋转数组
 *
 * https://leetcode-cn.com/problems/rotate-array/description/
 *
 * algorithms
 * Easy (40.16%)
 * Likes:    479
 * Dislikes: 0
 * Total Accepted:    94.5K
 * Total Submissions: 234.7K
 * Testcase Example:  '[1,2,3,4,5,6,7]\n3'
 *
 * 给定一个数组，将数组中的元素向右移动 k 个位置，其中 k 是非负数。
 * 
 * 示例 1:
 * 
 * 输入: [1,2,3,4,5,6,7] 和 k = 3
 * 输出: [5,6,7,1,2,3,4]
 * 解释:
 * 向右旋转 1 步: [7,1,2,3,4,5,6]
 * 向右旋转 2 步: [6,7,1,2,3,4,5]
 * 向右旋转 3 步: [5,6,7,1,2,3,4]
 * 
 * 
 * 示例 2:
 * 
 * 输入: [-1,-100,3,99] 和 k = 2
 * 输出: [3,99,-1,-100]
 * 解释: 
 * 向右旋转 1 步: [99,-1,-100,3]
 * 向右旋转 2 步: [3,99,-1,-100]
 * 
 * 说明:
 * 
 * 
 * 尽可能想出更多的解决方案，至少有三种不同的方法可以解决这个问题。
 * 要求使用空间复杂度为 O(1) 的 原地 算法。
 * 
 * 
 */

// @lc code=start
class Solution
{

    /**
     * @param Integer[] $nums
     * @param Integer $k
     * @return NULL
     */
    function rotate(&$nums, $k)
    {
        $len = count($nums);
        if ($k > $len) {
            $k = $k % $len;
        }
        $nums = $this->reverse($nums, 0, $len - 1);
        $nums = $this->reverse($nums, 0, $k - 1);
        $nums = $this->reverse($nums, $k, $len - 1);
        return $nums;
    }

    private function reverse($arr, $left, $right)
    {
        while ($left <= $right) {
            $tmp = $arr[$left];
            $arr[$left] = $arr[$right];
            $arr[$right] = $tmp;
            $left++;
            $right--;
        }

        return $arr;
    }
}
// @lc code=end
// $nums = [1, 2, 3, 4, 5, 6, 7];
$nums = [-1];
// $k = 3;
$k = 2;
print_r((new Solution())->rotate($nums, $k));
