<?php

/**
 * @author ZouZhipeng <zzpwestlife@gmail.com>
 * @date 2019/12/19
 * @time 12:42
 * Class Solution747
 * 在一个给定的数组 nums 中，总是存在一个最大元素 。
 *
 * 查找数组中的最大元素是否至少是数组中每个其他数字的两倍。
 *
 * 如果是，则返回最大元素的索引，否则返回 - 1。
 *
 * 示例 1:
 *
 * 输入: nums = [3, 6, 1, 0]
 * 输出: 1
 * 解释: 6是最大的整数, 对于数组中的其他整数,
 * 6大于数组中其他元素的两倍。6的索引是1, 所以我们返回1.
 *  
 *
 * 示例 2:
 *
 * 输入: nums = [1, 2, 3, 4]
 * 输出: -1
 * 解释: 4没有超过3的两倍大, 所以我们返回 -1.
 *  
 *
 * 提示:
 *
 * nums 的长度范围在 [1, 50].
 * 每个 nums[i] 的整数范围在 [0, 100].
 */
class Solution747
{
    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function dominantIndex1($nums)
    {
        $length = count($nums);
        if ($length == 0) {
            return -1;
        } elseif ($length == 1) {
            return 0;
        }

        $maxIndex = -1;
        $max = PHP_INT_MIN;
        for ($i = 0; $i < $length; ++$i) {
            if ($nums[$i] > $max) {
                $max = $nums[$i];
                $maxIndex = $i;
            }
        }

        for ($i = 0; $i < $length; ++$i) {
            if ($i != $maxIndex && $nums[$i] * 2 > $max) {
                return -1;
            }
        }

        return $maxIndex;
    }

    function dominantIndex($nums)
    {
        // 对关联数组按照键值进行降序排序，可以保留数值键
        arsort($nums);
        if (current($nums) >= next($nums) * 2) {
            // 将内部指针指向数组中的第一个元素，并输出
            reset($nums);
            // 返回数组内部指针当前指向元素的键名
            return key($nums);
        }

        return -1;
    }
}


$nums = [3, 6, 1, 0];
$nums = [0, 0, 0, 1];
echo (new Solution747())->dominantIndex($nums) . PHP_EOL;
