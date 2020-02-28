<?php
/*
 * @lc app=leetcode.cn id=77 lang=php
 *
 * [77] 组合
 *
 * https://leetcode-cn.com/problems/combinations/description/
 *
 * algorithms
 * Medium (72.32%)
 * Likes:    215
 * Dislikes: 0
 * Total Accepted:    33.9K
 * Total Submissions: 46.7K
 * Testcase Example:  '4\n2'
 *
 * 给定两个整数 n 和 k，返回 1 ... n 中所有可能的 k 个数的组合。
 * 
 * 示例:
 * 
 * 输入: n = 4, k = 2
 * 输出:
 * [
 * ⁠ [2,4],
 * ⁠ [3,4],
 * ⁠ [2,3],
 * ⁠ [1,2],
 * ⁠ [1,3],
 * ⁠ [1,4],
 * ]
 * 
 */

// @lc code=start
class Solution
{
    protected $result = [];
    /**
     * @param Integer $n
     * @param Integer $k
     * @return Integer[][]
     */
    function combine($n, $k)
    {
        if ($n <= 0 || $k <= 0 || $k > $n) return $this->result;
        $this->_combine($n, $k, [], 1);
        return $this->result;   
    }

    private function _combine($n, $k, $path, $start)
    {
        if (count($path) == $k) {
            $this->result[] = $path;
            return;
        }

        // left = $n - $i + 1
        // need = $k = count($path)
        for ($i = $start; $n - $i + 1 >= $k - count($path); ++$i) {
            $path[] = $i;
            $this->_combine($n, $k, $path, $i + 1);
            array_pop($path);
        }
    }
}
// @lc code=end
