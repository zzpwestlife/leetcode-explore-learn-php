<?php
/*
 * @lc app=leetcode.cn id=1160 lang=php
 *
 * [1160] 拼写单词
 *
 * https://leetcode-cn.com/problems/find-words-that-can-be-formed-by-characters/description/
 *
 * algorithms
 * Easy (63.85%)
 * Likes:    32
 * Dislikes: 0
 * Total Accepted:    12.6K
 * Total Submissions: 18.8K
 * Testcase Example:  '["cat","bt","hat","tree"]\n"atach"'
 *
 * 给你一份『词汇表』（字符串数组） words 和一张『字母表』（字符串） chars。
 * 
 * 假如你可以用 chars 中的『字母』（字符）拼写出 words 中的某个『单词』（字符串），那么我们就认为你掌握了这个单词。
 * 
 * 注意：每次拼写时，chars 中的每个字母都只能用一次。
 * 
 * 返回词汇表 words 中你掌握的所有单词的 长度之和。
 * 
 * 
 * 
 * 示例 1：
 * 
 * 输入：words = ["cat","bt","hat","tree"], chars = "atach"
 * 输出：6
 * 解释： 
 * 可以形成字符串 "cat" 和 "hat"，所以答案是 3 + 3 = 6。
 * 
 * 
 * 示例 2：
 * 
 * 输入：words = ["hello","world","leetcode"], chars = "welldonehoneyr"
 * 输出：10
 * 解释：
 * 可以形成字符串 "hello" 和 "world"，所以答案是 5 + 5 = 10。
 * 
 * 
 * 
 * 
 * 提示：
 * 
 * 
 * 1 <= words.length <= 1000
 * 1 <= words[i].length, chars.length <= 100
 * 所有字符串中都仅包含小写英文字母
 * 
 * 
 */

// @lc code=start
class Solution
{

    /**
     * @param String[] $words
     * @param String $chars
     * @return Integer
     */
    function countCharacters($words, $chars)
    {
        $n = strlen($chars);
        if ($n == 0) return 0;
        $charArr = str_split($chars);
        $hash = [];
        foreach ($charArr as $char) {
            if (!isset($hash[$char])) {
                $hash[$char] = 1;
            } else {
                $hash[$char]++;
            }
        }

        $result = 0;
        foreach ($words as $word) {
            $tmp = $hash;
            $result += strlen($word);
            for ($i = 0; $i < strlen($word); ++$i) {
                $char = substr($word, $i, 1);
                if (!isset($tmp[$char]) || $tmp[$char] == 0) {
                    $result -= strlen($word);
                    break;
                }
                $tmp[$char]--;
            }
        }
        return $result;
    }
}
// @lc code=end
error_reporting(E_ALL);
ini_set('display_errors', 1);

$words = ["cat", "bt", "hat", "tree"];
$words = ["hello", "world", "leetcode"];
$chars = "atach";
$chars = "welldonehoneyr";
echo (new Solution())->countCharacters($words, $chars) . PHP_EOL;
