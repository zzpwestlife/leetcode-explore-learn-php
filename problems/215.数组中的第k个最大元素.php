<?php
/*
 * @lc app=leetcode.cn id=215 lang=php
 *
 * [215] 数组中的第K个最大元素
 */

// @lc code=start
class Solution
{

    /**
     * @param Integer[] $nums
     * @param Integer $k
     * @return Integer
     */
    function findKthLargest($nums, $k)
    {
        $n = count($nums);
        $heap = new SplMinHeap();
        for ($i = 0; $i < $n; ++$i) {
            if ($heap->count() < $k) {
                $heap->insert($nums[$i]);
            } elseif ($heap->top() < $nums[$i]) {
                $heap->extract();
                $heap->insert($nums[$i]);
            }
        }

        return $heap->top();
    }
}
// @lc code=end
