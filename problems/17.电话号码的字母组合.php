<?php
/*
 * @lc app=leetcode.cn id=17 lang=php
 *
 * [17] 电话号码的字母组合
 *
 * https://leetcode-cn.com/problems/letter-combinations-of-a-phone-number/description/
 *
 * algorithms
 * Medium (52.10%)
 * Likes:    570
 * Dislikes: 0
 * Total Accepted:    75.4K
 * Total Submissions: 144K
 * Testcase Example:  '"23"'
 *
 * 给定一个仅包含数字 2-9 的字符串，返回所有它能表示的字母组合。
 * 
 * 给出数字到字母的映射如下（与电话按键相同）。注意 1 不对应任何字母。
 * 
 * 
 * 
 * 示例:
 * 
 * 输入："23"
 * 输出：["ad", "ae", "af", "bd", "be", "bf", "cd", "ce", "cf"].
 * 
 * 
 * 说明:
 * 尽管上面的答案是按字典序排列的，但是你可以任意选择答案输出的顺序。
 * 
 */

// @lc code=start
class Solution
{

    /**
     * @param String $digits
     * @return String[]
     */
    function letterCombinations($digits)
    {
        $result = [];
        if ($digits === null || strlen($digits) == 0) {
            return $result;
        }

        $map = ['', '', 'abc', 'def', 'ghi', 'jkl', 'mno', 'pqrs', 'tuv', 'wxyz'];
        // 队列解法
        $queue = new SplQueue();
        for ($i = 0; $i < strlen($digits); ++$i) {
            $num = (int) (substr($digits, $i, 1));
            if ($map[$num]) {
                $newQueue = new SplQueue();
                while ($queue->count()) {
                    

                    for ($j = 0; $j < strlen($map[$num]); ++$j) { }
                }
            }
        }
    }
}
// @lc code=end
