<?php
/*
 * @lc app=leetcode.cn id=394 lang=php
 *
 * [394] 字符串解码
 *
 * https://leetcode-cn.com/problems/decode-string/description/
 *
 * algorithms
 * Medium (51.42%)
 * Likes:    312
 * Dislikes: 0
 * Total Accepted:    34.7K
 * Total Submissions: 67.4K
 * Testcase Example:  '"3[a]2[bc]"'
 *
 * 给定一个经过编码的字符串，返回它解码后的字符串。
 * 
 * 编码规则为: k[encoded_string]，表示其中方括号内部的 encoded_string 正好重复 k 次。注意 k 保证为正整数。
 * 
 * 你可以认为输入字符串总是有效的；输入字符串中没有额外的空格，且输入的方括号总是符合格式要求的。
 * 
 * 此外，你可以认为原始数据不包含数字，所有的数字只表示重复的次数 k ，例如不会出现像 3a 或 2[4] 的输入。
 * 
 * 示例:
 * 
 * 
 * s = "3[a]2[bc]", 返回 "aaabcbc".
 * s = "3[a2[c]]", 返回 "accaccacc".
 * s = "2[abc]3[cd]ef", 返回 "abcabccdcdcdef".
 * 
 * 
 */

// @lc code=start

class Solution
{

    /**
     * @param String $s
     * @return String
     */
    function decodeString($s)
    {
        $ans = '';
        $len = strlen($s);
        if ($len <= 1) return $s;
        $multi = 0;
        $stack = new SplStack();
        for ($i = 0; $i < $len; ++$i) {
            $char = substr($s, $i, 1);
            if (ctype_alpha($char)) {
                $ans .= $char;
            } elseif (ctype_digit($char)) {
                $multi = $multi * 10 + (int) $char;
            } elseif ($char == '[') {
                $stack->push([$multi, $ans]);
                $ans = '';
                $multi = 0;
            } else {
                // 注意这两个变量的命名，不能和之前的一样，否则会导致不可预知的错误
                list($mul, $str) = $stack->pop();
                $ans = $str . str_repeat($ans, $mul);
            }
        }
        return $ans;
    }
}

// 构建辅助栈 stack， 遍历字符串 s 中每个字符 c；
// 当 c 为数字时，将数字字符转化为数字 multi，用于后续倍数计算；
// 当 c 为字母时，在 res 尾部添加 c；
// 当 c 为 [ 时，将当前 multi 和 res 入栈，并分别置空置 00：
// 记录此 [ 前的临时结果 res 至栈，用于发现对应 ] 后的拼接操作；
// 记录此 [ 前的倍数 multi 至栈，用于发现对应 ] 后，获取 multi × [...] 字符串。
// 进入到新 [ 后，res 和 multi 重新记录。
// 当 c 为 ] 时，stack 出栈，拼接字符串 res = last_res + cur_multi * res，其中:
// last_res 是上个 [ 到当前 [ 的字符串，例如 "3[a2[c]]" 中的 a；
// cur_multi是当前 [ 到 ] 内字符串的重复倍数，例如 "3[a2[c]]" 中的 2。
// 返回字符串 res。
// @lc code=end

$s = "3[a]2[bc]";
$s = '3[a2[c]]';
$s = "3[a]2[bc]";
echo (new Solution())->decodeString($s) . PHP_EOL;
