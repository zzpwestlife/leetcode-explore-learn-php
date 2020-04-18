<?php
/*
 * @lc app=leetcode.cn id=695 lang=php
 *
 * [695] 岛屿的最大面积
 *
 * https://leetcode-cn.com/problems/max-area-of-island/description/
 *
 * algorithms
 * Medium (59.16%)
 * Likes:    184
 * Dislikes: 0
 * Total Accepted:    21.1K
 * Total Submissions: 34.9K
 * Testcase Example:  '[[1,1,0,0,0],[1,1,0,0,0],[0,0,0,1,1],[0,0,0,1,1]]'
 *
 * 给定一个包含了一些 0 和 1的非空二维数组 grid , 一个 岛屿 是由四个方向 (水平或垂直) 的 1 (代表土地)
 * 构成的组合。你可以假设二维矩阵的四个边缘都被水包围着。
 * 
 * 找到给定的二维数组中最大的岛屿面积。(如果没有岛屿，则返回面积为0。)
 * 
 * 示例 1:
 * 
 * 
 * [[0,0,1,0,0,0,0,1,0,0,0,0,0],
 * ⁠[0,0,0,0,0,0,0,1,1,1,0,0,0],
 * ⁠[0,1,1,0,1,0,0,0,0,0,0,0,0],
 * ⁠[0,1,0,0,1,1,0,0,1,0,1,0,0],
 * ⁠[0,1,0,0,1,1,0,0,1,1,1,0,0],
 * ⁠[0,0,0,0,0,0,0,0,0,0,1,0,0],
 * ⁠[0,0,0,0,0,0,0,1,1,1,0,0,0],
 * ⁠[0,0,0,0,0,0,0,1,1,0,0,0,0]]
 * 
 * 
 * 对于上面这个给定矩阵应返回 6。注意答案不应该是11，因为岛屿只能包含水平或垂直的四个方向的‘1’。
 * 
 * 示例 2:
 * 
 * 
 * [[0,0,0,0,0,0,0,0]]
 * 
 * 对于上面这个给定的矩阵, 返回 0。
 * 
 * 注意: 给定的矩阵grid 的长度和宽度都不超过 50。
 * 
 */

// @lc code=start
class Solution
{
    protected $result = 0;
    protected $visited = [];
    protected $directions = [];
    /**
     * @param Integer[][] $grid
     * @return Integer
     */
    function maxAreaOfIsland1($grid)
    {
        $row = count($grid);
        if ($row == 0) return 0;
        $col = count($grid[0]);
        $this->directions = [[-1, 0], [0, -1], [1, 0], [0, 1]];
        $this->visited = array_fill(0, $row, array_fill(0, $col, false));
        for ($i = 0; $i < $row; ++$i) {
            for ($j = 0; $j < $col; ++$j) {
                if (!$this->visited[$i][$j] && $grid[$i][$j] == 1) {
                    $this->visited[$i][$j] = true;
                    $area = $this->search($grid, $row, $col, $i, $j, 1);
                    $this->result = max($this->result, $area);
                }
            }
        }
        return $this->result;
    }

    protected function search($grid, $row, $col, $i, $j, $area)
    {
        for ($n = 0; $n < 4; ++$n) {
            $newX = $i + $this->directions[$n][0];
            $newY = $j + $this->directions[$n][1];
            if (
                $this->inArea($row, $col, $newX, $newY)
                && !$this->visited[$newX][$newY]
                && $grid[$newX][$newY] == 1
            ) {
                $this->visited[$newX][$newY] = true;
                $area = $this->search($grid, $row, $col, $newX, $newY, $area + 1);
            }
        }

        return $area;
    }

    protected function inArea($row, $col, $i, $j)
    {
        if ($i < 0 || $i >= $row || $j < 0 || $j >= $col) return false;
        return true;
    }

    
}
// @lc code=end
$grid = [[1, 1, 0, 0, 0], [1, 1, 0, 0, 0], [0, 0, 0, 1, 1], [0, 0, 0, 1, 1]];
$grid = [[1, 1]];
echo (new Solution())->maxAreaOfIsland($grid) . PHP_EOL;
