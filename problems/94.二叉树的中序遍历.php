<?php
/*
 * @lc app=leetcode.cn id=94 lang=php
 *
 * [94] 二叉树的中序遍历
 *
 * https://leetcode-cn.com/problems/binary-tree-inorder-traversal/description/
 *
 * algorithms
 * Medium (69.73%)
 * Likes:    389
 * Dislikes: 0
 * Total Accepted:    102.3K
 * Total Submissions: 146K
 * Testcase Example:  '[1,null,2,3]'
 *
 * 给定一个二叉树，返回它的中序 遍历。
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
 * 输出: [1,3,2]
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
    function inorderTraversal1($root)
    {
        $this->stack = [];
        $this->t($root);
        return $this->stack;
    }

    private function t($node)
    {
        if ($node === null) return;
        $this->t($node->left);
        $this->stack[] = $node->val;
        $this->t($node->right);
        return;
    }

    function inorderTraversal($root)
    {
        // 迭代法
        # 用p当做指针
        //  p = root
        //  while p or stack:
        //      # 把左子树压入栈中
        //      while p:
        //          stack.append(p)
        //          p = p.left
        //      # 输出 栈顶元素
        //      p = stack.pop()
        //      res.append(p.val)
        //      # 看右子树
        //      p = p.right
        //  return res

        $stack = new SplStack();
        $res = [];
        $cur = $root;
        while ($cur !== null || $stack->count()) {
            while ($cur !== null) {
                $stack->push($cur);
                $cur = $cur->left;
            }

            if ($stack->count()) {
                $cur = $stack->pop();
                $res[] = $cur->val;
                $cur = $cur->right;
            }
        }
        return $res;
    }
}
// @lc code=end
