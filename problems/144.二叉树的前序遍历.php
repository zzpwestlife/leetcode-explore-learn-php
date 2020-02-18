<?php
/*
 * @lc app=leetcode.cn id=144 lang=php
 *
 * [144] 二叉树的前序遍历
 *
 * https://leetcode-cn.com/problems/binary-tree-preorder-traversal/description/
 *
 * algorithms
 * Medium (63.61%)
 * Likes:    206
 * Dislikes: 0
 * Total Accepted:    66.8K
 * Total Submissions: 104.4K
 * Testcase Example:  '[1,null,2,3]'
 *
 * 给定一个二叉树，返回它的 前序 遍历。
 * 
 * 示例:
 * 
 * 输入: [1,null,2,3]  
 * ⁠  1
 * ⁠   \
 * ⁠    2
 * ⁠   /
 * ⁠  3 
 * 
 * 输出: [1,2,3]
 * 
 * 
 * 进阶: 递归算法很简单，你可以通过迭代算法完成吗？
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
    protected $stack;
    /**
     * @param TreeNode $root
     * @return Integer[]
     */
    function preorderTraversal1($root)
    {
        $this->stack = [];
        $this->p($root);
        return $this->stack;
    }

    private function p($node)
    {
        if ($node === null) return;
        $this->stack[] = $node->val;
        $this->p($node->left);
        $this->p($node->right);
        return;
    }

    function preorderTraversal($root)
    {
        // 迭代法 从根节点开始，每次迭代弹出当前栈顶元素，并将其孩子节点压入栈中，先压右孩子再压左孩子。
        $stack = new SplStack();
        $res = [];
        $stack->push($root);
        while ($stack->count()) {
            $cur = $stack->pop();
            $res[] = $cur->val;
            if ($cur->right !== null) $stack->push($cur->right);
            if ($cur->left !== null) $stack->push($cur->left);
        }

        return $res;
    }
}
// @lc code=end
