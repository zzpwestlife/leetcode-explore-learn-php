<?php
/*
 * @lc app=leetcode.cn id=98 lang=php
 *
 * [98] 验证二叉搜索树
 *
 * https://leetcode-cn.com/problems/validate-binary-search-tree/description/
 *
 * algorithms
 * Medium (28.46%)
 * Likes:    402
 * Dislikes: 0
 * Total Accepted:    66.5K
 * Total Submissions: 230.8K
 * Testcase Example:  '[2,1,3]'
 *
 * 给定一个二叉树，判断其是否是一个有效的二叉搜索树。
 * 
 * 假设一个二叉搜索树具有如下特征：
 * 
 * 
 * 节点的左子树只包含小于当前节点的数。
 * 节点的右子树只包含大于当前节点的数。
 * 所有左子树和右子树自身必须也是二叉搜索树。
 * 
 * 
 * 示例 1:
 * 
 * 输入:
 * ⁠   2
 * ⁠  / \
 * ⁠ 1   3
 * 输出: true
 * 
 * 
 * 示例 2:
 * 
 * 输入:
 * ⁠   5
 * ⁠  / \
 * ⁠ 1   4
 * / \
 * 3   6
 * 输出: false
 * 解释: 输入为: [5,1,4,null,null,3,6]。
 * 根节点的值为 5 ，但是其右子节点值为 4 。
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
     * @return Boolean
     */
    // TODO 不熟悉，多做
    function isValidBST($root)
    {
        return $this->helper($root, null, null);
    }

    // 递归函数的含义，返回当前 node 为根节点的子树是否为 bst
    private function helper($node, $lower, $upper)
    {
        // terminator
        if ($node === null) return true;
        // drill down
        if ($lower !== null && $node->val <= $lower) return false;
        if ($upper !== null && $node->val >= $upper) return false;
        if (false === $this->helper($node->left, $lower, $node->val)) return false;
        if (false === $this->helper($node->right, $node->val, $upper)) return false;
        return true;
    }
}
// @lc code=end
