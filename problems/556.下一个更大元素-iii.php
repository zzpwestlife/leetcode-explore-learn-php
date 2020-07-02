<?php
/*
 * @lc app=leetcode.cn id=556 lang=php
 *
 * [556] 下一个更大元素 III
 */

// @lc code=start
class Solution
{

    /**
     * @param Integer $n
     * @return Integer
     */
    function nextGreaterElement($n)
    {
        if ($n < 10) return -1;
        $arr = [];
        while ($n) {
            array_unshift($arr, $n % 10);
            $n = floor($n / 10);
        }

        var_dump($arr);
        // find the first reverse number
        for ($i = count($arr) - 2; $i >= 0; --$i) {
            if ($arr[$i] < $arr[$i + 1]) {
                break;
            }
        }

        if ($i < 0) return -1;
        $minGreater = PHP_INT_MAX;
        $minGreaterIndex = 0;
        // find the first greater element
        for ($j = $i + 1; $j < count($arr); ++$j) {
            if ($arr[$j] > $arr[$i]) {
                if ($arr[$j] < $minGreater) {
                    $minGreater = $arr[$j];
                    $minGreaterIndex = $j;
                }
            }
        }

        $tmp = $arr[$i];
        $arr[$i] = $arr[$minGreaterIndex];
        $arr[$minGreaterIndex] = $tmp;

        // sort [i+1, count(arr)-1]
        $left = array_slice($arr, 0, $i + 1);
        $right = array_slice($arr, $i + 1);
        sort($right);
        $arr = array_merge($left, $right);
        $ans = 0;

        for ($i = 0; $i < count($arr); ++$i) {
            if ($ans > 214748364) return -1;
            if ($ans == 214748364 && $arr[$i] > 7) return -1;
            $ans = $ans * 10 + $arr[$i];
        }

        return $ans;
    }
}
// @lc code=end

$n = 12356754;
echo (new Solution())->nextGreaterElement($n) . PHP_EOL;
