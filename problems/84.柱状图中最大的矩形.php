<?php
/*
* @lc app=leetcode.cn id=84 lang=php
*
* [84] 柱状图中最大的矩形
*
* https://leetcode-cn.com/problems/largest-rectangle-in-histogram/description/
*
* algorithms
* Hard (38.39%)
* Likes: 432
* Dislikes: 0
* Total Accepted: 27K
* Total Submissions: 69.9K
* Testcase Example: '[2,1,5,6,2,3]'
*
* 给定 n 个非负整数，用来表示柱状图中各个柱子的高度。每个柱子彼此相邻，且宽度为 1 。
*
* 求在该柱状图中，能够勾勒出来的矩形的最大面积。
*
*
*
*
*
* 以上是柱状图的示例，其中每个柱子的宽度为 1，给定的高度为 [2,1,5,6,2,3]。
*
*
*
*
*
* 图中阴影部分为所能勾勒出的最大矩形面积，其面积为 10 个单位。
*
*
*
* 示例:
*
* 输入: [2,1,5,6,2,3]
* 输出: 10
*
*/

// @lc code=start
class Solution
{

    /**
     * @param Integer[] $heights
     * @return Integer
     */
    // TODO 多做几遍，记不住啊
    function largestRectangleArea($heights)
    {
        $len = count($heights);
        $max = 0;
        $stack = new SplStack();
        $stack->push(-1);
        for ($i = 0; $i < $len; ++$i) {
            while ($stack->top() != -1 && $heights[$stack->top()] > $heights[$i]) {
                $index = $stack->pop();
                $max = max($max, ($i - $stack->top() - 1) * $heights[$index]);
            }

            $stack->push($i);
        }

        while ($stack->top() != -1) {
            $index = $stack->pop();
            // 注意这里，不是 $len - 1
            $max = max($max, ($len - $stack->top() - 1) * $heights[$index]);
        }

        return $max;
    }
}
// @lc code=end
