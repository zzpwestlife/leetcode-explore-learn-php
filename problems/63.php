<?php

/**
 * @comment 63. 不同路径 II
 * @author ZouZhipeng <zzpwestlife@gmail.com>
 * @date 2020/1/5
 * @time 09:38
 * Class Solution63
 * 一个机器人位于一个 m x n 网格的左上角 （起始点在下图中标记为“Start” ）。
 *
 * 机器人每次只能向下或者向右移动一步。机器人试图达到网格的右下角（在下图中标记为“Finish”）。
 *
 * 现在考虑网格中有障碍物。那么从左上角到右下角将会有多少条不同的路径？
 */
class Solution63
{
    /**
     * @param Integer[][] $obstacleGrid
     * @return Integer
     */
    function uniquePathsWithObstacles($obstacleGrid)
    {
        // 要考虑各种边界条件
        if (empty($obstacleGrid)
            || $obstacleGrid[0][0] == 1
            || end(end($obstacleGrid)) == 1) {
            return 0;
        }

        // map 和障碍数组下标对应，防止混乱
        $rowCount = count($obstacleGrid);
        $columnCount = count($obstacleGrid[0]);
        $map = array_fill(0, $rowCount, array_fill(0, $columnCount, null));
        // 右下向左上 DP
        for ($i = $rowCount - 1; $i >= 0; --$i) {
            for ($j = $columnCount - 1; $j >= 0; --$j) {
                if ($obstacleGrid[$i][$j] == 1) {
                    $map[$i][$i] = $map[$i - 1][$j] = $map[$i][$j - 1] = 0;
                } elseif ($i == $rowCount - 1 || $j == $columnCount - 1) {
                    if (!isset($map[$i][$j])) {
                        $map[$i][$j] = 1;
                    }
                } else {

                }
            }
        }

        return $map[0][0];
    }
}

//$grid = [[0, 0, 0], [0, 1, 0], [0, 0, 0]];
//$grid = [[0, 1]];
//$grid = [[0, 0], [1, 1], [0, 0]];
$grid = [[0, 0, 0, 0, 0], [0, 0, 0, 0, 1], [0, 0, 0, 1, 0], [0, 0, 1, 0, 0]];

echo (new Solution63())->uniquePathsWithObstacles($grid) . PHP_EOL;
