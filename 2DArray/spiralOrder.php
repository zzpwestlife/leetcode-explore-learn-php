<?php

/**
 * @author ZouZhipeng <zzpwestlife@gmail.com>
 * @date 2019/12/12
 * @time 17:49
 * Class spiralOrderSolution
 * 螺旋矩阵
 * 给定一个包含 m x n 个元素的矩阵（m 行，n 列），请按照顺时针螺旋顺序，返回矩阵中的所有元素。
 *
 * 示例 1:
 *
 * 输入:
 * [
 * [ 1, 2, 3 ],
 * [ 4, 5, 6 ],
 * [ 7, 8, 9 ]
 * ]
 * 输出: [1,2,3,6,9,8,7,4,5]
 * 示例 2:
 *
 * 输入:
 * [
 * [1, 2, 3, 4],
 * [5, 6, 7, 8],
 * [9,10,11,12]
 * ]
 * 输出: [1,2,3,4,8,12,11,10,9,5,6,7]
 */
class spiralOrderSolution
{
    /**
     * @param Integer[][] $matrix
     * @return Integer[]
     */
    function spiralOrder($matrix)
    {
        $return = [];
        // 空数组
        if (empty($matrix)) {
            return $return;
        }

        $m = count($matrix);
        // 只有一行
        if ($m == 1) {
            return $matrix[0];
        }

        $n = count($matrix[0]);
        if ($n == 0) {
            return $return;
        }
        // 只有一列
        if ($n == 1) {
            for ($k = 0; $k < $m; $k++) {
                $return[] = $matrix[$k][0];
            }
            return $return;
        }

        $return[0] = $matrix[0][0];

        // 控制遍历方向
        $sort = true;
        $init = 0;
        for ($sum = 1; $sum <= $m + $n - 2; $sum++) {
            if ($sort) {
                for ($i = $init; $i <= $sum; $i++) {
                    if (isset($matrix[$i][$sum - $i])) {
                        $return[] = $matrix[$i][$sum - $i];
                    }
                }
                $sort = false;
            } else {
                for ($i = $init; $i <= $sum; $i++) {
                    if (isset($matrix[$sum - $i][$i])) {
                        $return[] = $matrix[$sum - $i][$i];
                    }
                }
                $sort = true;
            }

            $init++;
        }

        $return[] = $matrix[$m - 1][$n - 1];
        return $return;
    }
}