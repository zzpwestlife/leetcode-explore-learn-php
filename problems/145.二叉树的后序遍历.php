<?php
/*
 * @lc app=leetcode.cn id=145 lang=php
 *
 * [145] 二叉树的后序遍历
 *
 * https://leetcode-cn.com/problems/binary-tree-postorder-traversal/description/
 *
 * algorithms
 * Hard (69.74%)
 * Likes:    224
 * Dislikes: 0
 * Total Accepted:    49.8K
 * Total Submissions: 71K
 * Testcase Example:  '[1,null,2,3]'
 *
 * 给定一个二叉树，返回它的 后序 遍历。
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
 * 输出: [3,2,1]
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
    function postorderTraversal1($root)
    {
        $this->stack = [];
        $this->p($root);
        return $this->stack;
    }

    private function p($node)
    {
        if ($node === null) return;
        $this->p($node->left);
        $this->p($node->right);
        $this->stack[] = $node->val;
        return;
    }

    function postorderTraversal($root)
    {
        // 从根节点开始依次迭代，弹出栈顶元素输出到输出列表中，然后依次压入它的所有孩子节点，按照从上到下、从左至右的顺序依次压入栈中。
        // 因为深度优先搜索后序遍历的顺序是从下到上、从左至右，所以需要将输出列表逆序输出。
        $stack = new SplStack();
        $res = [];
        if ($root === null) return $res;
        $stack->push($root);

        while ($stack->count()) {
            $cur = $stack->pop();
            array_unshift($res, $cur->val);
            if ($cur->left !== null) $stack->push($cur->left);
            if ($cur->right !== null) $stack->push($cur->right);
        }

        return $res;
    }
}
// @lc code=end
