<?php

/**
 * @comment 1128. 等价多米诺骨牌对的数量
 * @author ZouZhipeng <zzpwestlife@gmail.com>
 * @date 2019/12/31
 * @time 17:32
 * Class Solution1128
 * 给你一个由一些多米诺骨牌组成的列表 dominoes。
 *
 * 如果其中某一张多米诺骨牌可以通过旋转 0 度或 180 度得到另一张多米诺骨牌，我们就认为这两张牌是等价的。
 *
 * 形式上，dominoes[i] = [a, b] 和 dominoes[j] = [c, d] 等价的前提是 a==c 且 b==d，或是 a==d 且 b==c。
 *
 * 在 0 <= i < j < dominoes.length 的前提下，找出满足 dominoes[i] 和 dominoes[j] 等价的骨牌对 (i, j) 的数量。
 *
 *  
 *
 * 示例：
 *
 * 输入：dominoes = [[1,2],[2,1],[3,4],[5,6]]
 * 输出：1
 *  
 *
 * 提示：
 *
 * 1 <= dominoes.length <= 40000
 * 1 <= dominoes[i][j] <= 9
 */
class Solution1128
{
    /**
     * @param Integer[][] $dominoes
     * @return Integer
     */
    function numEquivDominoPairs($dominoes)
    {
        if (count($dominoes) <= 1) {
            return 0;
        }

        // 暴力解法
        $map = [];
        $count = 0;
        foreach ($dominoes as $item) {
            sort($item);
            $hash = $item[0] * 10 + $item[1];
            if (!isset($map[$hash])) {
                $map[$hash] = 1;
            } else {
                $map[$hash]++;
            }
        }

        foreach ($map as $value) {
            if ($value > 1) {
                $count += $value * ($value - 1) / 2;
            }
        }

        return $count;
    }

    function numEquivDominoPairs2($dominoes)
    {
        if (count($dominoes) <= 1) {
            return 0;
        }

        // 暴力解法
        $map = [];
        $count = 0;
        foreach ($dominoes as $item) {
            sort($item);
            $hash = $item[0] * 10 + $item[1];
            if (!isset($map[$hash])) {
                $map[$hash] = 1;
            } else {
                $count += $map[$hash];
                $map[$hash]++;
            }
        }

        return $count;
    }

    function numEquivDominoPairs3($dominoes)
    {
        if (count($dominoes) <= 1) {
            return 0;
        }

        // 暴力解法
        $map = [];
        $count = 0;
        foreach ($dominoes as $item) {
            sort($item);
            $hash = $item[0] * 10 + $item[1];
            if (!isset($map[$hash])) {
                $map[$hash] = 1;
            } else {
                $count += $map[$hash];
                $map[$hash]++;
            }
        }

        return $count;
    }
}

$dominoes = [[1, 2], [2, 1], [3, 4], [5, 6]];
$dominoes = [[1, 2, 3], [2, 1, 3], [3, 2, 1], [5, 6]];
$dominoes = [[2, 1], [1, 2], [1, 2], [1, 2], [2, 1], [1, 1], [1, 2], [2, 2]];
echo (new Solution1128())->numEquivDominoPairs($dominoes) . PHP_EOL;
