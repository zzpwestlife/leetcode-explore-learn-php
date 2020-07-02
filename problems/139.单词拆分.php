<?php
/*
 * @lc app=leetcode.cn id=139 lang=php
 *
 * [139] 单词拆分
 */

// @lc code=start
class Solution
{

    /**
     * @param String $s
     * @param String[] $wordDict
     * @return Boolean
     */
    function wordBreak($s, $wordDict)
    {
        $len = strlen($s);
        $dp = array_fill(0, $len + 1, false);
        $dp[0] = true;
        for ($i = 1; $i <= $len; ++$i) {
            for ($j = $i - 1; $j >= 0; --$j) {
                $word = substr($s, $j, $i - $j);
                if ($dp[$j] && in_array($word, $wordDict)) {
                    $dp[$i] = true;
                    break;
                }
            }
        }

        return end($dp);
    }
}
// @lc code=end
$s = "leetcode";
$wordDict = ["leet", "code"];
$s = 'ab';
$wordDict = ['a', 'b'];
var_dump((new Solution())->wordBreak($s, $wordDict));
