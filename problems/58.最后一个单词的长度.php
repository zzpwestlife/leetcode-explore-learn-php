<?php
/*
 * @lc app=leetcode.cn id=58 lang=php
 *
 * [58] 最后一个单词的长度
 *
 * https://leetcode-cn.com/problems/length-of-last-word/description/
 *
 * algorithms
 * Easy (32.14%)
 * Likes:    191
 * Dislikes: 0
 * Total Accepted:    84.2K
 * Total Submissions: 255.2K
 * Testcase Example:  '"Hello World"'
 *
 * 给定一个仅包含大小写字母和空格 ' ' 的字符串 s，返回其最后一个单词的长度。如果字符串从左向右滚动显示，那么最后一个单词就是最后出现的单词。
 * 
 * 如果不存在最后一个单词，请返回 0 。
 * 
 * 说明：一个单词是指仅由字母组成、不包含任何空格字符的 最大子字符串。
 * 
 * 
 * 
 * 示例:
 * 
 * 输入: "Hello World"
 * 输出: 5
 * 
 * 
 */

// @lc code=start
class Solution
{

    /**
     * @param String $s
     * @return Integer
     */
    function lengthOfLastWord($s)
    {
        $n = strlen($s);
        if ($n == 0) return 0;
        $ans = 0;
        for ($i = $n - 1; $i >= 0; --$i) {
            $char = substr($s, $i, 1);
            if ($ans > 0 && $char == ' ') {
                break;
            }

            if ($char != ' ') $ans++;
        }

        return $ans;
    }
}
// @lc code=end
$s = 'hello  wor ld  wew';
echo (new Solution())->lengthOfLastWord($s) . PHP_EOL;
