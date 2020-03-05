<?php
/*
 * @lc app=leetcode.cn id=994 lang=php
 *
 * [994] 腐烂的橘子
 *
 * https://leetcode-cn.com/problems/rotting-oranges/description/
 *
 * algorithms
 * Easy (46.23%)
 * Likes:    86
 * Dislikes: 0
 * Total Accepted:    8.2K
 * Total Submissions: 17.4K
 * Testcase Example:  '[[2,1,1],[1,1,0],[0,1,1]]'
 *
 * 在给定的网格中，每个单元格可以有以下三个值之一：
 * 
 * 
 * 值 0 代表空单元格；
 * 值 1 代表新鲜橘子；
 * 值 2 代表腐烂的橘子。
 * 
 * 
 * 每分钟，任何与腐烂的橘子（在 4 个正方向上）相邻的新鲜橘子都会腐烂。
 * 
 * 返回直到单元格中没有新鲜橘子为止所必须经过的最小分钟数。如果不可能，返回 -1。
 * 
 * 
 * 
 * 示例 1：
 * 
 * 
 * 
 * 输入：[[2,1,1],[1,1,0],[0,1,1]]
 * 输出：4
 * 
 * 
 * 示例 2：
 * 
 * 输入：[[2,1,1],[0,1,1],[1,0,1]]
 * 输出：-1
 * 解释：左下角的橘子（第 2 行， 第 0 列）永远不会腐烂，因为腐烂只会发生在 4 个正向上。
 * 
 * 
 * 示例 3：
 * 
 * 输入：[[0,2]]
 * 输出：0
 * 解释：因为 0 分钟时已经没有新鲜橘子了，所以答案就是 0 。
 * 
 * 
 * 
 * 
 * 提示：
 * 
 * 
 * 1 <= grid.length <= 10
 * 1 <= grid[0].length <= 10
 * grid[i][j] 仅为 0、1 或 2
 * 
 * 
 */

// @lc code=start
class Solution
{

    /**
     * @param Integer[][] $grid
     * @return Integer
     */
    function orangesRotting($grid)
    {
        $row = count($grid);
        if ($row == 0) return 0;
        $col = count($grid[0]);
        $minutes = 0;
        $visited = array_fill(0, $row, array_fill(0, $col, false));
        $queue = new SplQueue();
        for ($i = 0; $i < $row; ++$i) {
            for ($j = 0; $j < $col; ++$j) {
                if ($grid[$i][$j] == 2) {
                    $visited[$i][$j] = true;
                    $queue->enqueue($i * $col + $j);
                }
            }
        }

        $directions = [[-1, 0], [0, -1], [1, 0], [0, 1]];
        while ($count = $queue->count()) {
            for ($k = 0; $k < $count; ++$k) {
                $one = $queue->dequeue();
                $x = (int) ($one / $col);
                $y = $one % $col;
                for ($n = 0; $n < 4; ++$n) {
                    $newX = $x + $directions[$n][0];
                    $newY = $y + $directions[$n][1];
                    if (
                        $newX >= 0 && $newX < $row && $newY >= 0 && $newY < $col
                        && !$visited[$newX][$newY]
                        && $grid[$newX][$newY] == 1
                    ) {
                        $grid[$newX][$newY] = 2;
                        $visited[$newX][$newY] = true;
                        $queue->enqueue($newX * $col + $newY);
                    }
                }
            }
            $minutes++;
        }

        for ($i = 0; $i < $row; ++$i) {
            for ($j = 0; $j < $col; ++$j) {
                if ($grid[$i][$j] == 1) {
                    return -1;
                }
            }
        }
        return $minutes == 0 ? 0 : --$minutes;
    }
}
// @lc code=end

error_reporting(E_ALL);
ini_set('display_errors', 1);
$grid = [[2, 1, 1], [1, 1, 0], [0, 1, 1]];
// $grid = [[0]];
$grid = [[1]];
$grid = [[2, 2, 2, 1, 1]];
echo (new Solution())->orangesRotting($grid) . PHP_EOL;
