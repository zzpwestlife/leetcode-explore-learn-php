<?php
/*
 * @lc app=leetcode.cn id=463 lang=php
 *
 * [463] 岛屿的周长
 *
 * https://leetcode-cn.com/problems/island-perimeter/description/
 *
 * algorithms
 * Easy (64.48%)
 * Likes:    162
 * Dislikes: 0
 * Total Accepted:    13.6K
 * Total Submissions: 20.8K
 * Testcase Example:  '[[0,1,0,0],[1,1,1,0],[0,1,0,0],[1,1,0,0]]'
 *
 * 给定一个包含 0 和 1 的二维网格地图，其中 1 表示陆地 0 表示水域。
 * 
 * 网格中的格子水平和垂直方向相连（对角线方向不相连）。整个网格被水完全包围，但其中恰好有一个岛屿（或者说，一个或多个表示陆地的格子相连组成的岛屿）。
 * 
 * 岛屿中没有“湖”（“湖” 指水域在岛屿内部且不和岛屿周围的水相连）。格子是边长为 1 的正方形。网格为长方形，且宽度和高度均不超过 100
 * 。计算这个岛屿的周长。
 * 
 * 
 * 
 * 示例 :
 * 
 * 输入:
 * [[0,1,0,0],
 * ⁠[1,1,1,0],
 * ⁠[0,1,0,0],
 * ⁠[1,1,0,0]]
 * 
 * 输出: 16
 * 
 * 解释: 它的周长是下面图片中的 16 个黄色的边：
 * 
 * 
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
    function islandPerimeter($grid)
    {
        $row = count($grid);
        if ($row == 0) return 0;
        $col = count(reset($grid));
        $sum = 0;
        $directions = [[-1, 0], [0, -1], [1, 0], [0, 1]];
        // 每个节点的贡献值
        for ($i = 0; $i < $row; ++$i) {
            for ($j = 0; $j < $col; ++$j) {
                if ($grid[$i][$j] == 1) {
                    $line = 4;
                    for ($n = 0; $n < 4; ++$n) {
                        $newX = $i + $directions[$n][0];
                        $newY = $j + $directions[$n][1];
                        if (isset($grid[$newX][$newY]) && $grid[$newX][$newY] == 1) {
                            $line--;
                        }
                    }
                    $sum += $line;
                }
            }
        }

        return $sum;
    }
}
// @lc code=end


error_reporting(E_ALL);
ini_set('display_errors', 1);
$grid = [[0, 1, 0, 0], [1, 1, 1, 0], [0, 1, 0, 0], [1, 1, 0, 0]];
// $grid = [[1, 1], [1, 1]];

echo (new Solution())->islandPerimeter($grid) . PHP_EOL;
