<?php

require_once './node.php';
// 二叉树的最大深度
class maxDepth
{
    protected $maxDepth = 0;
    public function depth(TreeNode $root)
    {
        $this->helper($root);
        return $this->maxDepth;
    }

    private function helper(TreeNode $node)
    {
        if ($node === null) {
            return;
        }

        $this->maxDepth++;
        $this->helper($node->left);
        $this->helper($node->right);
    }
}
