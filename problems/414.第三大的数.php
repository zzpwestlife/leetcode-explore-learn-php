<?php
/*
 * @lc app=leetcode.cn id=414 lang=php
 *
 * [414] 第三大的数
 */

// @lc code=start
class Solution
{

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function thirdMax($nums)
    {
        $n = count($nums);
        if ($n < 3) return max($nums);
        $hash = [];
        $heap = new SplMaxHeap();
        foreach ($nums as $num) {
            if (isset($hash[$num])) continue;
            $hash[$num] = true;
            $heap->insert($num);
        }

        // $this->dumpHeap($heap);
        if ($heap->count() >= 3) {
            $i = 0;
            while ($heap->valid()) {
                if ($i == 2) {
                    return $heap->current();
                }
                $heap->next();
                $i++;
            }
        }
        return $heap->top();
    }

    public function dumpHeap($heap)
    {
        while ($heap->valid()) {
            echo $heap->current(), PHP_EOL;
            $heap->next();
        }
    }
}
// @lc code=end
$nums = [3, 2, 1];
$nums = [1, 2, 2, 5, 3, 5];

echo (new Solution())->thirdMax($nums), PHP_EOL;
