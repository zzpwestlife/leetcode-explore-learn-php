<?php
/*
 * @lc app=leetcode.cn id=1013 lang=php
 *
 * [1013] 将数组分成和相等的三个部分
 *
 * https://leetcode-cn.com/problems/partition-array-into-three-parts-with-equal-sum/description/
 *
 * algorithms
 * Easy (53.46%)
 * Likes:    29
 * Dislikes: 0
 * Total Accepted:    8.7K
 * Total Submissions: 17.5K
 * Testcase Example:  '[0,2,1,-6,6,-7,9,1,2,0,1]'
 *
 * 给你一个整数数组 A，只有可以将其划分为三个和相等的非空部分时才返回 true，否则返回 false。
 * 
 * 形式上，如果可以找出索引 i+1 < j 且满足 (A[0] + A[1] + ... + A[i] == A[i+1] + A[i+2] + ...
 * + A[j-1] == A[j] + A[j-1] + ... + A[A.length - 1]) 就可以将数组三等分。
 * 
 * 
 * 
 * 示例 1：
 * 
 * 输出：[0,2,1,-6,6,-7,9,1,2,0,1]
 * 输出：true
 * 解释：0 + 2 + 1 = -6 + 6 - 7 + 9 + 1 = 2 + 0 + 1
 * 
 * 
 * 示例 2：
 * 
 * 输入：[0,2,1,-6,6,7,9,-1,2,0,1]
 * 输出：false
 * 
 * 
 * 示例 3：
 * 
 * 输入：[3,3,6,5,-2,2,5,1,-9,4]
 * 输出：true
 * 解释：3 + 3 = 6 = 5 - 2 + 2 + 5 + 1 - 9 + 4
 * 
 * 
 * 
 * 
 * 提示：
 * 
 * 
 * 3 <= A.length <= 50000
 * -10^4 <= A[i] <= 10^4
 * 
 * 
 */

// @lc code=start
class Solution
{

    /**
     * @param Integer[] $A
     * @return Boolean
     */
    function canThreePartsEqualSum($A)
    {
        $n = count($A);
        if ($n <= 3) return false;
        $sum = array_sum($A);
        if ($sum % 3 != 0) return false;
        $part1 = 0;
        for ($i = 0; $i < $n; ++$i) {
            $part1 += $A[$i];
            if ($part1 == $sum / 3) break;
        }
        // tricky
        if ($i >= $n - 1) return false;

        $part2 = 0;
        for ($j = $i + 1; $j < $n; ++$j) {
            $part2 += $A[$j];
            if ($part2 == $sum / 3) break;
        }

        // tricky
        if ($j >= $n - 1) return false;
        return true;
    }
}
// @lc code=end
$A = [18, 12, -18, 18, -19, -1, 10, 10];
$A = [1, -1, 1, -1];
$A = [0, 2, 1, -6, 6, 7, 9, -1, 2, 0, 1];
var_dump((new Solution())->canThreePartsEqualSum($A));
