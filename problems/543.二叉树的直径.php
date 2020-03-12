<?php
/*
 * @lc app=leetcode.cn id=543 lang=php
 *
 * [543] 二叉树的直径
 *
 * https://leetcode-cn.com/problems/diameter-of-binary-tree/description/
 *
 * algorithms
 * Easy (46.63%)
 * Likes:    220
 * Dislikes: 0
 * Total Accepted:    23.1K
 * Total Submissions: 48.4K
 * Testcase Example:  '[1,2,3,4,5]'
 *
 * 给定一棵二叉树，你需要计算它的直径长度。一棵二叉树的直径长度是任意两个结点路径长度中的最大值。这条路径可能穿过根结点。
 * 
 * 示例 :
 * 给定二叉树
 * 
 * 
 * ⁠         1
 * ⁠        / \
 * ⁠       2   3
 * ⁠      / \     
 * ⁠     4   5    
 * 
 * 
 * 返回 3, 它的长度是路径 [4,2,1,3] 或者 [5,2,1,3]。
 * 
 * 注意：两结点之间的路径长度是以它们之间边的数目表示。
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
    protected $result = 0;
    /**
     * @param TreeNode $root
     * @return Integer
     */
    function diameterOfBinaryTree($root)
    {
        $this->depth($root);
        return $this->result;
    }

    // 递归函数的含义，找出以当前节点为根节点的子树的最大深度
    private function depth($node)
    {
        if ($node === null) return 0;
        $leftDepth = $this->depth($node->left);
        $rightDepth = $this->depth($node->right);
        $this->result = max($this->result, $leftDepth + $rightDepth);
        return max($leftDepth, $rightDepth) + 1;
    }
}
// @lc code=end

