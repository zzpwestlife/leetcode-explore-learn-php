<?php
/*
 * @lc app=leetcode.cn id=200 lang=php
 *
 * [200] 岛屿数量
 *
 * https://leetcode-cn.com/problems/number-of-islands/description/
 *
 * algorithms
 * Medium (46.67%)
 * Likes:    376
 * Dislikes: 0
 * Total Accepted:    57.1K
 * Total Submissions: 121.4K
 * Testcase Example:  '[["1","1","1","1","0"],["1","1","0","1","0"],["1","1","0","0","0"],["0","0","0","0","0"]]'
 *
 * 给定一个由 '1'（陆地）和
 * '0'（水）组成的的二维网格，计算岛屿的数量。一个岛被水包围，并且它是通过水平方向或垂直方向上相邻的陆地连接而成的。你可以假设网格的四个边均被水包围。
 * 
 * 示例 1:
 * 
 * 输入:
 * 11110
 * 11010
 * 11000
 * 00000
 * 
 * 输出: 1
 * 
 * 
 * 示例 2:
 * 
 * 输入:
 * 11000
 * 11000
 * 00100
 * 00011
 * 
 * 输出: 3
 * 
 * 
 */

// @lc code=start
class Solution
{

    /**
     * @param String[][] $grid
     * @return Integer
     */
    function numIslands($grid)
    {
        $rows = count($grid);
        if ($rows == 0) return 0;
        $cols = count($grid[0]);
        $count = 0;
        $directions = [[-1, 0], [0, -1], [1, 0], [0, 1]];
        $visited = array_fill(0, $rows, array_fill(0, $cols, 0));
        $queue = new SplQueue();
        for ($i = 0; $i < $rows; ++$i) {
            for ($j = 0; $j < $cols; ++$j) {
                if (!$visited[$i][$j] && $grid[$i][$j] == '1') {
                    $count++;
                    $visited[$i][$j] = 1;
                    $queue->enqueue($i * $cols + $j);
                    while ($queue->count()) {
                        $one = $queue->dequeue();
                        $x = (int) ($one / $cols);
                        $y = $one % $cols;
                        echo 'x: ' . $x . ' y: ' . $y . PHP_EOL;
                        for ($m = 0; $m < 4; ++$m) {
                            $newX = $x + $directions[$m][0];
                            $newY = $y + $directions[$m][1];
                            if (
                                $this->inArea($newX, $newY, $rows, $cols)
                                && !$visited[$newX][$newY]
                                && $grid[$newX][$newY] == '1'
                            ) {
                                $queue->enqueue($newX * $cols + $newY);
                                $visited[$newX][$newY] = 1;
                            }
                        }
                    }
                }
            }
        }

        return $count;
    }

    private function inArea($x, $y, $rows, $cols)
    {
        if ($x < 0 || $y < 0) return false;
        if ($x >= $rows || $y >= $cols) return false;
        return true;
    }
}
// @lc code=end
error_reporting(E_ALL);
ini_set('display_errors', 1);
$grid = [["1", "1", "1", "1", "0"], ["1", "1", "0", "1", "0"], ["1", "1", "0", "0", "0"], ["0", "0", "0", "0", "0"]];
print_r((new Solution())->numIslands($grid));
echo PHP_EOL;
