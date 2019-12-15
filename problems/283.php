<?php

class Solution283
{

    /**
     * @param Integer[] $nums
     * @return NULL
     * 给定一个数组 nums，编写一个函数将所有 0 移动到数组的末尾，同时保持非零元素的相对顺序。
     *
     * 示例:
     *
     * 输入: [0,1,0,3,12]
     * 输出: [1,3,12,0,0]
     * 说明:
     *
     * 必须在原数组上操作，不能拷贝额外的数组。
     * 尽量减少操作次数。
     */
    function moveZeroes(&$nums)
    {
        // 思路：遍历数组，删除 0，并统计 0 的个数，最后在数组末尾添加 0
        if (empty($nums)) {
            return $nums;
        }
        $zeroCount = 0;
        foreach ($nums as $key => $num) {
            if ($num == 0) {
                $zeroCount++;
                unset($nums[$key]);
            }
        }

//        if ($zeroCount) {
//            for ($i = 0; $i < $zeroCount; ++$i) {
//                $nums[] = 0;
//            }
//        }

        while ($zeroCount--) {
            $nums[] = 0;
        }
        return $nums;
    }

    function moveZeroes2(&$nums)
    {
        // 思路二：双指针法
        // 遍历数组，记录最左侧 0 的索引，非零元素与 0 交换
        if (empty($nums)) {
            return $nums;
        }

        $j = 0;
        $arrayCount = count($nums);
        for ($i = 0; $i < $arrayCount; ++$i) {
            if ($nums[$i] !== 0) {
                if ($i !== $j) {
                    $nums[$j] = $nums[$i];
                    $nums[$i] = 0;
                }
                $j++;
            }
        }

        return $nums;
    }
}

$nums = [0, 1, 0, 3, 12];
//echo implode(',', (new Solution283())->moveZeroes($nums)) . PHP_EOL;
echo implode(',', (new Solution283())->moveZeroes2($nums)) . PHP_EOL;