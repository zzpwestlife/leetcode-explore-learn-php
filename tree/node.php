<?php

class TreeNode
{
    protected $val;
    protected $left;
    protected $right;

    public function __construct($x = null)
    {
        $this->val = $x;
    }
}
