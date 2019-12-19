<?php

/**
 * Class Solution1
 * 给定一个整数数组 nums 和一个目标值 target，请你在该数组中找出和为目标值的那 两个 整数，并返回他们的数组下标。
 *
 * 你可以假设每种输入只会对应一个答案。但是，你不能重复利用这个数组中同样的元素。
 *
 * 示例:
 *
 * 给定 nums = [2, 7, 11, 15], target = 9
 *
 * 因为 nums[0] + nums[1] = 2 + 7 = 9
 * 所以返回 [0, 1]
 */
class Solution1
{
    /**
     * @param Integer[] $nums
     * @param Integer $target
     * @return Integer[]
     */
    function twoSum2($nums, $target)
    {
        $length = count($nums);
        if ($length < 2) {
            return [0, 0];
        }
        // 思路 1： 暴力解法
        for ($i = 0; $i < $length; ++$i) {
            for ($j = $i + 1; $j < $length; ++$j) {
                if ($nums[$i] + $nums[$j] == $target) {
                    return [$i, $j];
                }
            }
        }
        return [0, 0];
    }

    function twoSum($nums, $target)
    {
        // 辅助数组，记录遍历到的 $nums, 键值颠倒
        $found = [];
        // foreach 效率高于 for
        foreach ($nums as $i => $v) {
            $diff = $target - $v;
            // isset 效率高于 array_key_exists
            if (isset($found[$diff])) {
                return [$found[$diff], $i];
            }

            if (!isset($found[$v])) {
                $found[$v] = $i;
            }
        }
        return $found;
    }
}

$nums = [11, 7, 2, 15];
$nums = [3, 2, 3, 4];
$target = 7;
//echo implode(',', (new Solution1())->twoSum2($nums, $target)) . PHP_EOL;
echo implode(',', (new Solution1())->twoSum($nums, $target)) . PHP_EOL;
