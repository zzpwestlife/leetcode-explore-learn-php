<?php
/*
 * @lc app=leetcode.cn id=852 lang=php
 *
 * [852] 山脉数组的峰顶索引
 *
 * https://leetcode-cn.com/problems/peak-index-in-a-mountain-array/description/
 *
 * algorithms
 * Easy (69.02%)
 * Likes:    75
 * Dislikes: 0
 * Total Accepted:    23.1K
 * Total Submissions: 32.9K
 * Testcase Example:  '[0,1,0]'
 *
 * 我们把符合下列属性的数组 A 称作山脉：
 * 
 * 
 * A.length >= 3
 * 存在 0 < i < A.length - 1 使得A[0] < A[1] < ... A[i-1] < A[i] > A[i+1] > ... >
 * A[A.length - 1]
 * 
 * 
 * 给定一个确定为山脉的数组，返回任何满足 A[0] < A[1] < ... A[i-1] < A[i] > A[i+1] > ... >
 * A[A.length - 1] 的 i 的值。
 * 
 * 
 * 
 * 示例 1：
 * 
 * 输入：[0,1,0]
 * 输出：1
 * 
 * 
 * 示例 2：
 * 
 * 输入：[0,2,1,0]
 * 输出：1
 * 
 * 
 * 
 * 提示：
 * 
 * 
 * 3 <= A.length <= 10000
 * 0 <= A[i] <= 10^6
 * A 是如上定义的山脉
 * 
 * 
 * 
 * 
 */

// @lc code=start
class Solution
{

    /**
     * @param Integer[] $A
     * @return Integer
     */
    function peakIndexInMountainArray($A)
    {
        $n = count($A);
        $left = 0;
        $right = $n - 1;
        while ($left < $right) {
            $mid = $left + floor(($right - $left + 1) / 2);
            // echo sprintf('left=%d, right=%d, mid=%d', $left, $right, $mid) . PHP_EOL;
            if ($A[$mid] > $A[$mid - 1]) {
                $left = $mid;
            } else {
                $right = $mid - 1;
            }
        }

        return $left;
    }
}
// @lc code=end
$A = [1, 2, 3, 4, 3, 2];
// $A = [0, 1, 0];
echo (new Solution())->peakIndexInMountainArray($A) . PHP_EOL;
