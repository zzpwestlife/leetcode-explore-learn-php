<?php

require_once './node.php';
// 反转一棵二叉树
class reverseTree
{
    public function inverseTree(TreeNode $root)
    {
        return $this->helper($root);
    }

    private function helper(&$node)
    {
        if ($node === null) {
            return null;
        }

        $temp = new TreeNode();
        $temp->left = $node->left;
        $node->left = $node->right;
        $node->right = $temp;
        $this->helper($node->left);
        $this->helper($node->right);
    }
}
