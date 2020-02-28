<?php
/*
 * @lc app=leetcode.cn id=102 lang=php
 *
 * [102] 二叉树的层次遍历
 *
 * https://leetcode-cn.com/problems/binary-tree-level-order-traversal/description/
 *
 * algorithms
 * Medium (60.47%)
 * Likes:    388
 * Dislikes: 0
 * Total Accepted:    80.6K
 * Total Submissions: 132.3K
 * Testcase Example:  '[3,9,20,null,null,15,7]'
 *
 * 给定一个二叉树，返回其按层次遍历的节点值。 （即逐层地，从左到右访问所有节点）。
 * 
 * 例如:
 * 给定二叉树: [3,9,20,null,null,15,7],
 * 
 * ⁠   3
 * ⁠  / \
 * ⁠ 9  20
 * ⁠   /  \
 * ⁠  15   7
 * 
 * 
 * 返回其层次遍历结果：
 * 
 * [
 * ⁠ [3],
 * ⁠ [9,20],
 * ⁠ [15,7]
 * ]
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

    /**
     * @param TreeNode $root
     * @return Integer[][]
     */
    function levelOrder($root)
    {
        $result = [];
        if ($root === null) return $result;
        $queue = new SplQueue();
        $queue->enqueue($root);
        while ($count = $queue->count()) {
            $currentLevel = [];
            for ($i = 0; $i < $count; ++$i) {
                $node = $queue->dequeue();
                $currentLevel[] = $node->val;
                if ($node->left !== null) {
                    $queue->enqueue($node->left);
                }
                if ($node->right !== null) {
                    $queue->enqueue($node->right);
                }
            }
            $result[] = $currentLevel;
        }

        return $result;
    }
}
// @lc code=end
$root = [3, 9, 20, null, null, 15, 7];
print_r((new Solution())->levelOrder($root));
