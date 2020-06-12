<?php
/*
 * @lc app=leetcode.cn id=1315 lang=php
 *
 * [1315] 祖父节点值为偶数的节点和
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
     * @return Integer
     */
    public function sumEvenGrandparent($root)
    {
        $ans = 0;
        if ($root === null) {
            return $ans;
        }

        $queue = new SplQueue();
        $queue->enqueue($root);

        while (!$queue->isEmpty()) {
            $node = $queue->dequeue();
            $flag = false;
            if ($node->val & 1 == 0) {
                // 子节点要收集孙子节点的值
                $flag = true;
            }

            if ($node->left !== null) {
                if ($node->val < 0) {
                    $ans += $node->left->val;
                }

                if ($flag) {
                    $node->left->val *= -1;
                }
                $queue->enqueue($node->left);
            }

            if ($node->right !== null) {
                if ($node->val < 0) {
                    $ans += $node->right->val;
                }

                if ($flag) {
                    $node->right->val *= -1;
                }
                $queue->enqueue($node->right);
            }
        }

        return $ans;
    }
}
// @lc code=end
