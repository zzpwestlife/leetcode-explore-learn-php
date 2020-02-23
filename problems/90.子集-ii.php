<?php
/*
 * @lc app=leetcode.cn id=90 lang=php
 *
 * [90] 子集 II
 *
 * https://leetcode-cn.com/problems/subsets-ii/description/
 *
 * algorithms
 * Medium (58.44%)
 * Likes:    163
 * Dislikes: 0
 * Total Accepted:    22.4K
 * Total Submissions: 37.9K
 * Testcase Example:  '[1,2,2]'
 *
 * 给定一个可能包含重复元素的整数数组 nums，返回该数组所有可能的子集（幂集）。
 * 
 * 说明：解集不能包含重复的子集。
 * 
 * 示例:
 * 
 * 输入: [1,2,2]
 * 输出:
 * [
 * ⁠ [2],
 * ⁠ [1],
 * ⁠ [1,2,2],
 * ⁠ [2,2],
 * ⁠ [1,2],
 * ⁠ []
 * ]
 * 
 */

// @lc code=start
class Solution
{
    protected $result = [];
    /**
     * @param Integer[] $nums
     * @return Integer[][]
     */
    function subsetsWithDup($nums)
    {
        if (empty($nums)) return [[]];
        sort($nums);
        $used = array_fill(0, count($nums), false);
        $this->ss($nums, [], 0, $used);
        $this->result[] = [];
        return $this->result;
    }

    private function ss($nums, $path, $start, $used)
    {
        if (count($path) == count($nums)) {
            return;
        }

        for ($i = $start; $i < count($nums); ++$i) {
            if ($i > 0 && $nums[$i] == $nums[$i - 1] && !$used[$i - 1]) continue;
            $path[] = $nums[$i];
            $used[$i] = true;
            $this->result[] = $path;
            $this->ss($nums, $path, $i + 1, $used);
            array_pop($path);
            $used[$i] = false;
        }
    }
}
// @lc code=end
