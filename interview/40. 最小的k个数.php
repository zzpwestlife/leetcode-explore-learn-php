<?php

class Solution
{

    /**
     * @param Integer[] $arr
     * @param Integer $k
     * @return Integer[]
     */
    function getLeastNumbers1($arr, $k)
    {
        $n = count($arr);
        if ($n == 0) return [];
        sort($arr);
        return array_slice($arr, 0, $k);
    }

    function getLeastNumbers($arr, $k)
    {
        // The SplPriorityQueue class provides the main functionalities of a prioritized queue, implemented using a max heap.
        $heap = new SplPriorityQueue();
        
    }
}

error_reporting(E_ALL);
ini_set('display_errors', 1);

$arr = [1, 3, 2];
$k = 2;

var_dump((new Solution())->getLeastNumbers($arr, $k));
