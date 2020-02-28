<?php
/*
 * @lc app=leetcode.cn id=39 lang=php
 *
 * [39] 组合总和
 *
 * https://leetcode-cn.com/problems/combination-sum/description/
 *
 * algorithms
 * Medium (68.01%)
 * Likes:    531
 * Dislikes: 0
 * Total Accepted:    63.8K
 * Total Submissions: 93.3K
 * Testcase Example:  '[2,3,6,7]\n7'
 *
 * 给定一个无重复元素的数组 candidates 和一个目标数 target ，找出 candidates 中所有可以使数字和为 target 的组合。
 * 
 * candidates 中的数字可以无限制重复被选取。
 * 
 * 说明：
 * 
 * 
 * 所有数字（包括 target）都是正整数。
 * 解集不能包含重复的组合。 
 * 
 * 
 * 示例 1:
 * 
 * 输入: candidates = [2,3,6,7], target = 7,
 * 所求解集为:
 * [
 * ⁠ [7],
 * ⁠ [2,2,3]
 * ]
 * 
 * 
 * 示例 2:
 * 
 * 输入: candidates = [2,3,5], target = 8,
 * 所求解集为:
 * [
 * [2,2,2,2],
 * [2,3,3],
 * [3,5]
 * ]
 * 
 */

// @lc code=start
class Solution
{
    protected $result = [];
    /**
     * @param Integer[] $candidates
     * @param Integer $target
     * @return Integer[][]
     */
    function combinationSum($candidates, $target)
    {
        if ($target <= 0) return $this->result;
        sort($candidates);
        $this->combine($candidates, $target, [], 0);
        return $this->result;
    }

    private function combine($candidates, $target, $path, $start) {
        if ($target < 0) return;
        if ($target == 0) {
            $this->result[] = $path;
            return;
        }

        for ($i = $start; $i < count($candidates); ++$i) {
            // 剪枝
            if ($target - $candidates[$i] < 0) continue;
            $path[] = $candidates[$i];
            $this->combine($candidates, $target - $candidates[$i], $path, $i);
            array_pop($path);
        }
    }
}
// @lc code=end
