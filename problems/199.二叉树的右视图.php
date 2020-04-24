<?php
/*
 * @lc app=leetcode.cn id=199 lang=php
 *
 * [199] 二叉树的右视图
 *
 * https://leetcode-cn.com/problems/binary-tree-right-side-view/description/
 *
 * algorithms
 * Medium (62.58%)
 * Likes:    140
 * Dislikes: 0
 * Total Accepted:    18.9K
 * Total Submissions: 29.7K
 * Testcase Example:  '[1,2,3,null,5,null,4]'
 *
 * 给定一棵二叉树，想象自己站在它的右侧，按照从顶部到底部的顺序，返回从右侧所能看到的节点值。
 * 
 * 示例:
 * 
 * 输入: [1,2,3,null,5,null,4]
 * 输出: [1, 3, 4]
 * 解释:
 * 
 * ⁠  1            <---
 * ⁠/   \
 * 2     3         <---
 * ⁠\     \
 * ⁠ 5     4       <---
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
class Solution
{

    /**
     * @param TreeNode $root
     * @return Integer[]
     */
    function rightSideView($root)
    {
        if ($root === null) return [];
        $queue = new SplQueue();
        $queue->enqueue($root);
        $ans = [];
        while (!$queue->isEmpty()) {
            $count = $queue->count();
            $curRight = null;
            for ($i = 0; $i < $count; ++$i) {
                $cur = $queue->dequeue();
                $curRight = $cur->val;
                if ($cur->left !== null) {
                    $queue->enqueue($cur->left);
                }
                if ($cur->right !== null) {
                    $queue->enqueue($cur->right);
                }
            }
            $ans[] = $curRight;
        }

        return $ans;
    }
}
// @lc code=end
