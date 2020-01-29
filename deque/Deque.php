<?php

class Deque
{
    protected $queue;

    public function __construct($queue = [])
    {
        if (is_array($queue)) {
            $this->queue = $queue;
        }
    }

    public function front()
    {
        return reset($this->queue);
    }

    public function back()
    {
        return end($this->queue);
    }

    public function isEmpty()
    {
        return empty($this->queue);
    }

    public function size()
    {
        return count($this->queue);
    }

    public function pushBack($val)
    {
        array_push($this->queue, $val);
    }

    public function pushFront($val)
    {
        array_unshift($this->queue, $val);
    }

    public function popBack()
    {
        return array_pop($this->queue);
    }

    public function popFront()
    {
        return array_shift($this->queue);
    }

    public function clear()
    {
        $this->queue = [];
    }
}
