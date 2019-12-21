<?php

/**
 * Definition for a binary tree node.
 */
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

class Solution94
{
    /**
     * @param TreeNode $root
     * @return Integer[]
     */
    function inorderTraversal($root)
    {
        $result = [];
        $this->helper($root, $result);
        return $result;
    }

    private function helper(TreeNode $root, array &$result)
    {
        if ($root == null) {
            return;
        }

        $this->helper($root->left, $result);
        $result[] = $root->val;
        $this->helper($root->right, $result);
    }
}

$tree = [1, null, 2, 3];
echo implode(',', (new Solution94())->inorderTraversal($tree)) . PHP_EOL;
