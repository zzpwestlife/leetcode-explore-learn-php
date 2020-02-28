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
        $this->result[] = [];
        $count = count($nums);
        if ($count == 0) return $this->result;
        sort($nums);
        $this->_subsetsWithDup($nums, [], 0);
        return $this->result;
    }

    private function _subsetsWithDup($nums, $path, $start)
    {
        if (count($path) == count($nums)) {
            return;
        }

        for ($i = $start; $i < count($nums); ++$i) {
            if ($i > $start && $nums[$i] == $nums[$i - 1]) continue;
            $path[] = $nums[$i];
            $this->result[] = $path;
            $this->_subsetsWithDup($nums, $path, $i + 1);
            array_pop($path);
        }
    }
}
// @lc code=end
