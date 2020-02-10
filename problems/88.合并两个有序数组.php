<?php
/*
 * @lc app=leetcode.cn id=88 lang=php
 *
 * [88] 合并两个有序数组
 *
 * https://leetcode-cn.com/problems/merge-sorted-array/description/
 *
 * algorithms
 * Easy (46.29%)
 * Likes:    407
 * Dislikes: 0
 * Total Accepted:    105.6K
 * Total Submissions: 227.1K
 * Testcase Example:  '[1,2,3,0,0,0]\n3\n[2,5,6]\n3'
 *
 * 给定两个有序整数数组 nums1 和 nums2，将 nums2 合并到 nums1 中，使得 num1 成为一个有序数组。
 * 
 * 说明:
 * 
 * 
 * 初始化 nums1 和 nums2 的元素数量分别为 m 和 n。
 * 你可以假设 nums1 有足够的空间（空间大小大于或等于 m + n）来保存 nums2 中的元素。
 * 
 * 
 * 示例:
 * 
 * 输入:
 * nums1 = [1,2,3,0,0,0], m = 3
 * nums2 = [2,5,6],       n = 3
 * 
 * 输出: [1,2,2,3,5,6]
 * 
 */

// @lc code=start
class Solution
{

    /**
     * @param Integer[] $nums1
     * @param Integer $m
     * @param Integer[] $nums2
     * @param Integer $n
     * @return NULL
     */
    function merge(&$nums1, $m, $nums2, $n)
    {
        $arr = [];
        $i = $j = 0;
        while ($i < $m && $j < $n) {
            if ($nums1[$i] <= $nums2[$j]) {
                $arr[] = $nums1[$i];
                $i++;
            } else {
                $arr[] = $nums2[$j];
                $j++;
            }
        }

        if ($i < $m) {
            $nums1 = array_merge($arr, array_slice($nums1, $i, $m - $i));
        } else {
            $nums1 = array_merge($arr, array_slice($nums2, $j, $n - $j));
        }

        return $nums1;
    }
}
// @lc code=end
