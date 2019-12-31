<?php

/**
 * @comment 平方根
 * @author ZouZhipeng <zzpwestlife@gmail.com>
 * @date 2019/12/30
 * @time 17:56
 * Class Solution69
 * 实现 int sqrt(int x) 函数。
 *
 * 计算并返回 x 的平方根，其中 x 是非负整数。
 *
 * 由于返回类型是整数，结果只保留整数的部分，小数部分将被舍去。
 */
class Solution69
{

    /**
     * @param Integer $x
     * @return Integer
     */
    function mySqrt($x)
    {
        // 二分法
        if ($x == 0) return 0;
        $left = 1;
        $right = floor($x / 2);
        while ($left < $right) {
            // 右中位数
            $mid = $right - floor(($right - $left) / 2);
            // 注意边界条件，防止溢出
            if ($mid > $x / $mid) {
                $right = $mid - 1;
            } else {
                $left = $mid;
            }
        }
        return $left;
    }

    function mySqrt2(int $x)
    {
        // 牛顿迭代法
        $a = $x;
        while ($a * $a > $x) {
            $a = ($a + $x / $a) / 2;
        }
        return (int)$a;
    }
}

$x = 9999;
echo (new Solution69())->mySqrt($x) . PHP_EOL;
