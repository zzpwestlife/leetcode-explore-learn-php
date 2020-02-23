<?php
/*
 * @lc app=leetcode.cn id=52 lang=php
 *
 * [52] N皇后 II
 *
 * https://leetcode-cn.com/problems/n-queens-ii/description/
 *
 * algorithms
 * Hard (77.23%)
 * Likes:    98
 * Dislikes: 0
 * Total Accepted:    15.9K
 * Total Submissions: 20.5K
 * Testcase Example:  '4'
 *
 * n 皇后问题研究的是如何将 n 个皇后放置在 n×n 的棋盘上，并且使皇后彼此之间不能相互攻击。
 * 
 * 
 * 
 * 上图为 8 皇后问题的一种解法。
 * 
 * 给定一个整数 n，返回 n 皇后不同的解决方案的数量。
 * 
 * 示例:
 * 
 * 输入: 4
 * 输出: 2
 * 解释: 4 皇后问题存在如下两个不同的解法。
 * [
 * [".Q..",  // 解法 1
 * "...Q",
 * "Q...",
 * "..Q."],
 * 
 * ["..Q.",  // 解法 2
 * "Q...",
 * "...Q",
 * ".Q.."]
 * ]
 * 
 * 
 */

// @lc code=start
class Solution
{
    protected $count = 0;
    /**
     * @param Integer $n
     * @return Integer
     */
    function totalNQueens($n)
    {
        if ($n <= 0) return $this->count;
        $board = array_fill(0, $n, array_fill(0, $n, 0));
        $this->helper($n, $board, 0);
        return $this->count;
    }

    private function helper($n, $board, $row)
    {
        if ($row == $n) {
            $this->count++;
            return;
        }

        // 在当前行遍历每一列
        for ($col = 0; $col < $n; ++$col) {
            if (!$this->valid($n, $board, $row, $col)) continue;
            $board[$row][$col] = 1;
            $this->helper($n, $board, $row + 1);
            $board[$row][$col] = 0;
        }
    }

    private function valid($n, $board, $row, $col)
    {
        // 同一列
        for ($i = 0; $i < $n; ++$i) {
            if ($board[$i][$col] == 1) return false;
        }

        $i = $row - 1;
        $j = $col - 1;
        for (; $i >= 0 && $j >= 0; --$i, --$j) {
            if ($board[$i][$j] == 1) return false;
        }

        $i = $row - 1;
        $j = $col + 1;
        for (; $i >= 0 && $j < $n; --$i, ++$j) {
            if ($board[$i][$j] == 1) return false;
        }

        return true;
    }
}
// @lc code=end
$n = 4;
print_r((new Solution())->totalNQueens($n));
