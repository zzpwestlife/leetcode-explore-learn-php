<?php

class Solution
{

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function pivotIndex($nums)
    {
        $length = count($nums);
        if ($length <= 2) {
            return -1;
        }


        for ($i = 1; $i < $length - 1; ++$i) {
            $leftSum = $rightSum = 0;
            for ($j = 0; $j < $i; ++$j) {
                $leftSum += $nums[$j];
            }

            for ($k = $length - 1; $k > $i; --$k) {
                $rightSum += $nums[$k];
            }

            if ($leftSum == $rightSum) {
                return $i;
            }
        }

        return -1;
    }
}

$nums = [1, 7, 3, 6, 5, 6];
echo (new Solution())->pivotIndex($nums) . PHP_EOL;
