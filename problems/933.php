<?php

class Solution933
{

}

class RecentCounter
{
    protected $queue;

    /**
     */
    function __construct()
    {
        // $this->queue = [];
        $this->queue = new SplQueue();
    }

    /**
     * @param Integer $t
     * @return Integer
     */
    function ping($t)
    {
        while ($this->queue->count() && $this->queue->bottom() + 3000 < $t) {
            $this->queue->dequeue();
        }
        $this->queue->enqueue($t);

        return $this->queue->count();
    }
}

/**
 * Your RecentCounter object will be instantiated and called as such:
 * $obj = RecentCounter();
 * $ret_1 = $obj->ping($t);
 */
