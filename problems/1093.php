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
        $max = PHP_INT_MAX;
        $avg = $median = $mode = 0;
        $sum = $totalCount = 0;
        $maxCount = [];
        for ($i = 0; $i < 256; ++$i) {
            if ($min < 0 && $count[$i] > 0) {
                $min = $i;
            }

            if ($count[$i] > 0) {
                $max = $i;
            }

            $totalCount += $count[$i];
            $sum += $i * $count[$i];
            if (empty($maxCount) || $count[$i] > key($maxCount)) {
                $maxCount = [$count[$i] => $i];
            }
        }

        if ($totalCount) {
            $avg = $sum / $totalCount;
        }

        // 中位数
        $mid1 = (int)(($totalCount + 1) / 2);
        $mid2 = $totalCount / 2 + 1;
        $currentCount = 0;
        for ($i = 0; $i < 256; ++$i) {
            if ($currentCount < $mid1 && $currentCount + $count[$i] >= $mid1) {
                $median += $i / 2;
            }
            if ($currentCount < $mid2 && $currentCount + $count[$i] >= $mid2) {
                $median += $i / 2;
            }
            $currentCount += $count[$i];
        }
        return [$min, $max, $avg, $median, end($maxCount)];
    }
}

$count = [0, 1, 3, 4, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
var_dump((new Solution1093())->sampleStats($count)) . PHP_EOL;
