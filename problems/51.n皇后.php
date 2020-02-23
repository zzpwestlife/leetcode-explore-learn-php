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
        // 本质上跟全排列问题差不多，决策树的每一层表示棋盘上的每一行；
        // 每个节点可以做出的选择是，在该行的任意一列放置一个皇后。
        if ($n == 0) {
            return [];
        }
        $board = array_fill(0, $n, array_fill(0, $n, '.'));
        $this->helper($n, $board, 0);

        return $this->result;
    }

    // 路径：board 中小于 row 的那些行都已经成功放置了皇后
    // 选择列表：第 row 行的所有列都是放置皇后的选择
    // 结束条件：row 超过 board 的最后一行
    private function helper($n, $board, $row)
    {
        // row 从 0 开始，row = n 时已越界
        if ($row == $n) {
            $tmp = [];
            foreach ($board as $item) {
                $tmp[] = implode('', $item);
            }
            $this->result[] = $tmp;
            return;
        }

        // 当前行遍历每一列
        for ($col = 0; $col < $n; ++$col) {
            // 不符合条件直接跳过，剪枝
            if (!$this->valid($n, $board, $row, $col)) {
                continue;
            }
            // 做选择
            $board[$row][$col] = 'Q';
            // 进入下一层决策
            $this->helper($n, $board, $row + 1);
            // 回溯，恢复状态，撤销选择
            $board[$row][$col] = '.';
        }
    }

    private function valid($n, $board, $row, $col)
    {
        // 同一行不存在冲突，无需处理
        // 左下和右下此时为空，无需处理
        // 同一列
        for ($i = 0; $i < $n; ++$i) {
            if ($board[$i][$col] == 'Q') {
                return false;
            }
        }

        // 右上，row - 1, col + 1
        $i = $row - 1;
        $j = $col + 1;
        for (; $i >= 0 && $j < $n; --$i, ++$j) {
            if ($board[$i][$j] == 'Q') {
                return false;
            }
        }

        // 左上， row - 1, col - 1
        $i = $row - 1;
        $j = $col - 1;
        for (; $i >= 0 && $j >= 0; --$i, --$j) {
            if ($board[$i][$j] == 'Q') {
                return false;
            }
        }

        return true;
    }
}
// @lc code=end
