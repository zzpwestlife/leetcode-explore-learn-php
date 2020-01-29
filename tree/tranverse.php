<?php

require_once './node.php';
class Tranverse
{
    protected $dump = '';
    public function tranverse(TreeNode $root)
    {
        $this->helper($root);
        return $this->dump;
    }

    private function helper(TreeNode $node)
    {
        if ($node === null) {
            $this->dump .=  PHP_EOL . 'null';
        }

        $this->dump .= $node->val . PHP_EOL;
        $this->helper($node->left);
        $this->helper($node->right);
    }
}
