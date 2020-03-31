<?php
/*
 * @lc app=leetcode.cn id=169 lang=php
 *
 * [169] 多数元素
 *
 * https://leetcode-cn.com/problems/majority-element/description/
 *
 * algorithms
 * Easy (61.18%)
 * Likes:    449
 * Dislikes: 0
 * Total Accepted:    111.2K
 * Total Submissions: 180.4K
 * Testcase Example:  '[3,2,3]'
 *
 * 给定一个大小为 n 的数组，找到其中的多数元素。多数元素是指在数组中出现次数大于 ⌊ n/2 ⌋ 的元素。
 * 
 * 你可以假设数组是非空的，并且给定的数组总是存在多数元素。
 * 
 * 示例 1:
 * 
 * 输入: [3,2,3]
 * 输出: 3
 * 
 * 示例 2:
 * 
 * 输入: [2,2,1,1,1,2,2]
 * 输出: 2
 * 
 * 
 */

// @lc code=start
class Solution
{

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function majorityElement1($nums)
    {
        // 内置函数
        $count = array_count_values($nums);
        return array_search(max($count), $count);
    }

    function majorityElement2($nums)
    {
        // sort
        sort($nums);
        return $nums[floor(count($nums) / 2)];
    }

    function majorityElement3($nums)
    {
        // hash table
        $hash = [];
        foreach ($nums as $num) {
            if (!isset($hash[$num])) $hash[$num] = 0;
            $hash[$num]++;
        }
        return array_search(max($hash), $hash);
    }

    function majorityElement($nums)
    {
        // Stack 开心消消乐
        $stack = [];
        foreach ($nums as $num) {
            if (empty($stack) || end($stack) == $num) {
                $stack[] = $num;
            } else {
                array_pop($stack);
            }
        }

        return end($stack);
    }
}
// @lc code=end
error_reporting(E_ALL);
ini_set('display_errors', 1);
$nums = [2, 2, 2, 2, 2, 2, 1, 1, 1, 2, 2, 1, 1, 1];
$nums = [3, 2, 3];
$nums = [3, 2, 3, 3];
// $nums = [3];
echo (new Solution())->majorityElement($nums);
