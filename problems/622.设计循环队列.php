<?php
/*
 * @lc app=leetcode.cn id=622 lang=php
 *
 * [622] 设计循环队列
 *
 * https://leetcode-cn.com/problems/design-circular-queue/description/
 *
 * algorithms
 * Medium (39.75%)
 * Likes:    78
 * Dislikes: 0
 * Total Accepted:    19.3K
 * Total Submissions: 48.7K
 * Testcase Example:  '["MyCircularQueue","enQueue","enQueue","enQueue","enQueue","Rear","isFull","deQueue","enQueue","Rear"]\n[[3],[1],[2],[3],[4],[],[],[],[4],[]]'
 *
 * 设计你的循环队列实现。 循环队列是一种线性数据结构，其操作表现基于
 * FIFO（先进先出）原则并且队尾被连接在队首之后以形成一个循环。它也被称为“环形缓冲器”。
 * 
 * 
 * 循环队列的一个好处是我们可以利用这个队列之前用过的空间。在一个普通队列里，一旦一个队列满了，我们就不能插入下一个元素，即使在队列前面仍有空间。但是使用循环队列，我们能使用这些空间去存储新的值。
 * 
 * 你的实现应该支持如下操作：
 * 
 * 
 * MyCircularQueue(k): 构造器，设置队列长度为 k 。
 * Front: 从队首获取元素。如果队列为空，返回 -1 。
 * Rear: 获取队尾元素。如果队列为空，返回 -1 。
 * enQueue(value): 向循环队列插入一个元素。如果成功插入则返回真。
 * deQueue(): 从循环队列中删除一个元素。如果成功删除则返回真。
 * isEmpty(): 检查循环队列是否为空。
 * isFull(): 检查循环队列是否已满。
 * 
 * 
 * 
 * 
 * 示例：
 * 
 * MyCircularQueue circularQueue = new MycircularQueue(3); // 设置长度为 3
 * 
 * circularQueue.enQueue(1);  // 返回 true
 * 
 * circularQueue.enQueue(2);  // 返回 true
 * 
 * circularQueue.enQueue(3);  // 返回 true
 * 
 * circularQueue.enQueue(4);  // 返回 false，队列已满
 * 
 * circularQueue.Rear();  // 返回 3
 * 
 * circularQueue.isFull();  // 返回 true
 * 
 * circularQueue.deQueue();  // 返回 true
 * 
 * circularQueue.enQueue(4);  // 返回 true
 * 
 * circularQueue.Rear();  // 返回 4
 * 
 * 
 * 
 * 
 * 提示：
 * 
 * 
 * 所有的值都在 0 至 1000 的范围内；
 * 操作数将在 1 至 1000 的范围内；
 * 请不要使用内置的队列库。
 * 
 * 
 */

// @lc code=start
class MyCircularQueue
{
    protected $queue;
    protected $capacity;
    protected $head;
    protected $tail;
    /**
     * Initialize your data structure here. Set the size of the queue to be k.
     * @param Integer $k
     */
    function __construct($k)
    {
        // 预留一个空位
        $this->capacity = $k + 1;
        $this->queue = array_fill(0, $this->capacity, null);
        $this->head = $this->tail = 0;
    }

    /**
     * Insert an element into the circular queue. Return true if the operation is successful.
     * @param Integer $value
     * @return Boolean
     */
    function enQueue($value)
    {
        if ($this->isFull()) {
            return false;
        }

        $this->queue[$this->tail] = $value;
        // 重点
        $this->tail = ($this->tail + 1) % $this->capacity;
        return true;
    }

    /**
     * Delete an element from the circular queue. Return true if the operation is successful.
     * @return Boolean
     */
    function deQueue()
    {
        if ($this->isEmpty()) {
            return false;
        }

        $this->head = ($this->head + 1) % $this->capacity;
        return true;
    }

    /**
     * Get the front item from the queue.
     * @return Integer
     */
    function Front()
    {
        if ($this->isEmpty()) {
            return -1;
        }

        return $this->queue[$this->head];
    }

    /**
     * Get the last item from the queue.
     * @return Integer
     */
    function Rear()
    {
        if ($this->isEmpty()) {
            return -1;
        }

        return $this->queue[($this->tail - 1 + $this->capacity) % $this->capacity];
    }

    /**
     * Checks whether the circular queue is empty or not.
     * @return Boolean
     */
    function isEmpty()
    {
        return $this->head == $this->tail;
    }

    /**
     * Checks whether the circular queue is full or not.
     * @return Boolean
     */
    function isFull()
    {
        return ($this->tail + 1) % $this->capacity == $this->head;
    }
}

/**
 * Your MyCircularQueue object will be instantiated and called as such:
 * $obj = MyCircularQueue($k);
 * $ret_1 = $obj->enQueue($value);
 * $ret_2 = $obj->deQueue();
 * $ret_3 = $obj->Front();
 * $ret_4 = $obj->Rear();
 * $ret_5 = $obj->isEmpty();
 * $ret_6 = $obj->isFull();
 */
// @lc code=end
