<?php

/**
 * @comment 零钱兑换
 * @author ZouZhipeng <zzpwestlife@gmail.com>
 * @date 2019/12/21
 * @time 20:19
 * Class Solution322
 * 给定不同面额的硬币 coins 和一个总金额 amount。编写一个函数来计算可以凑成总金额所需的最少的硬币个数。如果没有任何一种硬币组合能组成总金额，返回 -1。
 *
 * 示例 1:
 *
 * 输入: coins = [1, 2, 5], amount = 11
 * 输出: 3
 * 解释: 11 = 5 + 5 + 1
 * 示例 2:
 *
 * 输入: coins = [2], amount = 3
 * 输出: -1
 * 说明:
 * 你可以认为每种硬币的数量是无限的。
 */
class Solution322
{
    /**
     * @param Integer[] $coins
     * @param Integer $amount
     * @return Integer
     */
    function coinChange1($coins, $amount)
    {
        if ($amount == 0) {
            return 0;
        }

        $answer = PHP_INT_MAX;
        $map = [];
        foreach ($coins as $coin) {
            // 不可达到
            if ($amount < $coin) {
                continue;
            }

            // 终止条件
            if ($amount == $coin) {
                return 1;
            }

            if (isset($map[$amount])) {
                return $map[$amount];
            }
            $sub = $this->coinChange($coins, $amount - $coin);
            $map[$amount - $coin] = $sub;
            // 子问题无解
            if ($sub == -1) {
                continue;
            }

            $answer = min($answer, $sub + 1);
        }

        return $answer == PHP_INT_MAX ? -1 : $answer;
    }

    function coinChange($coins, $amount)
    {
        if ($amount == 0) {
            return 0;
        }

        // 初始化结果，最坏情况，都是 1
        $dp = array_fill(1, $amount, $amount + 1);
        for ($i = 1; $i <= $amount; ++$i) {
            foreach ($coins as $coin) {
                if ($coin > $i) {
                    continue;
                }

                // 状态转移方程
                $dp[$i] = min($dp[$i], $dp[$i - $coin] + 1);
            }
        }

        return $dp[$amount] > $amount ? -1 : $dp[$amount];
    }
}

$coins = [2];
$amount = 3;

$coins = [1, 2, 5];
$amount = 11;
echo (new Solution322())->coinChange($coins, $amount) . PHP_EOL;
