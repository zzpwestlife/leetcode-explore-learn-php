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
        $count = count($nums);
        if ($count == 0) return $this->result;
        $this->_permute($nums, []);
        return $this->result;
    }

    private function _permute($nums, $path)
    {
        if (count($path) == count($nums)) {
            $this->result[] = $path;
            return;
        }

        for ($i = 0; $i < count($nums); ++$i) {
            if (in_array($nums[$i], $path)) continue;
            $path[] = $nums[$i];
            $this->_permute($nums, $path);
            array_pop($path);
        }
    }
}
// @lc code=end
// $nums = [1, 2, 3];
// print_r((new Solution())->permute($nums));
