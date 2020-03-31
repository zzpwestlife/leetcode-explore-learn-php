<?php
/*
 * @lc app=leetcode.cn id=912 lang=php
 *
 * [912] 排序数组
 *
 * https://leetcode-cn.com/problems/sort-an-array/description/
 *
 * algorithms
 * Medium (52.27%)
 * Likes:    60
 * Dislikes: 0
 * Total Accepted:    25.9K
 * Total Submissions: 46.9K
 * Testcase Example:  '[5,2,3,1]'
 *
 * 给定一个整数数组 nums，将该数组升序排列。
 * 
 * 
 * 
 * 
 * 
 * 
 * 示例 1：
 * 
 * 
 * 输入：[5,2,3,1]
 * 输出：[1,2,3,5]
 * 
 * 
 * 示例 2：
 * 
 * 
 * 输入：[5,1,1,2,0,0]
 * 输出：[0,0,1,1,2,5]
 * 
 * 
 * 
 * 
 * 提示：
 * 
 * 
 * 1 <= A.length <= 10000
 * -50000 <= A[i] <= 50000
 * 
 * 
 */

// @lc code=start
class Solution
{

    private function swap(&$nums, $i, $j)
    {
        $tmp = $nums[$i];
        $nums[$i] = $nums[$j];
        $nums[$j] = $tmp;
    }
    /**
     * @param Integer[] $nums
     * @return Integer[]
     */
    function sortArray1($nums)
    {
        // 冒泡
        // 时间复杂度比较稳定不管怎样都需要O(n^2)) 次比较，所以是O(n^2)) 的时间复杂度。
        // 空间复杂度是O(1)O(1)，所有操作在原来的数组完成就可以了，不需要额外的空间。
        // 算法是稳定的，在冒泡的过程中如果两个元素相等，那么他们的位置是不会交换的。
        $n = count($nums);
        if ($n <= 1) return $nums;
        for ($i = $n - 1; $i >= 0; --$i) {
            for ($j = 0; $j < $i; ++$j) {
                if ($nums[$j] > $nums[$i]) {
                    $this->swap($nums, $i, $j);
                }
            }
        }

        return $nums;
    }

    function sortArray($nums)
    { 
        
    }
}
// @lc code=end
$nums = [5, 2, 3, 1];
print_r((new Solution())->sortArray($nums));
