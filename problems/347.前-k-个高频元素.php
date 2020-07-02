<?php
/*
 * @lc app=leetcode.cn id=347 lang=php
 *
 * [347] 前 K 个高频元素
 */

// @lc code=start
class Solution
{

    /**
     * @param Integer[] $nums
     * @param Integer $k
     * @return Integer[]
     */
    function topKFrequent1($nums, $k)
    {
        $n = count($nums);
        $hash = [];
        for ($i = 0; $i < $n; ++$i) {
            if (isset($hash[$nums[$i]])) {
                $hash[$nums[$i]]++;
            } else {
                $hash[$nums[$i]] = 1;
            }
        }

        arsort($hash);
        $ans = [];
        foreach ($hash as $key => $value) {
            $ans[] = $key;
            if (count($ans) == $k) break;
        }

        return $ans;
    }

    function topKFrequent($nums, $k)
    {
        $count = array_count_values($nums);
        $pq = new SplPriorityQueue();
        foreach ($count as $num => $freq) {
            $pq->insert($num, $freq);
        }

        $ans = [];
        for ($i = 0; $i < $k; ++$i) {
            $ans[] = $pq->extract();
        }

        return $ans;
    }
}
// @lc code=end

error_reporting(E_ALL);
ini_set('display_errors', 1);

$nums = [1, 1, 1, 2, 2, 3];
$k = 2;
var_dump((new Solution())->topKFrequent($nums, $k));
