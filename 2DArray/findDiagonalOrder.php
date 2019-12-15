<?php

/**
 * Class findDiagonalOrderSolution
 * 给定一个含有 M x N 个元素的矩阵（M 行，N 列），请以对角线遍历的顺序返回这个矩阵中的所有元素，对角线遍历如下图所示。
 *
 * 示例:
 *
 * 输入:
 * [
 * [ 1, 2, 3 ],
 * [ 4, 5, 6 ],
 * [ 7, 8, 9 ]
 * ]
 *
 * 输出:  [1,2,4,7,5,3,6,8,9]
 *
 * 说明:
 *
 * 给定矩阵中的元素总数不会超过 100000 。
 */
class findDiagonalOrderSolution
{
    /**
     * @param Integer[][] $matrix
     * @return Integer[]
     */
    function findDiagonalOrder($matrix)
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
        }

        return $return;
    }
}

$arr = [[1, 2, 3], [4, 5, 6], [7, 8, 9]];

echo implode(',', (new findDiagonalOrderSolution())->findDiagonalOrder($arr)) . PHP_EOL;