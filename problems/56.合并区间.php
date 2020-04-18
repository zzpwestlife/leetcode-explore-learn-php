<?php
/*
 * @lc app=leetcode.cn id=56 lang=php
 *
 * [56] 合并区间
 *
 * https://leetcode-cn.com/problems/merge-intervals/description/
 *
 * algorithms
 * Medium (39.94%)
 * Likes:    360
 * Dislikes: 0
 * Total Accepted:    72.8K
 * Total Submissions: 176K
 * Testcase Example:  '[[1,3],[2,6],[8,10],[15,18]]'
 *
 * 给出一个区间的集合，请合并所有重叠的区间。
 * 
 * 示例 1:
 * 
 * 输入: [[1,3],[2,6],[8,10],[15,18]]
 * 输出: [[1,6],[8,10],[15,18]]
 * 解释: 区间 [1,3] 和 [2,6] 重叠, 将它们合并为 [1,6].
 * 
 * 
 * 示例 2:
 * 
 * 输入: [[1,4],[4,5]]
 * 输出: [[1,5]]
 * 解释: 区间 [1,4] 和 [4,5] 可被视为重叠区间。
 * 
 */

// @lc code=start
class Solution {
    /**
     * @param Integer[][] $intervals
     * @return Integer[][]
     */
    function merge($intervals) {
        $n = count($intervals);
        if ($n <= 1) return $intervals;
        sort($intervals);
        $ans = [];
        $i = 0;
        $j = 0;
        $ans[$j] = $intervals[$i];
        for ($i = 1; $i < $n; ++$i) {
            $start = $intervals[$i][0];
            $end = $intervals[$i][1];
            if ($start <= $ans[$j][1]) {
                $ans[$j][1] = max($end, $ans[$j][1]);
            } else {
                $j++;
                $ans[$j] = $intervals[$i];
            }
        }
        return $ans;
    }
}
// @lc code=end

