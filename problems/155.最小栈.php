<?php
/*
 * @lc app=leetcode.cn id=155 lang=php
 *
 * [155] 最小栈
 *
 * https://leetcode-cn.com/problems/min-stack/description/
 *
 * algorithms
 * Easy (51.05%)
 * Likes:    374
 * Dislikes: 0
 * Total Accepted:    71.1K
 * Total Submissions: 138.3K
 * Testcase Example:  '["MinStack","push","push","push","getMin","pop","top","getMin"]\n[[],[-2],[0],[-3],[],[],[],[]]'
 *
 * 设计一个支持 push，pop，top 操作，并能在常数时间内检索到最小元素的栈。
 * 
 * 
 * push(x) -- 将元素 x 推入栈中。
 * pop() -- 删除栈顶的元素。
 * top() -- 获取栈顶元素。
 * getMin() -- 检索栈中的最小元素。
 * 
 * 
 * 示例:
 * 
 * MinStack minStack = new MinStack();
 * minStack.push(-2);
 * minStack.push(0);
 * minStack.push(-3);
 * minStack.getMin();   --> 返回 -3.
 * minStack.pop();
 * minStack.top();      --> 返回 0.
 * minStack.getMin();   --> 返回 -2.
 * 
 * 
 */

// @lc code=start
class MinStack
{
    protected $stack;
    protected $minStack;
    /**
     * initialize your data structure here.
     */
    function __construct()
    {
        $this->stack = new SplStack();
        $this->minStack = new SplStack();
    }

    /**
     * @param Integer $x
     * @return NULL
     */
    function push($x)
    {
        $this->stack->push($x);
        if ($this->minStack->count() == 0) {
            $this->minStack->push($x);
        } else {
            $this->minStack->push(min($x, $this->minStack->top()));
        }
    }

    /**
     * @return NULL
     */
    function pop()
    {
        if ($this->stack->count() == 0) {
            return -1;
        }

        $this->stack->pop();
        $this->minStack->pop();
        $this->count--;
    }

    /**
     * @return Integer
     */
    function top()
    {
        if ($this->stack->count() == 0) {
            return -1;
        }
        return $this->stack->top();
    }

    /**
     * @return Integer
     */
    function getMin()
    {
        if ($this->stack->count() == 0) {
            return -1;
        }
        return $this->minStack->top();
    }
}

/**
 * Your MinStack object will be instantiated and called as such:
 * $obj = MinStack();
 * $obj->push($x);
 * $obj->pop();
 * $ret_3 = $obj->top();
 * $ret_4 = $obj->getMin();
 */
// @lc code=end
