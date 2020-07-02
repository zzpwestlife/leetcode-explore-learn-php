<?php
/*
 * @lc app=leetcode.cn id=297 lang=php
 *
 * [297] 二叉树的序列化与反序列化
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

class Codec
{
    function __construct()
    {
    }

    /**
     * @param TreeNode $root
     * @return String
     */
    function serialize($root)
    {
        if ($root === null) return '';
        $ans = [];
        $queue = new SplQueue();
        $queue->enqueue($root);
        while (!$queue->isEmpty()) {
            $node = $queue->dequeue();
            if ($node->val === null) {
                $ans[] = 'null';
            } else {
                $ans[] = $node->val;
                $queue->enqueue($node->left);
                $queue->enqueue($node->right);
            }
        }

        return implode(',', $ans);
    }

    /**
     * @param String $data
     * @return TreeNode
     */
    function deserialize($data)
    {
        if (empty($data)) return null;
        $data = explode(',', $data);
        $root = new TreeNode($data[0]);
        $curIndex = 1;
        $queue = new SplQueue();
        $queue->enqueue($root);
        while (!$queue->isEmpty()) {
            $node = $queue->dequeue();
            if ($data[$curIndex] !== 'null') {
                $node->left = new TreeNode($data[$curIndex]);
                $queue->enqueue($node->left);
            }
            $curIndex++;
            if ($data[$curIndex] !== 'null') {
                $node->right = new TreeNode($data[$curIndex]);
                $queue->enqueue($node->right);
            }
            $curIndex++;
        }

        return $root;
    }
}

/**
 * Your Codec object will be instantiated and called as such:
 * $obj = Codec();
 * $data = $obj->serialize($root);
 * $ans = $obj->deserialize($data);
 */

// @lc code=end
