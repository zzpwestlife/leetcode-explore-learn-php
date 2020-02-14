<?php
/*
 * @lc app=leetcode.cn id=49 lang=php
 *
 * [49] 字母异位词分组
 *
 * https://leetcode-cn.com/problems/group-anagrams/description/
 *
 * algorithms
 * Medium (60.26%)
 * Likes:    263
 * Dislikes: 0
 * Total Accepted:    48.8K
 * Total Submissions: 80.4K
 * Testcase Example:  '["eat","tea","tan","ate","nat","bat"]'
 *
 * 给定一个字符串数组，将字母异位词组合在一起。字母异位词指字母相同，但排列不同的字符串。
 * 
 * 示例:
 * 
 * 输入: ["eat", "tea", "tan", "ate", "nat", "bat"],
 * 输出:
 * [
 * ⁠ ["ate","eat","tea"],
 * ⁠ ["nat","tan"],
 * ⁠ ["bat"]
 * ]
 * 
 * 说明：
 * 
 * 
 * 所有输入均为小写字母。
 * 不考虑答案输出的顺序。
 * 
 * 
 */

// @lc code=start
class Solution
{

    /**
     * @param String[] $strs
     * @return String[][]
     */
    function groupAnagrams($strs)
    {
        $res = [];
        foreach ($strs as $str) {
            $tmp = $str;
            // sort() 函数是对数组进行排序，不是字符串！！！
            $tmp = str_split($tmp, 1);
            sort($tmp);
            $tmp = implode('', $tmp);
            if (!isset($res[$tmp])) {
                $res[$tmp] = [];
            }
            $res[$tmp][] = $str;
        }
        return array_values($res);
    }
}
// @lc code=end
$strs = ["eat", "tea", "tan", "ate", "nat", "bat"];
print_r((new Solution())->groupAnagrams($strs));
echo PHP_EOL;
