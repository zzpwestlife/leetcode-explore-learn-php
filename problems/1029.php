<?php

class Solution1029
{
    /**
     * @param Integer[][] $costs
     * @return Integer
     */
    function twoCitySchedCost($costs)
    {
        // 贪心
        // 我们这样来看这个问题，公司首先将这 2N 个人全都安排飞往 B 市，再选出 N 个人改变它们的行程，让他们飞往 A 市。
        // 如果选择改变一个人的行程，那么公司将会额外付出 price_A - price_B 的费用，这个费用可正可负。
        // 因此最优的方案是，选出 price_A - price_B 最小的 N 个人，让他们飞往 A 市，其余人飞往 B 市。
        // 算法
        // 按照 price_A - price_B 从小到大排序；
        // 将前 N 个人飞往 A 市，其余人飞往 B 市，并计算出总费用。

        $sum = 0;
        $length = count($costs);
        if ($length == 0) {
            return $sum;
        }

        // 二维数组按某一规则排序，妙啊
        usort($costs, function ($a, $b) {
            if (($a[0] - $a[1]) == ($b[0] - $b[1])) return 0;
            return (($a[0] - $a[1]) < ($b[0] - $b[1])) ? -1 : 1;
        });

        for ($i = 0; $i < $length; ++$i) {
            if ($i < $length / 2) {
                $sum += $costs[$i][0];
            } else {
                $sum += $costs[$i][1];
            }
        }

        return $sum;
    }
}

$costs = [[10, 20], [50, 60], [30, 200], [400, 50], [30, 20]];

echo (new Solution1029())->twoCitySchedCost($costs) . PHP_EOL;
