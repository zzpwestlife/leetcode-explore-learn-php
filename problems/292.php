<?php

/**
 * @author ZouZhipeng <zzpwestlife@gmail.com>
 * @date 2019/12/23
 * @time 10:12
 * Class Solution292
 * 你和你的朋友，两个人一起玩 Nim 游戏：桌子上有一堆石头，每次你们轮流拿掉 1 - 3 块石头。 拿掉最后一块石头的人就是获胜者。你作为先手。
 *
 * 你们是聪明人，每一步都是最优解。 编写一个函数，来判断你是否可以在给定石头数量的情况下赢得游戏。
 *
 * 示例:
 *
 * 输入: 4
 * 输出: false
 * 解释: 如果堆中有 4 块石头，那么你永远不会赢得比赛；
 *      因为无论你拿走 1 块、2 块 还是 3 块石头，最后一块石头总是会被你的朋友拿走。
 */
class Solution292
{

    /**
     * @param Integer $n
     * @return Boolean
     */
    function canWinNim1($n)
    {
        return ($n % 4) > 0;
    }

    function canWinNim($n)
    {
        // 位运算。按位与，将把 $a 和 $b 中都为 1 的位设为 1
        // 为什么是 3？ 下面的测试结果可以给出答案
        echo "\n Bitwise AND \n";
        $values = [1, 2, 3, 4, 5, 6, 7, 8, 9];
        $format = '(%1$2d = %1$04b) = (%2$2d = %2$04b)' . ' %3$s (%4$2d = %4$04b)' . "\n";
        foreach ($values as $value) {
            $result = $value & $n;
            printf($format, $result, $value, '&', $n);
        }
        return boolval($n & 3);
    }
}

$n = 4;
var_dump((new Solution292())->canWinNim($n));
