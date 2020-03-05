<?php
class Solution
{

    /**
     * @param Integer[] $A
     * @param Integer $m
     * @param Integer[] $B
     * @param Integer $n
     * @return NULL
     */
    function merge(&$A, $m, $B, $n)
    {
        // 指针设置为从后向前遍历，每次取两者之中的较大者放进 A 的最后面。
        $posA = $m - 1;
        $posB = $n - 1;
        while ($posA >= 0 || $posB >= 0) {
            if ($posA < 0) {
                $A[$posB] = $B[$posB];
                $posB--;
            } elseif ($posB < 0) {
                $posA--;
            } else {
                if ($A[$posA] >= $B[$posB]) {
                    $A[$posA + $posB + 1] = $A[$posA];
                    $posA--;
                } else {
                    $A[$posA + $posB + 1] = $B[$posB];
                    $posB--;
                }
            }
        }
        return $A;
    }

    function merge2(&$A, $m, $B, $n)
    {
        $C = [];
        $i = $j = 0;
        while ($i < $m || $j < $n) {
            if ($i >= $m) {
                $C[] = $B[$j];
                $j++;
            } elseif ($j >= $n) {
                $C[] = $A[$i];
                $i++;
            } elseif ($A[$i] <= $B[$j]) {
                $C[] = $A[$i];
                $i++;
            } else {
                $C[] = $B[$j];
                $j++;
            }
        }

        return $C;
    }
}

error_reporting(E_ALL);
ini_set('display_errors', 1);
$A = [1, 2, 3, 0, 0, 0];
$m = 3;
$B = [2, 5, 6];
// $B = [4, 5, 6];
$n = 3;

print_r((new Solution())->merge2($A, $m, $B, $n));
echo PHP_EOL;
