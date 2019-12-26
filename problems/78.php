<?php

/**
 * @comment 子集
 * @author ZouZhipeng <zzpwestlife@gmail.com>
 * @date 2019/12/26
 * @time 08:45
 * Class Solution78
 * 给定一组不含重复元素的整数数组 nums，返回该数组所有可能的子集（幂集）。
 * 说明：解集不能包含重复的子集。
 */
class Solution78
{
    /**
     * @param Integer[] $nums
     * @return Integer[][]
     */
    function subsets1($nums)
    {
        // 1. 迭代法
        $result = [[]];
        foreach ($nums as $num) {
            foreach ($result as $item) {
                $tmp = $item;
                $tmp[] = $num;
                $result[] = $tmp;
            }
        }

        return $result;
    }

    function subsets($nums)
    {
        if (empty($nums)) {
            return [];
        }

        $result = [];
        // 2. 递归回溯法
        $this->helper($nums, 0, [], $result);
        return $result;
    }

    function helper($nums, $index, $current, &$result)
    {
        // terminator
        if ($index == count($nums)) {
            $result[] = $current;
            return;
        }

        // split and drill down
        // 不选 not pick the number in this index
        $tmp = $current;
        $this->helper($nums, $index + 1, $tmp, $result);
        // 选
        $tmp[] = $nums[$index];
        $this->helper($nums, $index + 1, $tmp, $result);

        // merge
//        $result[] = $current;
        // revert
    }
}

$nums = [1, 2, 3];
$result = (new Solution78())->subsets($nums);
print_r($result);