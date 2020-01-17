<?php

/**
 * @comment 342. 4 的幂
 * @author ZouZhipeng <zzpwestlife@gmail.com>
 * @date 2020/1/17
 * @time 09:19
 * Class Solution342
 * 给定一个整数 (32 位有符号整数)，请编写一个函数来判断它是否是 4 的幂次方。
 */
class Solution342
{
    /**
     * @param Integer $num
     * @return Boolean
     */
    function isPowerOfFour($num)
    {
        if ($num == 1) {
            return true;
        }
        while ($num > 1) {
            $num = $num / 4;
            if ($num == 1) {
                return true;
            }
        }

        return false;
    }
}

$num = 4;
var_dump((new Solution342())->isPowerOfFour($num));
$num = 5;
var_dump((new Solution342())->isPowerOfFour($num));
$num = 64;
var_dump((new Solution342())->isPowerOfFour($num));