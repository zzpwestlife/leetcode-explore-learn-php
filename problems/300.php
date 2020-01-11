<?php

class Solution300
{
    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function lengthOfLIS($nums)
    {
        // 暴力解法
        return $this->helper($nums, PHP_INT_MIN, 0);
    }

    private function helper($nums, $prevValue, $curPos)
    {
        if ($curPos == count($nums)) {
            return 0;
        }

        $taken = 0;
        if ($nums[$curPos] > $prevValue) {
            $taken = 1 + $this->helper($nums, $nums[$curPos], $curPos + 1);
        }

        $noTaken = $this->helper($nums, $prevValue, $curPos + 1);
        return max($taken, $noTaken);
    }
}

$nums = [10, 9, 2, 5, 3, 7, 101, 18];
echo (new Solution300())->lengthOfLIS($nums) . PHP_EOL;
