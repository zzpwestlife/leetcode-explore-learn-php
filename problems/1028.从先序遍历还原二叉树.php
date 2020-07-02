<?php
/*
 * @lc app=leetcode.cn id=1028 lang=php
 *
 * [1028] 从先序遍历还原二叉树
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
     * @param String $S
     * @return TreeNode
     */
    function recoverFromPreorder($S)
    {
        $len = strlen($S);
        $stack = [];
        for ($i = 0; $i < $len;) {
            // 先记录当前节点的 level
            $curLevel = 0;
            while ($i < $len && $S[$i] == '-') {
                $i++;
                $curLevel++;
            }

            // 当前节点的开始位置
            $start = $i;
            while ($i < $len && $S[$i] != '-') {
                // 指针移到当前节点的结束位置
                $i++;
            }

            $curNode = new TreeNode(substr($S, $start, $i - $start));
            // 根节点入栈
            if (count($stack) == 0) {
                $stack[] = $curNode;
                continue;
            }

            // 栈顶不是父亲，出栈
            while (count($stack) > $curLevel) {
                array_pop($stack);
            }

            // 左子节点已存在，安排为右儿子
            if (end($stack)->left) {
                end($stack)->right = $curNode;
            } else {
                end($stack)->left = $curNode;
            }

            $stack[] = $curNode;
        }

        return $stack[0];
    }
}
// @lc code=end

