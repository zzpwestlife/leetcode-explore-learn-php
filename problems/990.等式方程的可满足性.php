<?php
/*
 * @lc app=leetcode.cn id=990 lang=php
 *
 * [990] 等式方程的可满足性
 */

// @lc code=start
class Solution
{

    private $parents = [];
    /**
     * @param String[] $equations
     * @return Boolean
     */
    function equationsPossible($equations)
    {
        //初始化并差集
        for ($i = 0; $i < 26; $i++) {
            $this->parents[$i] = $i;
        }
        //等号处理
        foreach ($equations as $opr) {
            if ($opr[1] == '=') {
                $first = ord($opr[0]) - ord('a');
                $second = ord($opr[3]) - ord('a');
                $this->union($first, $second);
            }
        }
        //不不等号处理
        foreach ($equations as $opr) {
            if ($opr[1] == '!') {
                $first = ord($opr[0]) - ord('a');
                $second = ord($opr[3]) - ord('a');
                if ($this->find($first) == $this->find($second)) {
                    return false;
                }
            }
        }
        return true;
    }

    function union($x, $y)
    {
        $this->parents[$this->find($x)] = $this->find($y);
    }

    function find($index)
    {
        $parents = $this->parents;
        while ($parents[$index] != $index) {
            $parents[$index] = $parents[$parents[$index]];
            $index = $parents[$index];
        }
        return $index;
    }
}
// @lc code=end
