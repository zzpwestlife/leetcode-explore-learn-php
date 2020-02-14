<?php

class CQueue
{
    protected $stack1;
    protected $stack2;
    /**
     */
    function __construct()
    {
        $this->stack1 = new SplStack();
        $this->stack2 = new SplStack();
    }

    /**
     * @param Integer $value
     * @return NULL
     */
    function appendTail($value)
    {
        $this->stack1->push($value);
    }

    /**
     * @return Integer
     */
    function deleteHead()
    {
        if ($this->stack1->count() == 0) {
            return -1;
        }

        while ($this->stack1->count() > 0) {
            $this->stack2->push($this->stack1->pop());
        }

        $return = $this->stack2->pop();
        while ($this->stack2->count() > 0) {
            $this->stack1->push($this->stack2->pop());
        }

        return $return;
    }
}

/**
 * Your CQueue object will be instantiated and called as such:
 * $obj = CQueue();
 * $obj->appendTail($value);
 * $ret_2 = $obj->deleteHead();
 */

error_reporting(E_ALL);
ini_set('display_errors', 1);

$obj = new CQueue();
$obj->appendTail(1);
$obj->appendTail(2);
$obj->appendTail(3);
echo $obj->deleteHead() . PHP_EOL;
