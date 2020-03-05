<?php
/*
 * @lc app=leetcode.cn id=51 lang=php
 *
 * [51] N皇后
 *
 * https://leetcode-cn.com/problems/n-queens/description/
 *
 * algorithms
 * Hard (67.48%)
 * Likes:    330
 * Dislikes: 0
 * Total Accepted:    26.1K
 * Total Submissions: 38.4K
 * Testcase Example:  '4'
 *
 * n 皇后问题研究的是如何将 n 个皇后放置在 n×n 的棋盘上，并且使皇后彼此之间不能相互攻击。
 *
 *
 *
 * 上图为 8 皇后问题的一种解法。
 *
 * 给定一个整数 n，返回所有不同的 n 皇后问题的解决方案。
 *
 * 每一种解法包含一个明确的 n 皇后问题的棋子放置方案，该方案中 'Q' 和 '.' 分别代表了皇后和空位。
 *
 * 示例:
 *
 * 输入: 4
 * 输出: [
 * ⁠[".Q..",  // 解法 1
 * ⁠ "...Q",
 * ⁠ "Q...",
 * ⁠ "..Q."],
 *
 * ⁠["..Q.",  // 解法 2
 * ⁠ "Q...",
 * ⁠ "...Q",
 * ⁠ ".Q.."]
 * ]
 * 解释: 4 皇后问题存在两个不同的解法。
 *
 *
 */

// @lc code=start
class Solution
{
    protected $result = [];

    /**
     * @param int $n
     *
     * @return String[][]
     */
    public function solveNQueens($n)
    {
        if ($n <= 0) return [];
        $board = array_fill(0, $n, array_fill(0, $n, '.'));
        $this->_solveNQueens($n, $board, 0);
        return $this->result;
    }

    private function _solveNQueens($n, $board, $row)
    {
        if ($row == $n) {
            $tmp = [];
            foreach ($board as $line) {
                $tmp[] = implode('', $line);
            }

            $this->result[] = $tmp;
        }

        for ($col = 0; $col < $n; ++$col) {
            if (!$this->valid($n, $board, $row, $col)) continue;
            $board[$row][$col] = 'Q';
            $this->_solveNQueens($n, $board, $row + 1);
            $board[$row][$col] = '.';
        }
    }

    private function valid($n, $board, $row, $col)
    {
        // the same column
        for ($i = 0; $i < $n; ++$i) {
            if ($board[$i][$col] == 'Q') return false;
        }

        // left top
        $i = $row - 1;
        $j = $col - 1;
        for (; $i >= 0 && $j >= 0; --$i, --$j) {
            if ($board[$i][$j] == 'Q') return false;
        }

        // right top
        $i = $row - 1;
        $j = $col + 1;
        for (; $i >= 0 && $j < $n; --$i, ++$j) {
            if ($board[$i][$j] == 'Q') return false;
        }
        return true;
    }
}
// @lc code=end
