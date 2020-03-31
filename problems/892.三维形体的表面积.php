<?php
/*
 * @lc app=leetcode.cn id=892 lang=php
 *
 * [892] 三维形体的表面积
 *
 * https://leetcode-cn.com/problems/surface-area-of-3d-shapes/description/
 *
 * algorithms
 * Easy (55.56%)
 * Likes:    61
 * Dislikes: 0
 * Total Accepted:    7.5K
 * Total Submissions: 12.8K
 * Testcase Example:  '[[2]]'
 *
 * 在 N * N 的网格上，我们放置一些 1 * 1 * 1  的立方体。
 * 
 * 每个值 v = grid[i][j] 表示 v 个正方体叠放在对应单元格 (i, j) 上。
 * 
 * 请你返回最终形体的表面积。
 * 
 * 
 * 
 * 
 * 
 * 
 * 示例 1：
 * 
 * 输入：[[2]]
 * 输出：10
 * 
 * 
 * 示例 2：
 * 
 * 输入：[[1,2],[3,4]]
 * 输出：34
 * 
 * 
 * 示例 3：
 * 
 * 输入：[[1,0],[0,2]]
 * 输出：16
 * 
 * 
 * 示例 4：
 * 
 * 输入：[[1,1,1],[1,0,1],[1,1,1]]
 * 输出：32
 * 
 * 
 * 示例 5：
 * 
 * 输入：[[2,2,2],[2,1,2],[2,2,2]]
 * 输出：46
 * 
 * 
 * 
 * 
 * 提示：
 * 
 * 
 * 1 <= N <= 50
 * 0 <= grid[i][j] <= 50
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
    function surfaceArea($grid)
    {
        $row = count($grid);
        if ($row == 0) return 0;
        $col = count($grid[0]);
        $count = 0;
        for ($i = 0; $i < $row; ++$i) {
            for ($j = 0; $j < $col; ++$j) {
                if ($grid[$i][$j] == 0) continue;
                $count += 2;
                $count += max($grid[$i][$j] - $grid[$i - 1][$j] ?? 0, 0);
                $count += max($grid[$i][$j] - $grid[$i + 1][$j] ?? 0, 0);
                $count += max($grid[$i][$j] - $grid[$i][$j - 1] ?? 0, 0);
                $count += max($grid[$i][$j] - $grid[$i][$j + 1] ?? 0, 0);
            }
        }

        return $count;
    }
}
// @lc code=end
$grid = [[1, 2], [3, 4]];

echo ((new Solution())->surfaceArea($grid)) . PHP_EOL;
