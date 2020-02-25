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
class Solution {
    protected $result = [];
    /**
     * @param TreeNode $root
     * @return Integer[][]
     */
    function levelOrder1($root) {
        $this->dfs4LevelOrder($root, 0);
        return $this->result;
    }

    private function dfs4LevelOrder($root, $level)
    {
        if ($root === null) return;

        $this->result[$level][] = $root->val;
        $this->dfs4LevelOrder($root->left, $level + 1);
        $this->dfs4LevelOrder($root->right, $level + 1);
    }

    function levelOrder($root) {
        $res = [];
        if ($root === null) return $res;
        $queue = new SplQueue();
        // 将根节点放入到队列中，然后不断遍历队列
        $queue->enqueue($root);
        while ($count = $queue->count()) {
            // 将当前队列元素都拿出来，放到一个临时 list 中
            $tmp = [];
            for ($i = 0; $i < $count; ++$i) {
                $node = $queue->dequeue();
                $tmp[] = $node->val;
                if ($node->left !== null) {
                    $queue->enqueue($node->left);
                }
                if ($node->right !== null) {
                    $queue->enqueue($node->right);
                }
            }
            $res[] = $tmp;
        }
        return $res;
    }
}
// @lc code=end

