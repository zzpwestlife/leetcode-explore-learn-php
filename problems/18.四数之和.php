<?php
/*
 * @lc app=leetcode.cn id=18 lang=php
 *
 * [18] 四数之和
 *
 * https://leetcode-cn.com/problems/4sum/description/
 *
 * algorithms
 * Medium (36.75%)
 * Likes:    371
 * Dislikes: 0
 * Total Accepted:    53.2K
 * Total Submissions: 144.2K
 * Testcase Example:  '[1,0,-1,0,-2,2]\n0'
 *
 * 给定一个包含 n 个整数的数组 nums 和一个目标值 target，判断 nums 中是否存在四个元素 a，b，c 和 d ，使得 a + b + c
 * + d 的值与 target 相等？找出所有满足条件且不重复的四元组。
 * 
 * 注意：
 * 
 * 答案中不可以包含重复的四元组。
 * 
 * 示例：
 * 
 * 给定数组 nums = [1, 0, -1, 0, -2, 2]，和 target = 0。
 * 
 * 满足要求的四元组集合为：
 * [
 * ⁠ [-1,  0, 0, 1],
 * ⁠ [-2, -1, 1, 2],
 * ⁠ [-2,  0, 0, 2]
 * ]
 * 
 * 
 */

// @lc code=start
class Solution
{

    /**
     * @param Integer[] $nums
     * @param Integer $target
     * @return Integer[][]
     */
    function fourSum1($nums, $target)
    {
        sort($nums);
        $ans = [];
        $len = count($nums);
        for ($i = 0; $i < $len - 3; ++$i) {
            $arr = array_slice($nums, $i + 1);
            $threeSum = $this->threeSum($arr, $target - $nums[$i]);
            if ($threeSum) {
                foreach ($threeSum as $val) {
                    array_unshift($val, $nums[$i]);
                    $ans[implode(',', $val)] = $val;
                }
            }
        }

        return array_values($ans);
    }
    private function threeSum($nums, $target)
    {
        $ans = [];
        $len = count($nums);
        for ($i = 0; $i < $len - 2; ++$i) {
            $left = $i + 1;
            $right = $len - 1;
            while ($left < $right) {
                $sum = $nums[$i] + $nums[$left] + $nums[$right];
                if ($sum == $target) {
                    $key = sprintf('%d_%d_%d', $nums[$i], $nums[$left], $nums[$right]);
                    $ans[$key] = [$nums[$i], $nums[$left], $nums[$right]];
                    $left++;
                    $right--;
                } elseif ($sum < $target) {
                    while ($left < $right && $nums[$left + 1] == $nums[$left]) {
                        $left++;
                    }
                    $left++;
                } else {
                    while ($left < $right && $nums[$right - 1] == $nums[$right]) {
                        $right--;
                    }
                    $right--;
                }
            }
        }
        return array_values($ans);
    }

    function fourSum($nums, $target)
    {
        $n = count($nums);
        $ans = [];
        if ($n < 4) return $ans;
        sort($nums);
        for ($i = 0; $i < $n - 3; ++$i) {
            // if ($nums[$i] + 3 * $nums[$i + 1] > $target) return $ans;
            // if ($i > 0 && $nums[$i + 1] == $nums[$i]) continue;
            for ($j = $i + 1; $j < $n - 2; ++$j) {
                // if ($nums[$i] + $nums[$j] + 2 * $nums[$j + 1] > $target) return $ans;
                // if ($j > $i + 1 && $nums[$j + 1] == $nums[$j]) continue;
                $left = $j + 1;
                $right = $n - 1;
                while ($left < $right) {
                    // echo sprintf('i=%d, j=%d, left=%d, right=%d', $i, $j, $left, $right) . PHP_EOL;
                    $diff3 = $nums[$i] + $nums[$j] + $nums[$left] + $nums[$right] - $target;
                    if ($diff3 == 0) {
                        $ans[] = [$nums[$i], $nums[$j], $nums[$left], $nums[$right]];
                        while ($left < $right && $nums[$left + 1] == $nums[$left]) $left++;
                        while ($left < $right && $nums[$right - 1] == $nums[$right]) $right--;
                        $left++;
                        $right--;
                    } elseif ($diff3 < 0) {
                        $left++;
                    } else {
                        $right--;
                    }
                }
            }
        }
        return $ans;
    }
}
// @lc code=end

error_reporting(E_ALL);
ini_set('display_errors', 1);
$nums = [-1, -5, -5, -3, 2, 5, 0, 4];
$target = -7;
$nums = [1, 0, -1, 0, -2, 2];
$target = 0;
$nums = [-3, -2, -1, 0, 0, 1, 2, 3];

$nums = [-1, 0, 1, 2, -1, -4];
$target = -1;
print_r((new Solution())->fourSum($nums, $target));
