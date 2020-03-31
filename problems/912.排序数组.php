<?php
/*
 * @lc app=leetcode.cn id=912 lang=php
 *
 * [912] 排序数组
 *
 * https://leetcode-cn.com/problems/sort-an-array/description/
 *
 * algorithms
 * Medium (52.27%)
 * Likes:    60
 * Dislikes: 0
 * Total Accepted:    25.9K
 * Total Submissions: 46.9K
 * Testcase Example:  '[5,2,3,1]'
 *
 * 给定一个整数数组 nums，将该数组升序排列。
 * 
 * 
 * 
 * 
 * 
 * 
 * 示例 1：
 * 
 * 
 * 输入：[5,2,3,1]
 * 输出：[1,2,3,5]
 * 
 * 
 * 示例 2：
 * 
 * 
 * 输入：[5,1,1,2,0,0]
 * 输出：[0,0,1,1,2,5]
 * 
 * 
 * 
 * 
 * 提示：
 * 
 * 
 * 1 <= A.length <= 10000
 * -50000 <= A[i] <= 50000
 * 
 * 
 */

// @lc code=start
class Solution
{

    private function swap(&$nums, $i, $j)
    {
        echo sprintf('交换 %d 和 %d', $nums[$i], $nums[$j]) . PHP_EOL;
        $tmp = $nums[$i];
        $nums[$i] = $nums[$j];
        $nums[$j] = $tmp;
    }
    /**
     * @param Integer[] $nums
     * @return Integer[]
     */
    function bubbleSort($nums)
    {
        // 冒泡
        // 时间复杂度比较稳定不管怎样都需要 O(n^2)) 次比较，所以是 O(n^2)) 的时间复杂度。
        // 空间复杂度是 O(1)O(1)，所有操作在原来的数组完成就可以了，不需要额外的空间。
        // 算法是稳定的，在冒泡的过程中如果两个元素相等，那么他们的位置是不会交换的。
        $n = count($nums);
        if ($n <= 1) return $nums;
        // 外层循环控制内层循环中极值最终上浮到的位置
        for ($i = $n - 1; $i >= 0; --$i) {
            // 内层循环用来两两比较并交换
            for ($j = 0; $j < $i; ++$j) {
                echo sprintf('比较 %d 和 %d', $nums[$j], $nums[$j + 1]) . PHP_EOL;
                if ($nums[$j] > $nums[$j + 1]) {
                    $this->swap($nums, $j, $j + 1);
                }
            }
        }

        return $nums;
    }

    function bubbleSortOpt1($nums)
    {
        // 冒泡 改进 一：处理在排序过程中数组整体已经有序的情况
        $n = count($nums);
        if ($n <= 1) return $nums;
        // 外层循环控制内层循环中极值最终上浮到的位置
        for ($i = $n - 1; $i >= 0; --$i) {
            $isSorted = true;
            // 内层循环用来两两比较并交换
            for ($j = 0; $j < $i; ++$j) {
                echo sprintf('比较 %d 和 %d', $nums[$j], $nums[$j + 1]) . PHP_EOL;
                if ($nums[$j] > $nums[$j + 1]) {
                    $isSorted = false;
                    $this->swap($nums, $j, $j + 1);
                }
            }

            if ($isSorted) return $nums;
        }

        return $nums;
    }

    function bubbleSortOpt2($nums)
    {
        // 冒泡 改进 二：数组局部有序 最后一次交换的位置，就是无序序列与有序序列的边界
        // 在遍历过程中可以记下最后一次发生交换事件的位置，下次的内层循环就到这个位置终止，可以节约多余的比较操作.
        // 使用一个变量来保存最后一个发生了交换操作的位置，并设置为下一轮内层循环的终止位置

        // 记录这一轮循环最后一次发生交换操作的位置
        $endPos = count($nums) - 1;
        while ($endPos > 0) {
            $thisTurnEndPos = $endPos;
            for ($i = 0; $i < $thisTurnEndPos; ++$i) {
                echo sprintf('比较 %d 和 %d', $nums[$i], $nums[$i + 1]) . PHP_EOL;
                if ($nums[$i] > $nums[$i + 1]) {
                    $this->swap($nums, $i, $i + 1);
                    // 设置 (更新) 最后一次发生了交换操作的位置
                    $endPos = $i;
                }
            }

            // 若这一轮没有发生交换, 则证明数组已经有序, 直接返回即可
            if ($thisTurnEndPos == $endPos) {
                return $nums;
            }
        }

        return $nums;
    }

    function bubbleSortOpt3($nums)
    {
        // 冒泡 改进 三：同时将最大最小值归位 双向冒泡排序

        // 设置每一轮循环的开始与结束位置
        $start = 0;
        $end = count($nums) - 1;
        while ($start < $end) {
            // 从 start 位置 end 位置过一遍安排最大值的位置
            for ($i = $start; $i < $end; ++$i) {
                if ($nums[$i] > $nums[$i + 1]) {
                    $this->swap($nums, $i, $i + 1);
                }
            }
            $end--;
            // 从 end 向 start 位置过一遍, 安排最小值的位置
            for ($i = $end; $i > $start; --$i) {
                if ($nums[$i] < $nums[$i - 1]) {
                    $this->swap($nums, $i, $i - 1);
                }
            }
            $start++;
        }
        return $nums;
    }

    function bubbleSortOpt12($nums)
    {
        // 以上 1 和 2 优化的结合 处理数组局部有序和排序过程中整体有序的情况
        $endPos = count($nums) - 1;
        while ($endPos > 0) {
            $thisTurnEndPos = $endPos;
            $isSorted = true;
            for ($i = 0; $i < $thisTurnEndPos; ++$i) {
                if ($nums[$i] > $nums[$i + 1]) {
                    $this->swap($nums, $i, $i + 1);
                    $isSorted = false;
                    $endPos = $i;
                }
            }

            if ($isSorted) return $nums;
            if ($endPos == $thisTurnEndPos) return $nums;
        }

        return $nums;
    }

    function bubbleSortOpt23($nums)
    {
        // 将思想 2 和 3 结合起来，从双向同时处理最大最小值，而且处理数组局部有序的情况
        $start = $startPos = 0;
        $end = $endPos = count($nums) - 1;
        while ($start < $end) {
            // 从前向后过一遍
            for ($i = $start; $i < $end; ++$i) {
                if ($nums[$i] > $nums[$i + 1]) {
                    $this->swap($nums, $i, $i + 1);
                    // 记录这个交换位置
                    $endPos = $i;
                }
            }
            // 设置下一轮的遍历终点
            $end = $endPos;
            // 从后向前过一遍
            for ($i = $end; $i > $start; --$i) {
                if ($nums[$i] < $nums[$i - 1]) {
                    $this->swap($nums, $i, $i - 1);
                    // 记录这个交换位置
                    $startPos = $i;
                }
            }

            // 设置下一轮的遍历起点
            $start = $startPos;
        }

        return $nums;
    }

    function bubbleSortOpt123($nums)
    {
        // 同时使用以上三种思想
        $start = $startPos = 0;
        $end = $endPos = count($nums) - 1;
        while ($start < $end) {
            // 从前向后过一遍
            $isSorted = true;
            for ($i = $start; $i < $end; ++$i) {
                if ($nums[$i] > $nums[$i + 1]) {
                    $this->swap($nums, $i, $i + 1);
                    // 记录这个交换位置
                    $endPos = $i;
                    $isSorted = false;
                }
            }
            // 设置下一轮的遍历终点
            $end = $endPos;
            // 从后向前过一遍
            for ($i = $end; $i > $start; --$i) {
                if ($nums[$i] < $nums[$i - 1]) {
                    $this->swap($nums, $i, $i - 1);
                    // 记录这个交换位置
                    $startPos = $i;
                    $isSorted = false;
                }
            }

            if ($isSorted) return $nums;
            // 设置下一轮的遍历起点
            $start = $startPos;
        }

        return $nums;
    }

    function sortArray($nums)
    {
        // 计数排序
        $n = count($nums);
        if ($n <= 1) return $nums;
        $container = array_fill(0, 100001, 0);
        foreach ($nums as $num) {
            $container[$num + 50000]++;
        }

        $array = [];
        foreach ($container as $key => $count) {
            if ($count) {
                for ($i = 0; $i < $count; ++$i) {
                    $array[] = $key - 50000;
                }
            }
        }
        return $array;
    }
}
// @lc code=end
error_reporting(E_ALL);
ini_set('display_errors', 1);
$nums = [5, 2, 3, 1];
$nums = [2, 1, 0, 3, 4, 5];
// print_r((new Solution())->bubbleSort($nums));
echo '==========================================' . PHP_EOL;
// print_r((new Solution())->bubbleSortOpt1($nums));
echo '==========================================' . PHP_EOL;
// print_r((new Solution())->bubbleSortOpt2($nums));
echo '==========================================' . PHP_EOL;
// print_r((new Solution())->bubbleSortOpt3($nums));
echo '==========================================' . PHP_EOL;
print_r((new Solution())->bubbleSortOpt12($nums));
echo '==========================================' . PHP_EOL;
print_r((new Solution())->bubbleSortOpt23($nums));
echo '==========================================' . PHP_EOL;
print_r((new Solution())->bubbleSortOpt123($nums));
echo '==========================================' . PHP_EOL;
