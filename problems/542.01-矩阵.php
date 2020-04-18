<?php
/*
 * @lc app=leetcode.cn id=542 lang=php
 *
 * [542] 01 矩阵
 *
 * https://leetcode-cn.com/problems/01-matrix/description/
 *
 * algorithms
 * Medium (37.46%)
 * Likes:    175
 * Dislikes: 0
 * Total Accepted:    14.7K
 * Total Submissions: 37.3K
 * Testcase Example:  '[[0,0,0],[0,1,0],[0,0,0]]'
 *
 * 给定一个由 0 和 1 组成的矩阵，找出每个元素到最近的 0 的距离。
 * 
 * 两个相邻元素间的距离为 1 。
 * 
 * 示例 1: 
 * 输入:
 * 
 * 
 * 0 0 0
 * 0 1 0
 * 0 0 0
 * 
 * 
 * 输出:
 * 
 * 
 * 0 0 0
 * 0 1 0
 * 0 0 0
 * 
 * 
 * 示例 2: 
 * 输入:
 * 
 * 
 * 0 0 0
 * 0 1 0
 * 1 1 1
 * 
 * 
 * 输出:
 * 
 * 
 * 0 0 0
 * 0 1 0
 * 1 2 1
 * 
 * 
 * 注意:
 * 
 * 
 * 给定矩阵的元素个数不超过 10000。
 * 给定矩阵中至少有一个元素是 0。
 * 矩阵中的元素只在四个方向上相邻: 上、下、左、右。
 * 
 * 
 */

// @lc code=start
class Solution
{

    /**
     * @param Integer[][] $matrix
     * @return Integer[][]
     */
    function updateMatrix($matrix)
    {
        $row = count($matrix);
        if ($row == 0) return [];
        $col = count($matrix[0]);
        $directions = [[-1, 0], [0, -1], [1, 0], [0, 1]];
        $visited = array_fill(0, $row, array_fill(0, $col, false));
        $res = array_fill(0, $row, array_fill(0, $col, 0));
        $queue = [];
        // 把所有 0 先放进队列中
        for ($i = 0; $i < $row; ++$i) {
            for ($j = 0; $j < $col; ++$j) {
                if ($matrix[$i][$j] == 0) {
                    $queue[] = [$i, $j];
                    $visited[$i][$j] = true;
                }
            }
        }

        $step = 0;
        while (!empty($queue)) {
            $count = count($queue);
            for ($k = 0; $k < $count; ++$k) {
                $one = array_shift($queue);
                $x = $one[0];
                $y = $one[1];
                if ($matrix[$x][$y] == 1) {
                    $res[$x][$y] = $step;
                }
                for ($n = 0; $n < 4; ++$n) {
                    $newX = $x + $directions[$n][0];
                    $newY = $y + $directions[$n][1];
                    if ($newX < 0 || $newX >= $row || $newY < 0 || $newY >= $col || $visited[$newX][$newY]) {
                        continue;
                    }

                    $queue[] = [$newX, $newY];
                    $visited[$newX][$newY] = true;
                }
            }
            $step++;
        }

        return $res;
    }
}
// @lc code=end
error_reporting(E_ALL);
ini_set('display_errors', 1);
$matrix = [[0, 0, 0], [0, 1, 0], [0, 0, 0]];
$matrix = [[0, 0, 0], [0, 1, 0], [1, 1, 1]];
var_dump((new Solution())->updateMatrix($matrix));
