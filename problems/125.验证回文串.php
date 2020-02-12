<?php
/*
 * @lc app=leetcode.cn id=125 lang=php
 *
 * [125] 验证回文串
 *
 * https://leetcode-cn.com/problems/valid-palindrome/description/
 *
 * algorithms
 * Easy (42.07%)
 * Likes:    153
 * Dislikes: 0
 * Total Accepted:    76.7K
 * Total Submissions: 181.4K
 * Testcase Example:  '"A man, a plan, a canal: Panama"'
 *
 * 给定一个字符串，验证它是否是回文串，只考虑字母和数字字符，可以忽略字母的大小写。
 * 
 * 说明：本题中，我们将空字符串定义为有效的回文串。
 * 
 * 示例 1:
 * 
 * 输入: "A man, a plan, a canal: Panama"
 * 输出: true
 * 
 * 
 * 示例 2:
 * 
 * 输入: "race a car"
 * 输出: false
 * 
 * 
 */

// @lc code=start
class Solution
{

    /**
     * @param String $s
     * @return Boolean
     */
    function isPalindrome($s)
    {
        $i = 0;
        $j = strlen($s) - 1;
        while ($i < $j) {
            // 非数字和字符串跳过
            // ctype_alnum ( string $text ) : bool
            // Checks if all of the characters in the provided string, text, are alphanumeric.
            while ($i < $j && !ctype_alnum($s[$i])) $i++;
            while ($i < $j && !ctype_alnum($s[$j])) $j--;
            if (strtolower($s[$i]) != strtolower($s[$j])) return false;
            $i++;
            $j--;
        }
        return true;
    }
}
// @lc code=end
$s = "A man, a plan, a canal: Panama";
print_r((new Solution())->isPalindrome($s));
echo PHP_EOL;
