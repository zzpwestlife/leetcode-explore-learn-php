<?php

/**
 * Class Solution208
 * 给定 n 个非负整数 a1，a2，...，an，每个数代表坐标中的一个点 (i, ai) 。在坐标内画 n 条垂直线，垂直线 i 的两个端点分别为 (i, ai) 和 (i, 0)。找出其中的两条线，使得它们与 x 轴共同构成的容器可以容纳最多的水。
 *
 * 说明：你不能倾斜容器，且 n 的值至少为 2。
 */
class Solution11
{

    /**
     * @param Integer[] $height
     * @return Integer
     */
//    function maxArea($height)
//    {
//        if (empty($height)) {
//            return 0;
//        }
//        // 思路 1：暴力解法，枚举所有可能的情况
//        $max = 0;
//        $count = count($height);
//        for ($i = 0; $i < $count; ++$i) {
//            for ($j = $i + 1; $j < $count; ++$j) {
//                $max = max($max, $this->getArea($i, $j, $height));
//            }
//        }
//        return $max;
//    }
//
//    private function getArea(int $i, int $j, array $height): int
//    {
//        return ($j - $i) * min($height[$i], $height[$j]);
//    }

    function maxArea($height)
    {
        if (empty($height)) {
            return 0;
        }

        $max = 0;
        // 思路二，双指针法，从两侧向中间逼近，如果内部高度不如当前高度，就停止查找
        for ($i = 0, $j = count($height) - 1; $i < $j;) {
            // 哪个高度小，就从哪个方向向中间查找
            // 啰嗦一点，但是容易理解
            $area = ($j - $i) * min($height[$i], $height[$j]);
            if ($height[$i] > $height[$j]) {
                $j--;
            } else {
                $i++;
            }

            if ($area > $max) {
                $max = $area;
            }
        }
        return $max;
    }
}

$height = [1, 8, 6, 2, 5, 4, 8, 3, 7];
//$height = [1, 1];
echo (new Solution11())->maxArea($height) . PHP_EOL;