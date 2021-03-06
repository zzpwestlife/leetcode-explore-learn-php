<?php

/**
 * @author ZouZhipeng <zzpwestlife@gmail.com>
 * @date 2019/12/19
 * @time 16:11
 * Class Solution66
 * 给定一个由整数组成的非空数组所表示的非负整数，在该数的基础上加一。
 *
 * 最高位数字存放在数组的首位， 数组中每个元素只存储单个数字。
 *
 * 你可以假设除了整数 0 之外，这个整数不会以零开头。
 *
 * 示例 1:
 *
 * 输入: [1,2,3]
 * 输出: [1,2,4]
 * 解释: 输入数组表示数字 123。
 * 示例 2:
 *
 * 输入: [4,3,2,1]
 * 输出: [4,3,2,2]
 * 解释: 输入数组表示数字 4321。
 */
class Solution66
{
    /**
     * @param Integer[] $digits
     * @return Integer[]
     */
    function plusOne($digits)
    {
        $length = count($digits);
        $digits[$length - 1] += 1;
        for ($i = $length - 1; $i > 0; --$i) {
            if ($digits[$i] >= 10) {
                $digits[$i] -= 10;
                $digits[$i - 1] += 1;
            }
        }

        if ($digits[0] >= 10) {
            $digits[0] -= 10;
            array_unshift($digits, 1);
        }
        return $digits;
    }
}


$nums = [1, 2, 3];
$nums = [0, 9, 9];
$nums = [0, 9, 2];
$nums = [9, 9];
echo implode(',', (new Solution66())->plusOne($nums)) . PHP_EOL;
