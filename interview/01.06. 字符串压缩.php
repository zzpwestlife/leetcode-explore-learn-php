<?php

class Solution
{

    /**
     * @param String $s
     * @return String
     */
    function compressString1($s)
    {
        $n = strlen($s);
        if ($n <= 1) return $s;
        $arr = str_split($s);
        $stack = [];
        $return = '';
        for ($i = 0; $i < $n; ++$i) {
            if (!empty($stack) && $arr[$i] !== end($stack)) {
                $return .= end($stack) . count($stack);
                $stack = [];
            }
            $stack[] = $arr[$i];
        }

        $return .= end($stack) . count($stack);
        if (strlen($return) < strlen($s)) {
            return $return;
        }

        return $s;
    }

    function compressString($s)
    {
        // 双指针法
        $n = strlen($s);
        if ($n <= 1) return $s;
        $arr = str_split($s);
        $left = 0;
        $stack = [];
        $return = '';
        while ($left < $n) {
            $right = $left;
            while ($right < $n && $s[$right] == $s[$left]) {
                $right++;
            }
            $return .= $s[$left] . ($right - $left);
            $left = $right;
        }

        if (strlen($return) < strlen($s)) {
            return $return;
        }

        return $s;
    }
}

$s = 'aabcccccaaa';
echo (new Solution())->compressString($s) . PHP_EOL;
