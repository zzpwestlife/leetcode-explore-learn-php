<?php

/**
 * 15. 三数之和
 */
class Solution15
{
    /**
     * @param Integer[] $nums
     * @return Integer[][]
     */
    function threeSum($nums)
    {
        $length = count($nums);
        if ($length < 3) {
            return [];
        }

        sort($nums);
        if ($nums[0] > 0 || end($nums) < 0) {
            return [];
        }

        $result = [];
        for ($i = 0; $i <= $length - 3; ++$i) {
            // 去掉重复的
            if ($i > 0 && $nums[$i] == $nums[$i - 1]) {
                continue;
            }
            $left = $i + 1;
            $right = $length - 1;
            while ($left < $right) {
                $sum = $nums[$i] + $nums[$left] + $nums[$right];
                if ($sum == 0) {
                    $result[] = [$nums[$i], $nums[$left], $nums[$right]];
                    // 去掉重复的
                    while ($left < $right && $nums[$left + 1] == $nums[$left]) {
                        $left++;
                    }

                    while ($left < $right && $nums[$right - 1] == $nums[$left]) {
                        $right--;
                    }
                    $left++;
                    $right--;
                } elseif ($sum < 0) {
                    $left++;
                } else {
                    $right--;
                }
            }
        }

        return $result;
    }
}

$nums = [-1, 0, 1, 2, -1, -4];
// $nums = [-4, -2, -2, -2, 0, 1, 2, 2, 2, 3, 3, 4, 4, 6, 6];
// $nums = [1, 1, -2];
// $nums = [0, 0, 0, 0];
print_r((new Solution15())->threeSum($nums));
