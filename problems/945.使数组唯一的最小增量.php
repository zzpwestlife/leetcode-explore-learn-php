<?php
/*
 * @lc app=leetcode.cn id=945 lang=php
 *
 * [945] 使数组唯一的最小增量
 *
 * https://leetcode-cn.com/problems/minimum-increment-to-make-array-unique/description/
 *
 * algorithms
 * Medium (41.70%)
 * Likes:    105
 * Dislikes: 0
 * Total Accepted:    20.2K
 * Total Submissions: 43.1K
 * Testcase Example:  '[1,2,2]'
 *
 * 给定整数数组 A，每次 move 操作将会选择任意 A[i]，并将其递增 1。
 * 
 * 返回使 A 中的每个值都是唯一的最少操作次数。
 * 
 * 示例 1:
 * 
 * 输入：[1,2,2]
 * 输出：1
 * 解释：经过一次 move 操作，数组将变为 [1, 2, 3]。
 * 
 * 示例 2:
 * 
 * 输入：[3,2,1,2,1,7]
 * 输出：6
 * 解释：经过 6 次 move 操作，数组将变为 [3, 4, 1, 2, 5, 7]。
 * 可以看出 5 次或 5 次以下的 move 操作是不能让数组的每个值唯一的。
 * 
 * 
 * 提示：
 * 
 * 
 * 0 <= A.length <= 40000
 * 0 <= A[i] < 40000
 * 
 * 
 */

// @lc code=start
class Solution
{

    /**
     * @param Integer[] $A
     * @return Integer
     */
    function minIncrementForUnique($A)
    {
        // 先排序再比较
        $a = self::quickSort($A);
        $count = count($a);
        $last = $a[0];

        $sum = 0;
        for ($i = 1; $i < $count; $i++) {
            if ($a[$i] <= $last) {
                $sum += $last + 1 - $a[$i];
                $last += 1;
            } else {
                $last = $a[$i];
            }
        }

        return $sum;
    }

    function quickSort($A)
    {
        $count = count($A);
        if ($count < 2) {
            return $A;
        }
        $mid = $A[0];
        $left = [];
        $right = [];
        foreach ($A as $k => $value) {
            if ($k == 0) {
                continue;
            }
            if ($value > $mid) {
                $right[] = $value;
            } else {
                $left[] = $value;
            }
        }

        return array_merge(self::quickSort($left), [$mid], self::quickSort($right));
    }
}
// @lc code=end
