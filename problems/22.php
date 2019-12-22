<?php

/**
 * @comment 括号生成
 * @author ZouZhipeng <zzpwestlife@gmail.com>
 * @date 2019/12/21
 * @time 21:47
 * Class Solution22
 * 给出 n 代表生成括号的对数，请你写出一个函数，使其能够生成所有可能的并且有效的括号组合。
 *
 * 例如，给出 n = 3，生成结果为：
 *
 * [
 * "((()))",
 * "(()())",
 * "(())()",
 * "()(())",
 * "()()()"
 * ]
 */
class Solution22
{
    /**
     * @param Integer $n
     * @return String[]
     */
    function generateParenthesis($n)
    {
        $result = [];
        $this->generate(0, 0, $n, $result, '');
        return $result;

    }

    /**
     * @comment 递归生成合法字符串
     * @author ZouZhipeng <zzpwestlife@gmail.com>
     * @date 2019/12/21
     * @time 22:07
     * @param $leftCount int 左括号数量
     * @param $rightCount int 右括号数量
     * @param $count int 括号对数量
     * @param $result array 结果集
     * @param $str string 当前处理的字符串
     * @return array
     */
    private function generate($leftCount, $rightCount, $count, &$result, $str)
    {
        // terminator
        if ($leftCount == $count && $rightCount == $count) {
            $result[] = $str;
            return $result;
        }

        // processor

        // drill down
        if ($leftCount < $count) {
            $this->generate($leftCount + 1, $rightCount, $count, $result, $str . '(');
        }

        if ($rightCount < $leftCount) {
            $this->generate($leftCount, $rightCount + 1, $count, $result, $str . ')');
        }
        // clean
    }
}

var_dump((new Solution22())->generateParenthesis(3));
