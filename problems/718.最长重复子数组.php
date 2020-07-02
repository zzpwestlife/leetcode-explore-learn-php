<?php
/*
 * @lc app=leetcode.cn id=718 lang=php
 *
 * [718] 最长重复子数组
 */

// @lc code=start
class Solution
{

    /**
     * @param Integer[] $A
     * @param Integer[] $B
     * @return Integer
     */
    function findLength1($A, $B)
    {
        if (empty($A) || empty($B)) return [];
        $countA = count($A);
        $countB = count($B);
        // dp 数组
        $dp = array_fill(0, $countA + 1, array_fill(0, $countB + 1, 0));
        for ($i = 1; $i <= $countA; ++$i) {
            for ($j = 1; $j <= $countB; ++$j) {
                if ($A[$i - 1] == $B[$j - 1]) {
                    $dp[$i][$j] = $dp[$i - 1][$j - 1] + 1;
                }
            }
        }

        $max = 0;
        for ($i = 1; $i <= $countA; ++$i) {
            $max = max($max, max($dp[$i]));
        }
        return $max;
    }

    private function dump2DArray($array)
    {
        echo '--------------', PHP_EOL;
        foreach ($array as $item) {
            echo implode(',', $item), PHP_EOL;
        }

        echo '--------------', PHP_EOL;
    }

    function findLength($A, $B)
    {
        $countA = count($A);
        $countB = count($B);
        if ($countA == 0 || $countB == 0) return 0;
        // dp[i][j] 表示 A[0,i]  和 B[0,j] 的最长重复子数组
        $dp = array_fill(0, $countA, array_fill(0, $countB, 0));

        $max = 0;
        // base case
        if ($A[0] == $B[0]) $dp[0][0] = 1;
        // 第一列
        for ($i = 1; $i < $countA; ++$i) {
            if ($A[$i] == $B[0]) {
                $max = 1;
                $dp[$i][0] = 1;
            }
        }

        // 第一行
        for ($i = 1; $i < $countB; ++$i) {
            if ($B[$i] == $A[0]) {
                $max = 1;
                $dp[0][$i] = 1;
            }
        }

        $this->dump2DArray($dp);

        for ($i = 1; $i < $countA; ++$i) {
            for ($j = 1; $j < $countB; ++$j) {
                if ($A[$i] == $B[$j]) {
                    $dp[$i][$j] = $dp[$i - 1][$j - 1] + 1;
                    $max = max($max, $dp[$i][$j]);
                }
            }
        }

        $this->dump2DArray($dp);
        return $max;
    }
}
// @lc code=end

$A = [1, 2, 3, 2, 1];
$B = [3, 2, 1, 2, 3];
$A = [0, 0, 0, 0, 0];
$B = [0, 0, 0, 0, 0];

$A = [1, 2, 3, 2, 1];
$B = [3, 2, 1, 4, 7];

$A = [0, 0, 0, 0, 0, 0, 1, 0, 0, 0];
$B = [0, 0, 0, 0, 0, 0, 0, 1, 0, 0];
echo (new Solution())->findLength($A, $B);
