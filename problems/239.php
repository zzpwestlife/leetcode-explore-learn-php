<?php

/**
 * @author ZouZhipeng <zzpwestlife@gmail.com>
 * @date 2019/12/19
 * @time 20:37
 * Class Solution239
 * 给定一个数组 nums，有一个大小为 k 的滑动窗口从数组的最左侧移动到数组的最右侧。你只可以看到在滑动窗口内的 k 个数字。滑动窗口每次只向右移动一位。
 *
 * 返回滑动窗口中的最大值。
 */
class Solution239
{
    /**
     * @param Integer[] $nums
     * @param Integer $k
     * @return Integer[]
     */
    function maxSlidingWindow1($nums, $k)
    {
        // 暴力解法
        $length = count($nums);
        if ($length == 0) {
            return [];
        }
        $result = [];
        for ($i = 0; $i <= $length - $k; ++$i) {
            $max = PHP_INT_MIN;
            for ($j = $i; $j < $i + $k; ++$j) {
                $max = max($max, $nums[$j]);
            }

            $result[] = $max;
        }

        return $result;
    }

    function maxSlidingWindow2($nums, $k)
    {
        // 使用双向队列，该数据结构可以从两端以常数时间压入 / 弹出元素
        // 双端队列和普通队列最大的不同在于，它允许我们在队列的头尾两端都能在 O(1)O(1) 的时间内进行数据的查看、添加和删除。
        $length = count($nums);
        if ($length == 0) {
            return [];
        }
        // 维护一个窗口。 完全按题意写代码
        $window = [];
        $result = [];
        for ($i = 0; $i <= $length - 1; ++$i) {
            array_push($window, $nums[$i]);
            if (count($window) < $k) {
                continue;
            }

            $result[] = max($window);
            array_shift($window);
        }

        return $result;
    }

    function maxSlidingWindow($nums, $k)
    {
        $length = count($nums);
        if ($length == 0 || $length < $k) {
            return [];
        }

        $window = $result = [];
        foreach ($nums as $key => $value) {
            // sliding
            if ($key >= $window[0] + $k) {
                array_shift($window);
            }

            while ($window && $nums[end($window)] <= $value) {
                array_pop($window);
            }

            $window[] = $key;
            if ($key >= $k - 1) {
                $result[] = $nums[$window[0]];
            }
        }

        return $result;
    }
}

$nums = [1, 3, -1, -3, 5, 3, 6, 7];
//$nums = [1, -1];
$k = 3;
echo implode(',', (new Solution239())->maxSlidingWindow($nums, $k)) . PHP_EOL;
