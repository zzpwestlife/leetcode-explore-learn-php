<?php
/*
 * @lc app=leetcode.cn id=232 lang=php
 *
 * [232] 用栈实现队列
 *
 * https://leetcode-cn.com/problems/implement-queue-using-stacks/description/
 *
 * algorithms
 * Easy (62.19%)
 * Likes:    144
 * Dislikes: 0
 * Total Accepted:    33.8K
 * Total Submissions: 53.5K
 * Testcase Example:  '["MyQueue","push","push","peek","pop","empty"]\n[[],[1],[2],[],[],[]]'
 *
 * 使用栈实现队列的下列操作：
 * 
 * 
 * push(x) -- 将一个元素放入队列的尾部。
 * pop() -- 从队列首部移除元素。
 * peek() -- 返回队列首部的元素。
 * empty() -- 返回队列是否为空。
 * 
 * 
 * 示例:
 * 
 * MyQueue queue = new MyQueue();
 * 
 * queue.push(1);
 * queue.push(2);  
 * queue.peek();  // 返回 1
 * queue.pop();   // 返回 1
 * queue.empty(); // 返回 false
 * 
 * 说明:
 * 
 * 
 * 你只能使用标准的栈操作 -- 也就是只有 push to top, peek/pop from top, size, 和 is empty
 * 操作是合法的。
 * 你所使用的语言也许不支持栈。你可以使用 list 或者 deque（双端队列）来模拟一个栈，只要是标准的栈操作即可。
 * 假设所有操作都是有效的 （例如，一个空的队列不会调用 pop 或者 peek 操作）。
 * 
 * 
 */

// @lc code=start
class MyQueue
{
    protected $stack1;
    protected $stack2;
    /**
     * Initialize your data structure here.
     */
    function __construct()
    {
        $this->stack1 = new SplStack();
        $this->stack2 = new SplStack();
    }

    /**
     * Push element x to the back of queue.
     * @param Integer $x
     * @return NULL
     */
    function push($x)
    {
        $this->stack1->push($x);
    }

    /**
     * Removes the element from in front of queue and returns that element.
     * @return Integer
     */
    function pop()
    {
        while ($this->stack1->count() > 1) {
            $this->stack2->push($this->stack1->pop());
        }

        $result = $this->stack1->pop();
        while (!$this->stack2->isEmpty()) {
            $this->stack1->push($this->stack2->pop());
        }

        return $result;
    }

    /**
     * Get the front element.
     * @return Integer
     */
    function peek()
    {
        return $this->stack1->bottom();
    }

    /**
     * Returns whether the queue is empty.
     * @return Boolean
     */
    function empty()
    {
        return $this->stack1->isEmpty();
    }
}

/**
 * Your MyQueue object will be instantiated and called as such:
 * $obj = MyQueue();
 * $obj->push($x);
 * $ret_2 = $obj->pop();
 * $ret_3 = $obj->peek();
 * $ret_4 = $obj->empty();
 */
// @lc code=end
