<?php
/*
 * @lc app=leetcode.cn id=637 lang=php
 *
 * [637] 二叉树的层平均值
 *
 * https://leetcode-cn.com/problems/average-of-levels-in-binary-tree/description/
 *
 * algorithms
 * Easy (62.42%)
 * Likes:    98
 * Dislikes: 0
 * Total Accepted:    13.6K
 * Total Submissions: 21.6K
 * Testcase Example:  '[3,9,20,15,7]'
 *
 * 给定一个非空二叉树, 返回一个由每层节点平均值组成的数组.
 * 
 * 示例 1:
 * 
 * 输入:
 * ⁠   3
 * ⁠  / \
 * ⁠ 9  20
 * ⁠   /  \
 * ⁠  15   7
 * 输出: [3, 14.5, 11]
 * 解释:
 * 第0层的平均值是 3,  第1层是 14.5, 第2层是 11. 因此返回 [3, 14.5, 11].
 * 
 * 
 * 注意：
 * 
 * 
 * 节点值的范围在32位有符号整数范围内。
 * 
 * 
 */

// @lc code=start
/**
 * Definition for a binary tree node.
 * class TreeNode {
 *     public $val = null;
 *     public $left = null;
 *     public $right = null;
 *     function __construct($value) { $this->val = $value; }
 * }
 */
/**
 * Definition for a binary tree node.
 * class TreeNode {
 *     public $val = null;
 *     public $left = null;
 *     public $right = null;
 *     function __construct($value) { $this->val = $value; }
 * }
 */
class Solution
{
    protected $result = [];
    /**
     * @param TreeNode $root
     * @return Float[]
     */
    function averageOfLevels1($root)
    {
        $result = [];
        if ($root === null) return $result;
        $queue = new SplQueue();
        $queue->enqueue($root);
        while ($count = $queue->count()) {
            $currentLevelSum = 0;
            for ($i = 0; $i < $count; ++$i) {
                $node = $queue->dequeue();
                $currentLevelSum += $node->val;
                if ($node->left !== null) {
                    $queue->enqueue($root->left);
                }
                if ($node->right !== null) {
                    $queue->enqueue($root->right);
                }
            }

            $result[] = $currentLevelSum / $count;
        }
        return $result;
    }

    function averageOfLevels($root)
    {
        if ($root === null) return $this->result;
        $this->dfs($root, 0);

        $return = [];
        foreach ($this->result as $level) {
            $return[] = array_sum($level) / count($level);
        }
        return $return;
    }

    private function dfs($node, $level)
    {
        if ($node === null) return;
        $this->result[$level][] = $node->val;
        $this->dfs($node->left, $level + 1);
        $this->dfs($node->right, $level + 1);
    }
}
// @lc code=end

error_reporting(E_ALL);
ini_set('display_errors', 1);

$root = [3, 9, 20, 15, 7];
print_r((new Solution())->averageOfLevels($root));
