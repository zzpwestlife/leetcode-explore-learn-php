<?php
/*
 * @lc app=leetcode.cn id=22 lang=php
 *
 * [22] 括号生成
 *
 * https://leetcode-cn.com/problems/generate-parentheses/description/
 *
 * algorithms
 * Medium (72.95%)
 * Likes:    737
 * Dislikes: 0
 * Total Accepted:    72.9K
 * Total Submissions: 99.5K
 * Testcase Example:  '3'
 *
 * 给出 n 代表生成括号的对数，请你写出一个函数，使其能够生成所有可能的并且有效的括号组合。
 * 
 * 例如，给出 n = 3，生成结果为：
 * 
 * [
 * ⁠ "((()))",
 * ⁠ "(()())",
 * ⁠ "(())()",
 * ⁠ "()(())",
 * ⁠ "()()()"
 * ]
 * 
 * 
 */

// @lc code=start
class Solution
{

    protected $result;
    /**
     * @param Integer $n
     * @return String[]
     */
    function generateParenthesis($n)
    {
        if ($n == 0) {
            return [];
        }
        $this->helper(0, 0, $n, '');
        return $this->result;
    }

    private function helper($left, $right, $n, $s)
    {
        if ($left == $n && $right == $n) {
            $this->result[] = $s;
            return;
        }
        if ($left < $n) $this->helper($left + 1, $right, $n, $s . '(');
        if ($right < $left) $this->helper($left, $right + 1, $n, $s . ')');
    }
}
// @lc code=end
