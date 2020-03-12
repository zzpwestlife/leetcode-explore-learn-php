<?php

class Solution
{

    /**
     * @param Integer $target
     * @return Integer[][]
     */
    function findContinuousSequence($target)
    {
        $result = [];
        $small = 1;
        $big = 2;
        // 滑动窗口
        while ($small < $big && $small <= $target / 2) {
            $sum = ($small + $big) * ($big - $small + 1) / 2;
            if ($sum == $target) {
                $result[] = range($small, $big, 1);
                $small++;
                $big++;
            } elseif ($sum < $target) {
                $big++;
            } else {
                $small++;
            }
        }
        return $result;
    }
}

error_reporting(E_ALL);
ini_set('display_errors', 1);
$target = 9;

print_r((new Solution())->findContinuousSequence($target));
