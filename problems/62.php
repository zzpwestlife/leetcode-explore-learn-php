<?php

/**
 * @comment 62. 不同路径
 * @author ZouZhipeng <zzpwestlife@gmail.com>
 * @date 2020/1/5
 * @time 09:38
 * Class Solution62
 * 一个机器人位于一个 m x n 网格的左上角 （起始点在下图中标记为“Start” ）。
 *
 * 机器人每次只能向下或者向右移动一步。机器人试图达到网格的右下角（在下图中标记为“Finish”）。
 *
 * 问总共有多少条不同的路径？
 */
class Solution62
{
    /**
     * @param Integer $m
     * @param Integer $n
     * @return Integer
     */
    function uniquePaths1($m, $n)
    {
        if ($m <= 0 || $n <= 0) {
            return 0;
        }

        // array fill 填充二维数组
        $map = array_fill(0, $m, array_fill(0, $n, 1));
        // DP
        for ($i = $m - 1; $i >= 0; --$i) {
            for ($j = $n - 1; $j >= 0; --$j) {
                if ($i != $m - 1 && $j != $n - 1) {
                    $map[$i][$j] = $map[$i + 1][$j] + $map[$i][$j + 1];
                }
            }
        }

        return $map[0][0];
    }

    function uniquePaths($m, $n)
    {
        $arr = [];
        for ($i = 1; $i <= $m; $i++) {
            for ($j = 1; $j <= $n; $j++) {
                if ($i == 1 || $j == 1) {
                    $arr[$i][$j] = 1;
                } else {
                    $arr[$i][$j] = $arr[$i - 1][$j] + $arr[$i][$j - 1];
                }
            }
        }
        return $arr[$m][$n];
    }
}

$m = 3;
$n = 2;
echo (new Solution62())->uniquePaths($m, $n) . PHP_EOL;
