<?php

/**
 * @comment 334. 递增的三元子序列
 * 给定一个未排序的数组，判断这个数组中是否存在长度为 3 的递增子序列。

数学表达式如下:

如果存在这样的 i, j, k,  且满足 0 ≤ i < j < k ≤ n-1，
使得 arr[i] < arr[j] < arr[k] ，返回 true ; 否则返回 false 。
说明: 要求算法的时间复杂度为 O (n)，空间复杂度为 O (1) 。

示例 1:

输入: [1,2,3,4,5]
输出: true
示例 2:

输入: [5,4,3,2,1]
输出: false
 */
class Solution334
{
    /**
     * @param Integer[] $nums
     * @return Boolean
     */
    function increasingTriplet($nums)
    {
        $length = count($nums);
        if ($length <= 2) {
            return false;
        }

        $small = $mid = PHP_INT_MAX;
        foreach ($nums as $value) {
            if ($value <= $small) {
                $small = $value;
            } elseif ($value <= $mid) {
                $mid = $value;
            } else {
                return true;
            }

            echo 'small: ' . $small . PHP_EOL;
            echo 'mid: ' . $mid . PHP_EOL;
        }

        return false;
    }
}

$nums = [1, 2, 3, 4, 5];
$nums = [5, 2, 3, 4, 5];
$nums = [5, 2, 3, 1, 5];
echo (new Solution334())->increasingTriplet($nums) . PHP_EOL;
