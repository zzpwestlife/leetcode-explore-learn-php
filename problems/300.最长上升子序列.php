<?php

class Solution
{

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function lengthOfLIS($nums)
    {
        $n = count($nums);
        if ($n <= 1) return $n;
        // dp 数组的含义，表示  [0,...,i] 子串的 LIS，所以最后返回 max(dp) 即可
        $dp = array_fill(0, $n, 1);
        for ($i = 0; $i < $n; ++$i) {
            // i 是当前下标，j 是比 i 小的所有下标
            for ($j = 0; $j < $i; ++$j) {
                if ($nums[$i] > $nums[$j]) {
                    $dp[$i] = max($dp[$i], $dp[$j] + 1);
                }
            }
        }

        return max($dp);
    }
}

$nums = [10, 9, 2, 5, 3, 7, 101, 18];
$nums = [1, 3, 6, 7, 9, 4, 10, 5, 6];
echo (new Solution())->lengthOfLIS($nums) . PHP_EOL;
