<?php
class MaxQueue
{
    private $queue;
    private $maxQueue;
    /**
     */
    function __construct()
    {
        $this->queue = new SplQueue();
        $this->maxQueue = [];
    }

    /**
     * @return Integer
     */
    function max_value()
    {
        if ($this->queue->isEmpty()) {
            return -1;
        }

        return reset($this->maxQueue);
    }

    /**
     * @param Integer $value
     * @return NULL
     */
    function push_back($value)
    {
        $this->queue->enqueue($value);
        while (!empty($this->maxQueue) && $value > end($this->maxQueue)) {
            array_pop($this->maxQueue);
        }

        array_push($this->maxQueue, $value);
    }

    /**
     * @return Integer
     */
    function pop_front()
    {
        if ($this->queue->isEmpty()) {
            return -1;
        }

        $result = $this->queue->dequeue();
        if (reset($this->maxQueue) == $result) {
            array_shift($this->maxQueue);
        }
        return $result;
    }
}

/**
 * Your MaxQueue object will be instantiated and called as such:
 * $obj = MaxQueue();
 * $ret_1 = $obj->max_value();
 * $obj->push_back($value);
 * $ret_3 = $obj->pop_front();
 */
