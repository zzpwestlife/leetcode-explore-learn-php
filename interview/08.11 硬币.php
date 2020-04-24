<?php
class Solution
{

    /**
     * @param Integer $n
     * @return Integer
     */
    function waysToChange($n)
    {
        if ($n == 0) return 0;
        $nums = [1, 5, 10, 25];
        $dp = array_fill(0, $n + 1, 0);
        $dp[0] = 1;
        for ($j = 0; $j < 4; ++$j) {
            for ($i = 1; $i <= $n; ++$i) {
                if ($i >= $nums[$j]) {
                    $dp[$i] = ($dp[$i] + $dp[$i - $nums[$j]]) % 1000000007;
                }
            }
        }
        return $dp[$n];
    }
}

$n = 10;
echo (new Solution())->waysToChange($n) . PHP_EOL;
