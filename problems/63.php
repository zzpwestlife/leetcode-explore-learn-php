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
        // dp
        $rowCount = count($obstacleGrid);
        $columnCount = count($obstacleGrid[0]);
        $result = [];
        if ($obstacleGrid[0][0] == 1 || $obstacleGrid[$rowCount - 1][$columnCount - 1] == 1) {
            return 0;
        }

        $result[0][0] = 1;
        // the first column
        for ($i = 1; $i < $rowCount; ++$i) {
            $result[$i][0] = ($obstacleGrid[$i][0] == 1 || $result[$i - 1][0] == 0) ? 0 : 1;
        }

        // the first row
        for ($j = 1; $j < $columnCount; ++$j) {
            $result[0][$j] = ($obstacleGrid[0][$j] == 1 || $result[0][$j - 1] == 0) ? 0 : 1;
        }

        // others
        for ($i = 1; $i < $rowCount; ++$i) {
            for ($j = 1; $j < $columnCount; ++$j) {
                if ($obstacleGrid[$i][$j] == 1) {
                    $result[$i][$j] = 0;
                } else {
                    $result[$i][$j] = $result[$i - 1][$j] + $result[$i][$j - 1];
                }
            }
        }
        return $result[$rowCount - 1][$columnCount - 1];
    }
}

//$grid = [[0, 0, 0], [0, 1, 0], [0, 0, 0]];
//$grid = [[0, 1]];
//$grid = [[0, 0], [1, 1], [0, 0]];
$grid = [[0, 0, 0, 0, 0], [0, 0, 0, 0, 1], [0, 0, 0, 1, 0], [0, 0, 1, 0, 0]];
// $grid = [[0, 0, 0], [0, 1, 0], [0, 0, 0]];
$grid = [[0, 0], [0, 0]];
$grid = [[0, 1]];
$grid = [[0, 0], [1, 1], [0, 0]];
$grid = [[0, 0, 0, 0, 0], [0, 0, 0, 0, 1], [0, 0, 0, 1, 0], [0, 0, 1, 0, 0]];
$grid = [[0, 0, 0, 0, 0], [0, 0, 0, 0, 1], [0, 0, 0, 1, 0], [0, 0, 0, 0, 0]];
$grid = [[0, 0]];
$grid = [[0, 0], [1, 0]];

echo (new Solution63())->uniquePathsWithObstacles($grid) . PHP_EOL;
