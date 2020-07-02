<?php
/*
 * @lc app=leetcode.cn id=378 lang=php
 *
 * [378] 有序矩阵中第K小的元素
 */

// @lc code=start
class Solution
{

    /**
     * @param Integer[][] $matrix
     * @param Integer $k
     * @return Integer
     */
    function kthSmallest($matrix, $k)
    {
        $row = count($matrix);
        $col = count(reset($matrix));
        $heap = new SplMaxHeap();
        for ($i = 0; $i < $row; ++$i) {
            for ($j = 0; $j < $col; ++$j) {
                if ($heap->count() < $k) {
                    $heap->insert($matrix[$i][$j]);
                } elseif ($matrix[$i][$j] < $heap->top()) {
                    $heap->extract();
                    $heap->insert($matrix[$i][$j]);
                }
            }
        }

        return $heap->top();
    }
}
// @lc code=end
