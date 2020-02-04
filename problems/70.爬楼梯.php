<?php
/*
 * @lc app=leetcode.cn id=70 lang=php
 *
 * [70] 爬楼梯
 *
 * https://leetcode-cn.com/problems/climbing-stairs/description/
 *
 * algorithms
 * Easy (47.59%)
 * Likes:    817
 * Dislikes: 0
 * Total Accepted:    127.9K
 * Total Submissions: 268K
 * Testcase Example:  '2'
 *
 * 假设你正在爬楼梯。需要 n 阶你才能到达楼顶。
 * 
 * 每次你可以爬 1 或 2 个台阶。你有多少种不同的方法可以爬到楼顶呢？
 * 
 * 注意：给定 n 是一个正整数。
 * 
 * 示例 1：
 * 
 * 输入： 2
 * 输出： 2
 * 解释： 有两种方法可以爬到楼顶。
 * 1.  1 阶 + 1 阶
 * 2.  2 阶
 * 
 * 示例 2：
 * 
 * 输入： 3
 * 输出： 3
 * 解释： 有三种方法可以爬到楼顶。
 * 1.  1 阶 + 1 阶 + 1 阶
 * 2.  1 阶 + 2 阶
 * 3.  2 阶 + 1 阶
 * 
 * 
 */

// @lc code=start
class Solution
{

    /**
     * @param Integer $n
     * @return Integer
     */
    function climbStairs($n)
    {
        if ($n <= 2) {
            return $n;
        }

        $prev = 1;
        $cur = $result = 2;
        for ($i = 3; $i <= $n; ++$i) {
            $result = $prev + $cur;
            $prev = $cur;
            $cur = $result;
        }
        return $result;
    }
}
// @lc code=end
