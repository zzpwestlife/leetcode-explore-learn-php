<?php

/**
 * Class Solution84
 * 给定 n 个非负整数，用来表示柱状图中各个柱子的高度。每个柱子彼此相邻，且宽度为 1 。
 *
 * 求在该柱状图中，能够勾勒出来的矩形的最大面积。
 */
class Solution84
{
    /**
     * @param Integer[] $heights
     * @return Integer
     */
    function largestRectangleArea1($heights)
    {
        // 暴力解法，遍历所有可能 O(n^3)
        $count = count($heights);
        $max = 0;
        for ($i = 0; $i <= $count - 1; ++$i) {
            for ($j = $i; $j <= $count - 1; ++$j) {
                $minHeight = $heights[$i];
                for ($k = $i; $k <= $j; ++$k) {
                    $minHeight = min($minHeight, $heights[$k]);
                }

                $area = $minHeight * ($j - $i + 1);
                $max = max($max, $area);
            }
        }

        return $max;
    }

    function largestRectangleArea2($heights)
    {
        // 优化后的暴力解法 O(n^2)
        $count = count($heights);
        $max = 0;
        for ($i = 0; $i <= $count - 1; ++$i) {
            // 寻找当前柱子的左右边界，从中间向两侧寻找
            $leftIndex = -1;
            $rightIndex = $count;
            for ($j = $i; $j >= 0; --$j) {
                if ($heights[$j] < $heights[$i]) {
                    $leftIndex = $j;
                    break;
                }
            }

            for ($k = $i; $k <= $count - 1; ++$k) {
                if ($heights[$k] < $heights[$i]) {
                    $rightIndex = $k;
                    break;
                }
            }

            $area = $heights[$i] * ($rightIndex - $leftIndex - 1);
            $max = max($max, $area);
        }
        return $max;
    }

    /**
     * @param Integer[] $heights
     * @return Integer
     */
    function largestRectangleArea($heights)
    {
        $count = count($heights);
        $stack = new SplStack();
        $stack->push(-1);
        $maxArea = 0;
        for ($i = 0; $i <= $count - 1; ++$i) {
            // 找到了右边界，出栈
            while ($stack->top() != -1 && $heights[$i] < $heights[$stack->top()]) {
                $maxArea = max($maxArea, $heights[$stack->pop()] * ($i - $stack->top() - 1));
            }
            $stack->push($i);
        }
        while ($stack->top() != -1) {
            // 剩下未处理的都是未找到右边界的
            $maxArea = max($maxArea, $heights[$stack->pop()] * ($count - $stack->top() - 1));
        }
        return $maxArea;
    }
}


$heights = [2, 1, 5, 6, 2, 3];
//$heights = [1, 2, 3, 4, 5];
//$heights = [1];
//$heights = [1, 1];
//$heights = [2, 3];
echo (new Solution84())->largestRectangleArea($heights) . PHP_EOL;
