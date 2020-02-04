<?php
/*
* @lc app=leetcode.cn id=283 lang=php
*
* [283] 移动零
*/

// @lc code=start
class Solution
{

    /**
     * @param Integer[] $nums
     * @return NULL
     */
    function moveZeroes(&$nums)
    {
        $len = count($nums);
        if ($len <= 1) {
            return $nums;
        }
        $slow = 0;
        for ($fast = 0; $fast < $len; ++$fast) {
            if ($nums[$fast] != 0) {
                if ($slow != $fast) {
                    $nums[$slow] = $nums[$fast];
                    $nums[$fast] = 0;
                }
                $slow++;
            }
        }
        return $nums;
    }
} // @lc code=end

$nums = [0, 1, 0, 3, 12];
print_r((new Solution())->moveZeroes($nums));
