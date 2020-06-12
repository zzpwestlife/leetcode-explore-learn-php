<?php
/*
 * @lc app=leetcode.cn id=202 lang=php
 *
 * [202] 快乐数
 *
 * https://leetcode-cn.com/problems/happy-number/description/
 *
 * algorithms
 * Easy (56.74%)
 * Likes:    314
 * Dislikes: 0
 * Total Accepted:    65.6K
 * Total Submissions: 110.5K
 * Testcase Example:  '19'
 *
 * 编写一个算法来判断一个数 n 是不是快乐数。
 * 
 * 「快乐数」定义为：对于一个正整数，每一次将该数替换为它每个位置上的数字的平方和，然后重复这个过程直到这个数变为 1，也可能是 无限循环 但始终变不到
 * 1。如果 可以变为  1，那么这个数就是快乐数。
 * 
 * 如果 n 是快乐数就返回 True ；不是，则返回 False 。
 * 
 * 
 * 
 * 示例：
 * 
 * 输入：19
 * 输出：true
 * 解释：
 * 1^2 + 9^2 = 82
 * 8^2 + 2^2 = 68
 * 6^2 + 8^2 = 100
 * 1^2 + 0^2 + 0^2 = 1
 * 
 * 
 */

// @lc code=start
class Solution
{

    /**
     * @param Integer $n
     * @return Boolean
     */
    function isHappy1($n)
    {
        if ($n == 1) return true;
        $visited = [];
        while (true) {
            $sum = $this->getHappySum($n);
            if (in_array($sum, $visited)) return false;
            if ($sum == 1) return true;
            $visited[] = $sum;
            $n = $sum;
        }
        return false;
    }

    private function getHappySum($n)
    {
        $sum = 0;
        while ($n > 0) {
            $sum += ($n % 10) * ($n % 10);
            $n = floor($n / 10);
        }
        return $sum;
    }
    function isHappy($n)
    {
        // 快慢指针法
        $slow = $n;
        $fast = $this->getHappySum($n);
        // 至少执行一次
        while ($slow != $fast) {
            $slow = $this->getHappySum($slow);
            $fast = $this->getHappySum($this->getHappySum($fast));
        }
        return $slow == 1;
    }
}
// @lc code=end
