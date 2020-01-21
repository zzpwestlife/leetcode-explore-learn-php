<?php

/**
 * 949. 给定数字能组成的最大时间
 * 给定一个由 4 位数字组成的数组，返回可以设置的符合 24 小时制的最大时间。

最小的 24 小时制时间是 00:00，而最大的是 23:59。从 00:00 （午夜）开始算起，过得越久，时间越大。

以长度为 5 的字符串返回答案。如果不能确定有效时间，则返回空字符串。
 */
class Solution949
{

    /**
     * @param Integer[] $A
     * @return String
     */
    function largestTimeFromDigits($A)
    {
        sort($A);
        $return = '';
        // 暴力解法
        for ($i = 0; $i < 4; ++$i) {
            for ($j = 0; $j < 4; ++$j) {
                if ($j != $i) {
                    for ($k = 0; $k < 4; ++$k) {
                        if ($k != $i && $k != $j) {
                            // 四个数字下标之和为 6
                            $l = 6 - $i - $j - $k;
                            if ($A[$i] * 10 + $A[$j] <= 23 && $A[$k] * 10 + $A[$l] <= 59) {
                                $return = max($return, sprintf('%d%d:%d%d', $A[$i], $A[$j], $A[$k], $A[$l]));
                            }
                        }
                    }
                }
            }
        }

        return $return;
    }
}

$nums = [5, 5, 5, 5];
$nums = [0, 4, 0, 0];
$nums = [1, 9, 6, 0];
$nums = [9, 0, 7, 7];
$nums = [1, 4, 3, 2];
// $nums = [2, 0, 6, 7];

echo (new Solution949())->largestTimeFromDigits($nums) . PHP_EOL;
