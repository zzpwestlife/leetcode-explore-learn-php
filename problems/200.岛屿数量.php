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
class Solution {

    /**
     * @param String[][] $grid
     * @return Integer
     */
    function numIslands($grid) {
        // 广度优先遍历 好理解一些
        $rows = count($grid);
        if ($rows == 0) return 0;
        $cols = count($grid[0]);
        $visited = array_fill(0, $rows, array_fill(0, $cols, false));
        $queue = new SplQueue();
    }
}
// @lc code=end

