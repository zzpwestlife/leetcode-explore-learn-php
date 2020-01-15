<?php

/**
 * 15. 三数之和
 */
class Solution15
{
    protected $return = [];
    /**
     * @param Integer[] $nums
     * @return Integer[][]
     */
    function threeSum($nums)
    {
        $length = count($nums);
        if ($length < 3) {
            return [];
        }

        sort($nums);
        if ($nums[0] > 0 || $nums[$length - 1] < 0) {
            return $this->return;
        }

        for ($i = 0; $i < $length - 1; ++$i) {
            if ($nums[$i] > 0) {
                break;
            }
            if ($i > 0 && $nums[$i] == $nums[$i - 1]) continue;
            $left = $i + 1;
            $right = $length - 1;
            while ($left < $right && $left != $i && $right != $i) {
                if ($nums[$left] + $nums[$right] + $nums[$i] == 0) {
                    $this->return[] = [$nums[$i], $nums[$left], $nums[$right]];
                    while ($left < $length - 1 && $nums[$left + 1] == $nums[$left]) {
                        $left++;
                    }

                    while ($right > 0 && $nums[$right - 1] == $nums[$right]) {
                        $right--;
                    }
                    $left++;
                    $right--;
                } elseif ($nums[$left] + $nums[$right] + $nums[$i] < 0) {
                    $left++;
                } else {
                    $right--;
                }
            }
        }

        return $this->return;
    }

    function threeSum2($nums)
    {
        $res = array();
        $dic = array_count_values($nums);
        $pos = array();
        $neg = array();
        foreach ($dic as $key => $value) {
            if ($key > 0) $pos[] = $key;
            if ($key < 0) $neg[] = $key;
        }

        sort($neg);
        if (!empty($dic[0]) && $dic[0] >= 3) $res[] = array(0, 0, 0);
        foreach ($pos as $i) {
            foreach ($neg as $j) {
                $find = - ($j + $i);
                if (!empty($dic[$find])) {
                    if (($find == $i || $find == $j) && $dic[$find] >= 2) {
                        $res[] = array($i, $find, $j);
                    } else if ($i > $find && $find > $j) {
                        $res[] = array($i, $find, $j);
                    }
                    if ($find < $j) break;
                }
            }
        }
        return $res;
    }

    function threeSum3($nums)
    {
        $res  = []; // 结果数组
        $size = count($nums);
        // 边界判断
        if ($size < 3) return $res;
        // 对数组排序
        sort($nums);
        for ($i = 0; $i < $size; $i++) {
            // 如果最小的数字都大于0 那么三者之和肯定不会等于0 直接跳出
            if ($nums[$i] > 0) break;
            // 如果后者 等于前面的，就跳过这个，因为在$i-1的时候已经计算过了
            if ($i > 0 && $nums[$i] == $nums[$i - 1]) continue;
            // 固定一个数 $nums[$i]
            // 两个指针指向剩余的数字
            $left = $i + 1;
            $right = $size - 1;
            while ($left < $right) {
                $sum = $nums[$i] + $nums[$left] + $nums[$right];
                if ($sum == 0) {
                    $res[] = [$nums[$i], $nums[$left], $nums[$right]];
                    // 如果后面的数字也有重复
                    while ($left < $right && $nums[$left]  == $nums[$left + 1])  ++$left;
                    while ($left < $right && $nums[$right] == $nums[$right - 1]) --$right;
                    ++$left;
                    --$right;
                } else if ($sum < 0) {
                    ++$left;
                } else {
                    // $sum > 0
                    --$right;
                }
            }
        }
        return $res;
    }
}

$nums = [-1, 0, 1, 2, -1, -4];
$nums = [-4, -2, -2, -2, 0, 1, 2, 2, 2, 3, 3, 4, 4, 6, 6];
$nums = [1, 1, -2];
$nums = [0, 0, 0];
print_r((new Solution15())->threeSum($nums));
