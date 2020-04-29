<?php

class Solution
{
    public function binarySearch($nums, $target)
    {
        $n = count($nums);
        if ($n == 0) {
            return -1;
        }

        if ($n == 1) {
            if ($nums[0] == $target) {
                return 0;
            }
            return -1;
        }

        $left = 0;
        $right = $n - 1;
        while ($left <= $right) {
            $mid = $left + floor(($right - $left) / 2);
            if ($nums[$mid] == $target) {
                return $mid;
            }

            if ($nums[$mid] < $target) {
                // 右侧找
                $left = $mid + 1;
            } else {
                $right = $mid - 1;
            }
        }

        return -1;
    }
}

$nums = [1, 3, 5, 6, 7];
$target = 7;
echo (new Solution())->binarySearch($nums, $target) . PHP_EOL;
