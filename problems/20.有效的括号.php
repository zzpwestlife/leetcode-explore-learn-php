<?php
/*
 * @lc app=leetcode.cn id=20 lang=php
 *
 * [20] 有效的括号
 *
 * https://leetcode-cn.com/problems/valid-parentheses/description/
 *
 * algorithms
 * Easy (40.61%)
 * Likes:    1374
 * Dislikes: 0
 * Total Accepted:    199.7K
 * Total Submissions: 489.6K
 * Testcase Example:  '"()"'
 *
 * 给定一个只包括 '('，')'，'{'，'}'，'['，']' 的字符串，判断字符串是否有效。
 * 
 * 有效字符串需满足：
 * 
 * 
 * 左括号必须用相同类型的右括号闭合。
 * 左括号必须以正确的顺序闭合。
 * 
 * 
 * 注意空字符串可被认为是有效字符串。
 * 
 * 示例 1:
 * 
 * 输入: "()"
 * 输出: true
 * 
 * 
 * 示例 2:
 * 
 * 输入: "()[]{}"
 * 输出: true
 * 
 * 
 * 示例 3:
 * 
 * 输入: "(]"
 * 输出: false
 * 
 * 
 * 示例 4:
 * 
 * 输入: "([)]"
 * 输出: false
 * 
 * 
 * 示例 5:
 * 
 * 输入: "{[]}"
 * 输出: true
 * 
 */

// @lc code=start
class Solution
{

    /**
     * @param String $s
     * @return Boolean
     */
    function isValid($s)
    {
        $len = strlen($s);
        if ($len % 2 == 1) {
            return false;
        }

        $map = ['(' => ')', '[' => ']', '{' => '}'];
        $stack = new SplStack();
        for ($i = 0; $i < $len; ++$i) {
            $cur = substr($s, $i, 1);
            if (isset($map[$cur])) {
                $stack->push($map[$cur]);
                if ($stack->count() > $len / 2) {
                    return false;
                }
            } else {
                if ($stack->count() && $stack->top() == $cur) {
                    $stack->pop();
                } else {
                    return false;
                }
            }
        }

        return $stack->count() == 0;
    }
}
// @lc code=end
