<?php

/**
 * Class Solution
 * 至少是其他数字两倍的最大数
 * 在一个给定的数组 nums 中，总是存在一个最大元素 。
 *
 * 查找数组中的最大元素是否至少是数组中每个其他数字的两倍。
 *
 * 如果是，则返回最大元素的索引，否则返回 -1。
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
 * nums 的长度范围在 [1, 50].
 * 每个 nums[i] 的整数范围在 [0, 100].
 */
class DominantIndexSolution
{

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    public function dominantIndex($nums)
    {
        $length = count($nums);
        for ($i = 0; $i < $length; ++$i) {
            $max = $this->getMax($nums, $i);
            if ($nums[$i] >= $max * 2) {
                return $i;
            }

        }
        return -1;
    }

    private function getMax($nums, $excludeKey)
    {
        $length = count($nums);
        $max = PHP_INT_MIN;
        for ($i = 0; $i < $length; ++$i) {
            if ($i != $excludeKey && $nums[$i] > $max) {
                $max = $nums[$i];
            }
        }
        return $max;
    }
}

$nums = [3, 6, 1, 0];
$nums = [1, 2, 3, 4];
$nums = [1];
echo (new DominantIndexSolution())->dominantIndex($nums) . PHP_EOL;