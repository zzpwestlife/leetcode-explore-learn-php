<?php

/**
 * @comment 98. 验证二叉搜索树
 * @author ZouZhipeng <zzpwestlife@gmail.com>
 * @date 2019/12/22
 * @time 10:50
 * Class Solution98
 * 给定一个二叉树，判断其是否是一个有效的二叉搜索树。
 *
 * 假设一个二叉搜索树具有如下特征：
 *
 * 节点的左子树只包含小于当前节点的数。
 * 节点的右子树只包含大于当前节点的数。
 * 所有左子树和右子树自身必须也是二叉搜索树。
 */
class Solution98
{
    /**
     * @param TreeNode $root
     * @return Boolean
     */
    function isValidBST1($root)
    {
        // 方法一：根据 BST 的定义，使用递归判断。需要两个变量分别记录当前子树的上界和下界
        $lower = $upper = null;
        return $this->helper($root, $lower, $upper);
    }

    function isValidBST2($root)
    {
        // 方法二：中序遍历为有序
        $result = [];
        $this->inOrder($root, $result);
        $length = count($result);
        if ($length >= 2) {
            for ($i = 1; $i <= $length - 1; ++$i) {
                if ($result[$i] < $result[$i - 1]) {
                    return false;
                }
            }
        }

        return true;
    }

    private function inOrder($node, &$result)
    {
        // terminator
        if ($node === null) {
            return $result;
        }

        // processor
        // drill in
        $this->inOrder($node->left, $result);
        $result[] = $node->val;
        $this->inOrder($node->right, $result);
    }

    private function helper($node, $lower, $upper)
    {
        // terminator
        if ($node == null) {
            return true;
        }

        // processor
        if ($lower !== null && $node->val <= $lower) {
            return false;
        }

        if ($upper !== null && $node->val >= $upper) {
            return false;
        }

        // drill in
        if ($this->helper($node->left, $lower, $node->val) === false) {
            return false;
        }

        if ($this->helper($node->right, $node->val, $upper) === false) {
            return false;
        }

        return true;
    }

    function isValidBST($root)
    {
        // 方法二：中序遍历为有序，记录前一个遍历好的节点值，随时终止递归
        $last = null;
        return $this->inOrder2($root, $last);
    }

    private function inOrder2($node, $last)
    {
        // terminator
        if ($node === null) {
            return true;
        }

        // processor
        // drill in
        $this->inOrder2($node->left, $last);
        if ($last !== null && $node->val <= $last) {
            return false;
        }

        $last = $node->val;
        $this->inOrder2($node->right, $last);
    }
}

class TreeNode
{
    public $val = null;
    public $left = null;
    public $right = null;

    function __construct($value)
    {
        $this->val = $value;
    }
}