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
        if ($val) {
            $this->dummyHead->next = new Node($val);
            $this->size++;
        }
    }

    /**
     * Get the value of the index-th node in the linked list. If the index is invalid, return -1.
     * @param Integer $index
     * @return Integer
     * 获取链表中第 index 个节点的值。如果索引无效，则返回 -1
     */
    function get($index)
    {
        if ($index < 0 || $index > $this->size - 1) {
            return -1;
        }

        $cur = $this->dummyHead;
        for ($i = 0; $i < $index + 1; ++$i) {
            $cur = $cur->next;
        }

        return $cur->readNode();
    }

    public function size()
    {
        return $this->size;
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
     * Add a node of value val before the index-th node in the linked list. If index equals to the length of linked list, the node will be appended to the end of linked list. If index is greater than the length, the node will not be inserted.
     * @param Integer $index
     * @param Integer $val
     * @return NULL
     * 在链表中的第 index 个节点之前添加值为 val  的节点。
     * 如果 index 等于链表的长度，则该节点将附加到链表的末尾。
     * 如果 index 大于链表长度，则不会插入节点。如果 index 小于 0，则在头部插入节点。
     */
    function addAtIndex($index, $val)
    {
        // 0-based index
        if ($index > $this->size) {
            return;
        }

        if ($index < 0) {
            $index = 0;
        }

        $cur = $this->dummyHead;
        for ($i = 0; $i < $index; ++$i) {
            $cur = $cur->next;
        }

        $node = new Node($val);
        $node->next = $cur->next;
        $cur->next = $node;
        $this->size++;
    }

    /**
     * Delete the index-th node in the linked list, if the index is valid.
     * @param Integer $index
     * @return NULL
     * 如果索引 index 有效，则删除链表中的第 index 个节点。
     */
    function deleteAtIndex($index)
    {
        if ($index < 0 || $index > $this->size - 1) {
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
        $string = 'dummyHead->';
        $cur = $this->dummyHead;
        for ($i = 0; $i < $this->size; ++$i) {
            $cur = $cur->next;
            $string .= sprintf('%s(index:%d)->', $cur->readNode(), $i);
        }

        return $string . 'null(tail)';
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

$obj = new MyLinkedList();
$obj->addAtIndex(0, 0);
$obj->addAtIndex(0, 1);
$obj->addAtIndex(0, 2);
$obj->addAtIndex(0, 3);
$obj->addAtHead(22);
$obj->addAtTail(33);
echo $obj->dump() . PHP_EOL;
$obj->deleteAtIndex($obj->size() - 1);
echo $obj->dump() . PHP_EOL;
$obj->deleteAtIndex($obj->size() - 1);
echo $obj->dump() . PHP_EOL;
$obj->deleteAtIndex($obj->size() - 1);
echo $obj->dump() . PHP_EOL;
