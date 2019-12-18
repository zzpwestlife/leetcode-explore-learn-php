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
        // 暴力解法 三重循环
        $count = count($heights);
        $max = 0;
        for ($i = 0; $i < $count; ++$i) {
            for ($j = $i; $j < $count; ++$j) {
                $minHeight = $heights[$j];
                for ($k = $i; $k <= $j; ++$k) {
                    $minHeight = min($heights[$k], $minHeight);
                }
                $area = $minHeight * ($j - $i + 1);
                $max = max($area, $max);
            }
        }

        return $max;
    }

    function largestRectangleArea2($heights)
    {
        // 优化后的暴力解法 二重循环
        $count = count($heights);
        $max = 0;
        for ($i = 0; $i < $count; ++$i) {
            // 找当前柱子的左右边界 (从当前位置向两侧找)
            $leftIndex = -1;
            $rightIndex = $count;
            for ($j = $i - 1; $j >= 0; --$j) {
                if ($heights[$j] < $heights[$i]) {
                    $leftIndex = $j;
                    break;
                }
            }

            for ($k = $i; $k < $count; ++$k) {
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

    function largestRectangleArea($heights)
    {
        // 栈
        $count = count($heights);
        $max = 0;
        $stack = new SplStack();
        $stack->push(-1);
        for ($i = 0; $i < $count; ++$i) {
//            echo 'i: ' . $i . PHP_EOL;
            while ($stack->top() != -1 && $heights[$i] < $heights[$stack->top()]) {
                $current = $stack->pop();
//                echo 'index ' . $current . ' pop out of stack' . PHP_EOL;
                $area = $heights[$current] * ($i - $stack->top() - 1);
                $max = max($area, $max);
            }

//            echo 'index ' . $i . ' push in stack' . PHP_EOL;
            $stack->push($i);
        }

        while ($stack->top() != -1) {
            $current = $stack->pop();
//            echo 'current: ' . $current . PHP_EOL;
            // 这里 宽度的计算是重点
            $area = $heights[$current] * ($count - $stack->top() - 1);
//            echo 'area: ' . $area . PHP_EOL;
            $max = max($area, $max);
        }
        return $max;
    }
}


$heights = [2, 1, 5, 6, 2, 3];
$heights = [1, 2, 3, 4, 5];
//$heights = [1];
//$heights = [1, 1];
//$heights = [2, 3];
echo (new Solution84())->largestRectangleArea($heights) . PHP_EOL;
