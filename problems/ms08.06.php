<?php

class Solution
{

    /**
     * @param Integer[] $A
     * @param Integer[] $B
     * @param Integer[] $C
     * @return NULL
     */
    function hanota($A, $B, $C)
    {
        $this->helper($A, count($A), $B, $C);
        return $C;
    }

    // 递归函数的含义：把 $A 上面 n 个圆盘通过空柱子 $B 移动到 $C
    private function helper(&$A, $n, &$B, &$C)
    {
        // 递归终止条件
        if ($n == 1) {
            $C[] = array_pop($A);
            return;
        }

        // A 上面 n - 1 个通过 C 移动到 B
        $this->helper($A, $n - 1, $C, $B);
        // A 最后一个移动到 C，此时 A 为空
        $C[] = array_pop($A);
        // B 上面 n - 1 个通过 A 移动到 C
        $this->helper($B, $n - 1, $A, $C);
    }
}

$A = [2, 1, 0];
$B = [];
$C = [];

print_r((new Solution())->hanota($A, $B, $C));
