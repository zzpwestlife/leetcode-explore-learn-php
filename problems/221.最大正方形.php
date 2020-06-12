<?php
/*
 * @lc app=leetcode.cn id=221 lang=php
 *
 * [221] 最大正方形
 *
 * https://leetcode-cn.com/problems/maximal-square/description/
 *
 * algorithms
 * Medium (38.64%)
 * Likes:    312
 * Dislikes: 0
 * Total Accepted:    33.8K
 * Total Submissions: 84.8K
 * Testcase Example:  '[["1","0","1","0","0"],["1","0","1","1","1"],["1","1","1","1","1"],["1","0","0","1","0"]]'
 *
 * 在一个由 0 和 1 组成的二维矩阵内，找到只包含 1 的最大正方形，并返回其面积。
 * 
 * 示例:
 * 
 * 输入: 
 * 
 * 1 0 1 0 0
 * 1 0 1 1 1
 * 1 1 1 1 1
 * 1 0 0 1 0
 * 
 * 输出: 4
 * 
 */

// @lc code=start
class Solution
{

    /**
     * @param String[][] $matrix
     * @return Integer
     */
    function maximalSquare($matrix)
    {
        $row = count($matrix);
        if ($row == 0) return 0;
        $col = count($matrix[0]);
        $dp = array_fill(0, $row, array_fill(0, $col, 0));
        for ($i = 0; $i < $col; ++$i) {
            $dp[0][$i] = $matrix[0][$i];
        }
        for ($j = 0; $j < $row; ++$j) {
            $dp[$j][0] = $matrix[$j][0];
        }
        for ($i = 1; $i < $row; ++$i) {
            for ($j = 1; $j < $col; ++$j) {
                if ($matrix[$i][$j] == 1) {
                    if ($dp[$i - 1][$j - 1] && $dp[$i - 1][$j] && $dp[$i][$j - 1]) {
                        $dp[$i][$j] = min($dp[$i - 1][$j - 1], $dp[$i - 1][$j], $dp[$i][$j - 1]) + 1;
                    } else {
                        $dp[$i][$j] = 1;
                    }
                }
            }
        }

        $max = 0;
        foreach ($dp as $row) {
            $max = max(max($row), $max);
        }
        return $max * $max;
    }
}
// @lc code=end

error_reporting(E_ALL);
ini_set('display_errors', 1);
$matrix = [
    [1, 0, 1, 0, 0],
    [1, 0, 1, 1, 1],
    [1, 1, 1, 1, 1],
    [1, 0, 0, 1, 0],
];

echo (new Solution())->maximalSquare($matrix) . PHP_EOL;
