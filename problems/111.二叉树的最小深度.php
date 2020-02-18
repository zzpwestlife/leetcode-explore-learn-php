<?php
/*
 * @lc app=leetcode.cn id=111 lang=php
 *
 * [111] 二叉树的最小深度
 *
 * https://leetcode-cn.com/problems/minimum-depth-of-binary-tree/description/
 *
 * algorithms
 * Easy (41.10%)
 * Likes:    212
 * Dislikes: 0
 * Total Accepted:    50.5K
 * Total Submissions: 121.8K
 * Testcase Example:  '[3,9,20,null,null,15,7]'
 *
 * 给定一个二叉树，找出其最小深度。
 * 
 * 最小深度是从根节点到最近叶子节点的最短路径上的节点数量。
 * 
 * 说明: 叶子节点是指没有子节点的节点。
 * 
 * 示例:
 * 
 * 给定二叉树 [3,9,20,null,null,15,7],
 * 
 * ⁠   3
 * ⁠  / \
 * ⁠ 9  20
 * ⁠   /  \
 * ⁠  15   7
 * 
 * 返回它的最小深度  2.
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
     * @return Integer
     */
    function minDepth($root)
    {
        if ($root === null) return 0;
        if ($root->left === null && $root->right === null) return 1;
        $min = PHP_INT_MAX;
        if ($root->left !== null) $min = min($this->minDepth($root->left), $min);
        if ($root->right !== null) $min = min($this->minDepth($root->right), $min);
        return $min + 1;
    }
}
// @lc code=end
