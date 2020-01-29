/*
 * @lc app=leetcode.cn id=283 lang=php
 *
 * [283] 移动零
 */

// @lc code=start
class Solution {

    /**
     * @param Integer[] $nums
     * @return NULL
     */
    function moveZeroes(&$nums) {
        $length = count($nums);
        if ($nums <= 1) {
            return $nums;
        }

        $cur = 0;
        foreach ($nums as $index => $num) {
            if ($num != 0) {
                $nums[$cur] = $nums[$index];
                $cur++;
            }
        }

        for (; $cur < $length; ++$cur) {
            $nums[$cur] = 0;
        }
        return $nums;
    }
}
// @lc code=end

