<?php
/*
 * @lc app=leetcode.cn id=1071 lang=php
 *
 * [1071] 字符串的最大公因子
 *
 * https://leetcode-cn.com/problems/greatest-common-divisor-of-strings/description/
 *
 * algorithms
 * Easy (49.17%)
 * Likes:    45
 * Dislikes: 0
 * Total Accepted:    6K
 * Total Submissions: 11.5K
 * Testcase Example:  '"ABCABC"\n"ABC"'
 *
 * 对于字符串 S 和 T，只有在 S = T + ... + T（T 与自身连接 1 次或多次）时，我们才认定 “T 能除尽 S”。
 * 
 * 返回最长字符串 X，要求满足 X 能除尽 str1 且 X 能除尽 str2。
 * 
 * 
 * 
 * 示例 1：
 * 
 * 输入：str1 = "ABCABC", str2 = "ABC"
 * 输出："ABC"
 * 
 * 
 * 示例 2：
 * 
 * 输入：str1 = "ABABAB", str2 = "ABAB"
 * 输出："AB"
 * 
 * 
 * 示例 3：
 * 
 * 输入：str1 = "LEET", str2 = "CODE"
 * 输出：""
 * 
 * 
 * 
 * 
 * 提示：
 * 
 * 
 * 1 <= str1.length <= 1000
 * 1 <= str2.length <= 1000
 * str1[i] 和 str2[i] 为大写英文字母
 * 
 * 
 */

// @lc code=start
class Solution
{

    /**
     * @param String $str1
     * @param String $str2
     * @return String
     */
    function gcdOfStrings($str1, $str2)
    {
        if (empty($str1) || empty($str2)) return '';
        if ($str1 . $str2 !== $str2 . $str1) return '';
        $xLen = $this->gcd(strlen($str1), strlen($str2));
        return substr($str1, 0, $xLen);
    }

    // 辗转相除法求最大公约数
    private function gcd($a, $b)
    {
        return $b == 0 ? $a : $this->gcd($b, $a % $b);
    }
}
// @lc code=end
