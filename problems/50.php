<?php

/**
 * @comment 注释
 * @author ZouZhipeng <zzpwestlife@gmail.com>
 * @date 2019/12/25
 * @time 09:08
 * Class Solution50
 * 实现 pow(x, n) ，即计算 x 的 n 次幂函数。
 * -100.0 < x < 100.0
 * n 是 32 位有符号整数，其数值范围是 [−231, 231 − 1] 。
 */
class Solution50
{

    /**
     * @param Float $x
     * @param Integer $n
     * @return Float
     */
    function myPow($x, $n)
    {
        if ($x == 0) {
            return 0;
        }
        if ($n < 0) {
            $x = 1 / $x;
            $n = -$n;
        }

        return $this->helper($x, $n);
    }

    function helper($x, $n)
    {
        // terminator
        if ($n == 0) {
            return 1;
        } elseif ($n == 1) {
            return $x;
        }

        // process
        // drill down
        $subResult = $this->helper($x, $n / 2);
        // merge
        if ($n % 2 == 1) {
            return $subResult * $subResult * $x;
        } else {
            return $subResult * $subResult;
        }

        // revert
    }
}

$x = 2;
$n = 10;
echo (new Solution50())->myPow($x, $n) . PHP_EOL;
