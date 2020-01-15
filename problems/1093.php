<?php

/**
 * 1093. 大样本统计
 * 我们对 0 到 255 之间的整数进行采样，并将结果存储在数组 count 中：count[k] 就是整数 k 的采样个数。

    我们以 浮点数 数组的形式，分别返回样本的最小值、最大值、平均值、中位数和众数。其中，众数是保证唯一的。

    我们先来回顾一下中位数的知识：

    如果样本中的元素有序，并且元素数量为奇数时，中位数为最中间的那个元素；
    如果样本中的元素有序，并且元素数量为偶数时，中位数为中间的两个元素的平均值。
 */
class Solution1093

{
    /**
     * @param Integer[] $count
     * @return Float[]
     */
    function sampleStats($count)
    {
        $min = -1;
        $max = $sum = $totalCount = $avg = $median = 0;
        $mode = [];
        for ($i = 0; $i < 256; ++$i) {
            if ($min < 0 && $count[$i]) {
                $min = $i;
            }

            if ($count[$i]) {
                $max = $i;
                if (empty($mode) || $count[$i] > end($mode)) {
                    $mode = [$i => $count[$i]];
                }
            }

            $totalCount += $count[$i];
            $sum += $i * $count[$i];
        }

        if ($totalCount) {
            $avg = $sum / $totalCount;
        }

        // 中位数
        $m1 = floor(($totalCount + 1) / 2);
        $m2 = floor(($totalCount) / 2 + 1);
        $currentCount = 0;
        for ($i = 0; $i < 256; ++$i) {
            if ($currentCount < $m1 && $currentCount + $count[$i] >= $m1) {
                $median += $i / 2;
            }

            if ($currentCount < $m2 && $currentCount + $count[$i] >= $m2) {
                $median += $i / 2;
            }

            $currentCount += $count[$i];
        }

        return [$min, $max, $avg, $median, key($mode)];
    }
}

$count = [0, 1, 3, 4, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
var_dump((new Solution1093())->sampleStats($count)) . PHP_EOL;
