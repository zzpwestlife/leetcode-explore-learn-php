<?php

class MyLinkedList2
{
    protected $size;
    protected $dummyHead;

    /**
     * Initialize your data structure here.
     */
    public function __construct()
    {
        $this->size = 0;
        $this->dummyHead = new Node2(null);
    }

    public function getSize()
    {
        return $this->size;
    }

    /**
     * Get the value of the index-th node in the linked list. If the index is invalid, return -1.
     * @param Integer $index
     * @return Integer
     */
    public function get($index)
    {
        if ($index < 0 || $index >= $this->getSize()) {
            return -1;
        }

        $cur = $this->dummyHead;
        for ($i = 0; $i <= $index; ++$i) {
            $cur = $cur->next;
        }

        return $cur->data;
    }

    /**
     * Add a node of value val before the first element of the linked list. After the insertion, the new node will be the first node of the linked list.
     * @param Integer $val
     * @return NULL
     */
    public function addAtHead($val)
    {
        $this->addAtIndex(0, $val);
    }

    /**
     * Append a node of value val to the last element of the linked list.
     * @param Integer $val
     * @return NULL
     */
    public function addAtTail($val)
    {
        $this->addAtIndex($this->getSize(), $val);
    }

    /**
     * Add a node of value val before the index-th node in the linked list. If index equals to the length of linked list, the node will be appended to the end of linked list. If index is greater than the length, the node will not be inserted.
     * @param Integer $index
     * @param Integer $val
     * @return NULL
     */
    public function addAtIndex($index, $val)
    {
        if ($index > $this->getSize()) {
            return;
        }

        if ($index < 0) {
            $index = 0;
        }

        $cur = $this->dummyHead;
        for ($i = 0; $i < $index; ++$i) {
            $cur = $cur->next;
        }

        $node = new Node2($val);
        $node->next = $cur->next;
        $cur->next = $node;
        $this->size++;
    }

    /**
     * Delete the index-th node in the linked list, if the index is valid.
     * @param Integer $index
     * @return NULL
     */
    public function deleteAtIndex($index)
    {
        if ($index < 0 || $index >= $this->getSize()) {
            return;
        }

        $cur = $this->dummyHead;
        for ($i = 0; $i < $index; ++$i) {
            $cur = $cur->next;
        }

        $cur->next = $cur->next->next;
        $this->size--;
    }

    public function dump()
    {
        $return = 'dummyHead->';
        $cur = $this->dummyHead;
        if ($this->getSize()) {
            for ($i = 0; $i < $this->getSize(); ++$i) {
                $cur = $cur->next;
                $return .= sprintf('%d->', $cur->data);
            }
        }

        $return .= 'tail';
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
class Node2
{
    public $data;
    public $next;

    public function __construct($val = null)
    {
        $this->data = $val;
        $this->next = null;
    }
}

//["MyLinkedList","addAtHead","addAtTail","addAtIndex","get","deleteAtIndex","get"]
//[[],[1],[3],[1,2],[1],[1],[1]]
$obj = new MyLinkedList2();
$obj->addAtHead(1);
$obj->addAtTail(3);
$obj->addAtIndex(1, 2);
echo $obj->get(1) . PHP_EOL;
echo $obj->dump() . PHP_EOL;
$obj->deleteAtIndex(1);
echo $obj->dump() . PHP_EOL;
