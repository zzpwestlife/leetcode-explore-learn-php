<?php
/*
 * @lc app=leetcode.cn id=922 lang=php
 *
 * [922] 按奇偶排序数组 II
 *
 * https://leetcode-cn.com/problems/sort-array-by-parity-ii/description/
 *
 * algorithms
 * Easy (66.65%)
 * Likes:    78
 * Dislikes: 0
 * Total Accepted:    23K
 * Total Submissions: 34.4K
 * Testcase Example:  '[4,2,5,7]'
 *
 * 给定一个非负整数数组 A， A 中一半整数是奇数，一半整数是偶数。
 * 
 * 对数组进行排序，以便当 A[i] 为奇数时，i 也是奇数；当 A[i] 为偶数时， i 也是偶数。
 * 
 * 你可以返回任何满足上述条件的数组作为答案。
 * 
 * 
 * 
 * 示例：
 * 
 * 输入：[4,2,5,7]
 * 输出：[4,5,2,7]
 * 解释：[4,7,2,5]，[2,5,4,7]，[2,7,4,5] 也会被接受。
 * 
 * 
 * 
 * 
 * 提示：
 * 
 * 
 * 2 <= A.length <= 20000
 * A.length % 2 == 0
 * 0 <= A[i] <= 1000
 * 
 * 
 * 
 * 
 */

// @lc code=start
class Solution
{

    /**
     * @param Integer[] $a
     * @return Integer[]
     */
    function sortArrayByParityII($a)
    {
        $count = count($a);
        if ($count == 0) {
            return [];
        }

        // 原地双指针替换， O(1) 空间复杂度
        $even = 0; // 偶数指针下标
        $odd = 1; // 奇数指针下标
        for (; $even < $count; $even += 2) {
            if ($a[$even] % 2 == 1) { // 在偶数位置找到奇数
                // 在奇数位置去找偶数，进行替换
                while ($a[$odd] % 2 == 1) {
                    $odd += 2;
                }

                $tmp = $a[$even];
                $a[$even] = $a[$odd];
                $a[$odd] = $tmp;
            }
        }

        return $a;
    }
}
// @lc code=end
