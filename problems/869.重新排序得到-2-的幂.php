<?php
/*
 * @lc app=leetcode.cn id=869 lang=php
 *
 * [869] 重新排序得到 2 的幂
 *
 * https://leetcode-cn.com/problems/reordered-power-of-2/description/
 *
 * algorithms
 * Medium (48.01%)
 * Likes:    22
 * Dislikes: 0
 * Total Accepted:    2.4K
 * Total Submissions: 5.1K
 * Testcase Example:  '1'
 *
 * 给定正整数 N ，我们按任何顺序（包括原始顺序）将数字重新排序，注意其前导数字不能为零。
 * 
 * 如果我们可以通过上述方式得到 2 的幂，返回 true；否则，返回 false。
 * 
 * 
 * 
 * 
 * 
 * 
 * 示例 1：
 * 
 * 输入：1
 * 输出：true
 * 
 * 
 * 示例 2：
 * 
 * 输入：10
 * 输出：false
 * 
 * 
 * 示例 3：
 * 
 * 输入：16
 * 输出：true
 * 
 * 
 * 示例 4：
 * 
 * 输入：24
 * 输出：false
 * 
 * 
 * 示例 5：
 * 
 * 输入：46
 * 输出：true
 * 
 * 
 * 
 * 
 * 提示：
 * 
 * 
 * 1 <= N <= 10^9
 * 
 * 
 */

// @lc code=start
class Solution
{

    /**
     * @param Integer $n
     * @return Boolean
     */
    function reorderedPowerOf2($n)
    {
        $arr = [];
        while ($n > 9) {
            $arr[] = $n % 10;
            $n /= 10;
        }
        $arr[] = (int) $n;
        $len = count($arr);
        // 穷举
        for ($i = 0; $i < $len; ++$i) {
            $rand = rand(0, $len - 1 - $i) + $i;

        }
    }
}
// @lc code=end

echo (new Solution())->reorderedPowerOf2(123) . PHP_EOL;
