<?php

/**
 * @comment 斐波那契数
 * @author ZouZhipeng <zzpwestlife@gmail.com>
 * @date 2019/12/21
 * @time 16:31
 * Class Solution509
 */
class Solution509
{
    /**
     * @param Integer $N
     * @return Integer
     */
    function fib1($N)
    {
        // 但凡遇到需要递归的问题，最好都画出递归树，这对你分析算法的复杂度，寻找算法低效的原因都有巨大帮助。
        // 暴力解法及其优化。用一个数组存储已计算的结果，防止重复计算（自顶向下）
        $map = [0 => 0, 1 => 1, 2 => 1];
        if ($N <= 0) {
            return 0;
        }
        if (isset($map[$N])) {
            return $map[$N];
        }

        if (!isset($map[$N - 1])) {
            $map[$N - 1] = $this->fib($N - 1);
        }
        if (!isset($map[$N - 2])) {
            $map[$N - 2] = $this->fib($N - 2);
        }
        $value = $map[$N - 1] + $map[$N - 2];
        $map[$N] = $value;
        return $value;
    }

    function fib2($N)
    {
        // 自底向上的解法
        if ($N <= 0) {
            return 0;
        }

        if ($N == 1 || $N == 2) {
            return 1;
        }
        $map = [0, 1, 1];
        for ($i = 3; $i <= $N; ++$i) {
            $map[] = $map[$i - 1] + $map[$i - 2];
        }

        return end($map);
    }

    function fib3($N)
    {
        // 优化空间复杂度，只保留前面两个计算结果即可
        if ($N <= 0) {
            return 0;
        }

        $pre = $cur = $sum = 1;
        for ($i = 3; $i <= $N; ++$i) {
            $sum = $pre + $cur;
            $pre = $cur;
            $cur = $sum;
        }

        return $sum;
    }

    function fib($N)
    {
        // 取巧，题目要求 0<=$N<=30
        $fibs = [0, 1, 1, 2, 3, 5, 8, 13, 21, 34, 55, 89, 144, 233, 377, 610, 987, 1597, 2584, 4181, 6765, 10946, 17711, 28657, 46368, 75025, 121393, 196418, 317811, 514229, 832040];
        return $fibs[$N];
    }
}

$n = 10;
echo (new Solution509())->fib($n) . PHP_EOL;
