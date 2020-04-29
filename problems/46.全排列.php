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
    protected $ans = [];
    /**
     * @param Integer[] $nums
     * @return Integer[][]
     */
    function permute1($nums)
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

    function permute($nums)
    {
        $n = count($nums);
        if ($n <= 1) return $nums;

        $used = [];
        $this->backtrack($nums, $n, [], $used);
        return $this->ans;
    }

    private function backtrack($nums, $n, $stack, $used)
    {
        if (count($stack) == $n) {
            array_push($this->ans, $stack);
            return;
        }

        for ($i = 0; $i < $n; ++$i) {
            if (isset($used[$nums[$i]])) continue;
            $used[$nums[$i]] = true;
            $stack[] = $nums[$i];
            $this->backtrack($nums, $n, $stack, $used);
            unset($used[$nums[$i]]);
            array_pop($stack);
        }
    }
}
// @lc code=end

error_reporting(E_ALL);
ini_set('display_errors', 1);
$nums = [1, 2, 3];
print_r((new Solution())->permute($nums));
