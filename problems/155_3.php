<?php

/**
 * 设计一个支持 push，pop，top 操作，并能在常数时间内检索到最小元素的栈。

 * push (x) -- 将元素 x 推入栈中。
 * pop () -- 删除栈顶的元素。
 * top () -- 获取栈顶元素。
 * getMin () -- 检索栈中的最小元素。
 * 示例:
 * MinStack minStack = new MinStack();
 * minStack.push(-2);
 * minStack.push(0);
 * minStack.push(-3);
 * minStack.getMin();   --> 返回 -3.
 * minStack.pop();
 * minStack.top();      --> 返回 0.
 * minStack.getMin();   --> 返回 -2.
 */
class MinStack
{
    // 不使用辅助栈，原地扩展该栈，与使用辅助栈类似
    protected $data;
    /**
     * initialize your data structure here.
     */
    function __construct()
    {
        $this->data = new SplStack();
    }

    /**
     * @param Integer $x
     * @return NULL
     */
    function push($x)
    {
        // 入栈时，值小于等于辅助栈栈顶元素时才入栈
        if ($this->data->count() == 0) {
            $this->data->push($x);
            $this->data->push($x);
        } else {
            $this->data->push(min($x, $this->getMin()));
            $this->data->push($x);
        }
    }

    /**
     * @return NULL
     */
    function pop()
    {
        // 出栈时，出栈元素等于辅助栈栈顶元素才出栈
        if ($this->data->count()) {
            $this->data->pop();
            $this->data->pop();
        }
    }

    /**
     * @return Integer
     */
    function top()
    {
        if ($this->data->count() == 0) {
            return null;
        }
        return $this->data->top();
    }

    /**
     * @return Integer
     */
    function getMin()
    {
        if ($this->data->count() == 0) {
            return null;
        }
        
        $last = $this->data->pop();
        $min = $this->data->top();
        $this->data->push($last);
        return $min;
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

/**
 * Your MinStack object will be instantiated and called as such:
 * $obj = MinStack();
 * $obj->push($x);
 * $obj->pop();
 * $ret_3 = $obj->top();
 * $ret_4 = $obj->getMin();
 */


$minStack = new MinStack();
$minStack->push(-2);
$minStack->push(0);
$minStack->push(-1);
echo $minStack->getMin() . PHP_EOL;
echo $minStack->top() . PHP_EOL;
$minStack->pop();
echo $minStack->getMin() . PHP_EOL;
