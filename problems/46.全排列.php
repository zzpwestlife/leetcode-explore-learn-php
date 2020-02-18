<?php
/*
 * @lc app=leetcode.cn id=46 lang=php
 *
 * [46] 全排列
 *
 * https://leetcode-cn.com/problems/permutations/description/
 *
 * algorithms
 * Medium (73.66%)
 * Likes:    533
 * Dislikes: 0
 * Total Accepted:    77.7K
 * Total Submissions: 104.9K
 * Testcase Example:  '[1,2,3]'
 *
 * 给定一个没有重复数字的序列，返回其所有可能的全排列。
 * 
 * 示例:
 * 
 * 输入: [1,2,3]
 * 输出:
 * [
 * ⁠ [1,2,3],
 * ⁠ [1,3,2],
 * ⁠ [2,1,3],
 * ⁠ [2,3,1],
 * ⁠ [3,1,2],
 * ⁠ [3,2,1]
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
    function permute($nums)
    {
        $len = count($nums);
        if ($len == 0) return $this->result;
        $used = array_fill(0, $len, false);
        $this->dfs($nums, 0, [], $used);
        return $this->result;
    }

    private function dfs($nums, $depth, $path, $used)
    {
        if ($depth == count($nums)) {
            $this->result[] = $path;
            return;
        }
        for ($i = 0; $i < count($nums); ++$i) {
            if ($used[$i] === true) continue;
            $path[] = $nums[$i];
            $used[$i] = true;
            $this->dfs($nums, $depth + 1, $path, $used);
            array_pop($path);
            unset($used[$i]);
        }
    }
}
// @lc code=end
// $nums = [1, 2, 3];
// print_r((new Solution())->permute($nums));
