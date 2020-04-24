<?php
/*
 * @lc app=leetcode.cn id=387 lang=php
 *
 * [387] 字符串中的第一个唯一字符
 *
 * https://leetcode-cn.com/problems/first-unique-character-in-a-string/description/
 *
 * algorithms
 * Easy (42.78%)
 * Likes:    204
 * Dislikes: 0
 * Total Accepted:    72.8K
 * Total Submissions: 163.3K
 * Testcase Example:  '"leetcode"'
 *
 * 给定一个字符串，找到它的第一个不重复的字符，并返回它的索引。如果不存在，则返回 -1。
 * 
 * 案例:
 * 
 * 
 * s = "leetcode"
 * 返回 0.
 * 
 * s = "loveleetcode",
 * 返回 2.
 * 
 * 
 * 
 * 
 * 注意事项：您可以假定该字符串只包含小写字母。
 * 
 */

// @lc code=start
class Solution
{
    /**
     * @param String $s
     * @return Integer
     */
    function firstUniqChar($s)
    {
        $n = strlen($s);
        if ($n == 0) return -1;
        $hash = [];
        for ($i = 0; $i < $n; ++$i) {
            $hash[substr($s, $i, 1)][] = $i;
        }

        foreach ($hash as $v) {
            if (count($v) == 1) return reset($v);
        }

        return -1;
    }
}
// @lc code=end
$s = 'leetcode';
$s = 'loveleetcode';
echo (new Solution())->firstUniqChar($s) . PHP_EOL;
