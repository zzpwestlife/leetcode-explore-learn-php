<?php

class MyLinkedList
{
    protected $size;
    protected $dummyHead;
    /**
     * Initialize your data structure here.
     */
    function __construct($val = null)
    {
        $this->size = 0;
        $this->dummyHead = new Node(null);
        if (!empty($val)) {
            $node = new Node($val);
            $this->dummyHead->next = $node;
            $this->size++;
        }
    }

    /**
     * Get the value of the index-th node in the linked list. If the index is invalid, return -1.
     * @param Integer $index
     * @return Integer
     */
    function get($index)
    {
        if ($index < 0 || $index >= $this->size) {
            return -1;
        }

        $cur = $this->dummyHead;
        for ($i = 0; $i <= $index; ++$i) {
            $cur = $cur->next;
        }

        return $cur->readNode();
    }

    /**
     * Add a node of value val before the first element of the linked list. After the insertion, the new node will be the first node of the linked list.
     * @param Integer $val
     * @return NULL
     */
    function addAtHead($val)
    {
        $this->addAtIndex(0, $val);
    }

    /**
     * Append a node of value val to the last element of the linked list.
     * @param Integer $val
     * @return NULL
     */
    function addAtTail($val)
    {
        $this->addAtIndex($this->size, $val);
    }

    /**
     * Add a node of value val before the index-th node in the linked list. If index equals to the length of linked list, the node will be appended to the end of linked list. 
     * If index is greater than the length, the node will not be inserted.
     * @param Integer $index
     * @param Integer $val
     * @return NULL
     */
    function addAtIndex($index, $val)
    {
        if ($index > $this->size) {
            return;
        }

        if ($index < 0) {
            $index = 0;
        }

        $node = new Node($val);
        $cur = $this->dummyHead;
        for ($i = 0; $i < $index; ++$i) {
            $cur = $cur->next;
        }

        $node->next = $cur->next;
        $cur->next = $node;
        $this->size++;
    }

    /**
     * Delete the index-th node in the linked list, if the index is valid.
     * @param Integer $index
     * @return NULL
     */
    function deleteAtIndex($index)
    {
        if ($index < 0 || $index >= $this->size) {
            return;
        }

        $cur = $this->dummyHead;
        for ($i = 0; $i < $index - 1; ++$i) {
            $cur = $cur->next;
        }

        $cur->next = $cur->next->next;
        $this->size--;
    }

    function dump()
    {
        if ($this->size == 0) {
            return [];
        }

        $return = [];
        $cur = $this->dummyHead;
        for ($i = 0; $i < $this->size; ++$i) {
            $cur = $cur->next;
            $return[] = $cur->readNode();
        }

        return $return;
    }
}

/**
 * Your MyLinkedList object will be instantiated and called as such:
 * $obj = MyLinkedList();
 * $ret_1 = $obj->get($index);
 * $obj->addAtHead($val);
 * $obj->addAtTail($val);
 * $obj->addAtIndex($index, $val);
 * $obj->deleteAtIndex($index);
 */

class Node
{
    public $data;
    public $next;
    function __construct($data)
    {
        $this->data = $data;
        $this->next = null;
    }

    function readNode()
    {
        return $this->data;
    }
}


// $obj = new MyLinkedList();
// $obj->addAtHead(7);
// $obj->addAtTail(7);
// $obj->addAtHead(9);
// $obj->addAtTail(8);
// $obj->addAtHead(6);
// $obj->addAtHead(0);
// echo implode(',', $obj->dump()) . PHP_EOL;
// echo $obj->get(5) . PHP_EOL;
// $obj->addAtHead(0);
// echo $obj->get(2) . PHP_EOL;
// echo $obj->get(5) . PHP_EOL;
// $obj->addAtTail(4);
// $obj->addAtIndex(3, 333);
// $obj->deleteAtIndex(2);
// echo implode(',', $obj->dump()) . PHP_EOL;

$obj = new MyLinkedList();
$obj->addAtHead(1);
$obj->addAtTail(3);
$obj->addAtIndex(1, 2);
echo implode(',', $obj->dump()) . PHP_EOL;
echo $obj->get(1) . PHP_EOL;
$obj->deleteAtIndex(1);
echo implode(',', $obj->dump()) . PHP_EOL;
echo $obj->get(1) . PHP_EOL;
