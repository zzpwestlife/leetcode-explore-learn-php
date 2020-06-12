<?php
/*
 * @lc app=leetcode.cn id=45 lang=php
 *
 * [45] 跳跃游戏 II
 *
 * https://leetcode-cn.com/problems/jump-game-ii/description/
 *
 * algorithms
 * Hard (32.73%)
 * Likes:    491
 * Dislikes: 0
 * Total Accepted:    48.5K
 * Total Submissions: 138.8K
 * Testcase Example:  '[2,3,1,1,4]'
 *
 * 给定一个非负整数数组，你最初位于数组的第一个位置。
 * 
 * 数组中的每个元素代表你在该位置可以跳跃的最大长度。
 * 
 * 你的目标是使用最少的跳跃次数到达数组的最后一个位置。
 * 
 * 示例:
 * 
 * 输入: [2,3,1,1,4]
 * 输出: 2
 * 解释: 跳到最后一个位置的最小跳跃数是 2。
 * 从下标为 0 跳到下标为 1 的位置，跳 1 步，然后跳 3 步到达数组的最后一个位置。
 * 
 * 
 * 说明:
 * 
 * 假设你总是可以到达数组的最后一个位置。
 * 
 */

// @lc code=start
class Solution
{

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function jump($nums)
    {
        $n = count($nums);
        if ($n == 1) return 0;
        // BFS
        $queue = new SplQueue();
        $queue->enqueue(0);
        $step = 0;
        while (!$queue->isEmpty()) {
            $queueLen = $queue->count();
            for ($i = 0; $i < $queueLen; ++$i) {
                $index = $queue->dequeue();
                for ($j = 1; $j <= $nums[$index]; ++$j) {
                    if ($j + $index >= $n - 1) {
                        return ++$step;
                    }

                    $queue->enqueue($j + $index);
                }
            }
            $step++;
        }
        return $step;
    }
}
// @lc code=end
$nums = [2, 3, 1, 1, 4];
$nums = [2, 1, 1, 1, 4];
echo (new Solution())->jump($nums) . PHP_EOL;
