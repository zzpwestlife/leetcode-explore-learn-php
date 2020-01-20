<?php

/**
 * 给定一个只包括 '('，')'，'{'，'}'，'['，']' 的字符串，判断字符串是否有效。
 *
 * 有效字符串需满足：
 *
 * 左括号必须用相同类型的右括号闭合。
 * 左括号必须以正确的顺序闭合。
 * 注意空字符串可被认为是有效字符串。
 */
class Solution20
{

    /**
     * @param String $s
     * @return Boolean
     */
    function isValid($s)
    {
        if (empty($s)) {
            return true;
        }

        $length = strlen($s);
        // 奇数个字符，必然不符合
        if ($length % 2 == 1) {
            return false;
        }
        $map = [
            '(' => ')',
            '[' => ']',
            '{' => '}',
        ];
        $stack = new SplStack();
        for ($i = 0; $i < $length; ++$i) {
            $item = substr($s, $i, 1);
            switch ($item) {
                case '[':
                case '(':
                case '{':
                    $stack->push($map[$item]);
                    // 栈的深度大于字符串长度的一半，就可以提前结束
                    if ($stack->count() > $length / 2) {
                        return false;
                    }
                    break;
                case ']':
                case ')':
                case '}':
                    if ($stack->count() && $stack->top() == $item) {
                        $stack->pop();
                        break;
                    } else {
                        return false;
                    }
                default:
                    return false;
            }
        }

        return $stack->count() == 0;
    }

    private function dump(SplStack $stack)
    {
        $str = 'top->';
        while ($stack->count()) {
            $str .= $stack->pop() . '->';
        }
        $str .= 'bottom' . PHP_EOL;
        return $str;
    }
}

$s = "()[]{}}";
var_dump((new Solution20())->isValid($s));
