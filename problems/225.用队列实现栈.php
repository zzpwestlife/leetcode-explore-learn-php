<?php
/*
 * @lc app=leetcode.cn id=225 lang=php
 *
 * [225] 用队列实现栈
 *
 * https://leetcode-cn.com/problems/implement-queue2-using-queues/description/
 *
 * algorithms
 * Easy (61.98%)
 * Likes:    133
 * Dislikes: 0
 * Total Accepted:    34.7K
 * Total Submissions: 54.5K
 * Testcase Example:  '["MyStack","push","push","top","pop","empty"]\n[[],[1],[2],[],[],[]]'
 *
 * 使用队列实现栈的下列操作：
 * 
 * 
 * push(x) -- 元素 x 入栈
 * pop() -- 移除栈顶元素
 * top() -- 获取栈顶元素
 * empty() -- 返回栈是否为空
 * 
 * 
 * 注意:
 * 
 * 
 * 你只能使用队列的基本操作-- 也就是 push to back, peek/pop from front, size, 和 is empty
 * 这些操作是合法的。
 * 你所使用的语言也许不支持队列。 你可以使用 list 或者 deque（双端队列）来模拟一个队列 , 只要是标准的队列操作即可。
 * 你可以假设所有操作都是有效的（例如, 对一个空的栈不会调用 pop 或者 top 操作）。
 * 
 * 
 */

// @lc code=start
class MyStack
{
    protected $queue1;
    protected $queue2;
    /**
     * Initialize your data structure here.
     */
    function __construct()
    {
        $this->queue1 = new SplQueue();
        $this->queue2 = new SplQueue();
    }

    /**
     * Push element x onto stack.
     * @param Integer $x
     * @return NULL
     */
    function push($x)
    {
        $this->queue1->enqueue($x);
    }

    /**
     * Removes the element on top of the stack and returns that element.
     * @return Integer
     */
    function pop()
    {
        while ($this->queue1->count() > 1) {
            $this->queue2->enqueue($this->queue1->dequeue());
        }

        $return = $this->queue1->dequeue();
        while (!$this->queue2->isEmpty()) {
            $this->queue1->enqueue($this->queue2->dequeue());
        }
        return $return;
    }

    /**
     * Get the top element.
     * @return Integer
     */
    function top()
    {
        return $this->queue1->top();
    }

    /**
     * Returns whether the stack is empty.
     * @return Boolean
     */
    function empty()
    {
        return $this->queue1->isEmpty() && $this->queue2->isEmpty();
    }
}

/**
 * Your MyStack object will be instantiated and called as such:
 * $obj = MyStack();
 * $obj->push($x);
 * $ret_2 = $obj->pop();
 * $ret_3 = $obj->top();
 * $ret_4 = $obj->empty();
 */

/**
 * Your MyStack object will be instantiated and called as such:
 * $obj = MyStack();
 * $obj->push($x);
 * $ret_2 = $obj->pop();
 * $ret_3 = $obj->top();
 * $ret_4 = $obj->empty();
 */
// @lc code=end

error_reporting(E_ALL);
ini_set('display_errors', 1);
$obj = new MyStack();
$obj->push(1);
$obj->push(2);
$ret_2 = $obj->pop();
$ret_3 = $obj->top();
$ret_4 = $obj->empty();
