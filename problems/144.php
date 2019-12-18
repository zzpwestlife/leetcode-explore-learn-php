<?php

/**
 * Class Solution144
 * 给定一个二叉树，返回它的 前序 遍历。
 *
 *  示例:
 *
 * 输入: [1,null,2,3]
 * 1
 * \
 * 2
 * /
 * 3
 *
 * 输出: [1,2,3]
 * 进阶: 递归算法很简单，你可以通过迭代算法完成吗？
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

class Solution144
{

    /**
     * @param TreeNode $root
     * @return array
     */
    function preorderTraversal($root)
    {
        $tmp = [];
        $result = [];
        array_unshift($tmp, $root);
        while (!empty($tmp)) {
            $current = array_shift($tmp);
            if ($current == null) continue;
            // 前序遍历，根左右
            array_push($result, $current->val);
            array_unshift($tmp, $current->right);
            array_unshift($tmp, $current->left);
        }
        return $result;
    }
}

$nums = [1, null, 2, 3];
echo implode(',', (new Solution144())->preorderTraversal($nums[0])) . PHP_EOL;
