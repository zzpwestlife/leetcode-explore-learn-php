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
        // dp: f(i, j) = f(i+1, j) + f(i, j+1) 自底向上
        if ($m == 0 || $n == 0) {
            return 0;
        }

        if ($m == 1 || $n == 1) {
            return 1;
        }

        $arr[$m - 1][$n - 1] = 0;
        for ($i = $m - 1; $i >= 0; --$i) {
            for ($j = $n - 1; $j >= 0; --$j) {
                if ($i == $m - 1 || $j == $n - 1) {
                    $arr[$i][$j] = 1;
                } else {
                    $arr[$i][$j] = $arr[$i + 1][$j] + $arr[$i][$j + 1];
                }
            }
        }

        return $arr[0][0];
    }

    function uniquePaths($m, $n)
    {
        // 递归 自顶向下
        $memo = [];
        return $this->helper($m, $n, $memo);
    }

    private function helper($m, $n, &$memo)
    {
        if ($m == 0 || $n == 0) {
            return 0;
        }

        if ($m == 1 || $n == 1) {
            return 1;
        }

        // 备忘录
        if (isset($memo[$m][$n])) {
            return $memo[$m][$n];
        }

        return $this->helper($m - 1, $n, $memo) + $this->helper($m, $n - 1, $memo);
    }
}

$m = 6;
$n = 5;
echo (new Solution62())->uniquePaths($m, $n) . PHP_EOL;
