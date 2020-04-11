<?php

class Solution
{
    /**
     * @param Integer $m
     * @param Integer $n
     * @param Integer $k
     * @return Integer
     */
    function movingCount($m, $n, $k)
    {
        $visted = array_fill(0, $m, array_fill(0, $n, 0));
        $visted[0][0] = 1;
        $count = 1;
        for ($i = 0; $i < $m; ++$i) {
            for ($j = 0; $j < $n; ++$j) {
                $sum = floor($i / 10) + $i % 10 + floor($j / 10) + $j % 10;
                if ($sum > $k) continue;
                // 左上两个，递推。向右下两个方向即可
                $a = $visted[$i - 1][$j] ?? 0;
                $b = $visted[$i][$j - 1] ?? 0;
                if ($a || $b) {
                    $visted[$i][$j] = 1;
                    $count++;
                }
            }
        }

        return $count;
    }
}

error_reporting(E_ALL);
ini_set('display_errors', 1);
// expected 15
$m = 16;
$n = 8;
$k = 4;
echo (new Solution())->movingCount($m, $n, $k) . PHP_EOL;
