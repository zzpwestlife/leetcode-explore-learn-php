<?php
/*
 * @lc app=leetcode.cn id=92 lang=php
 *
 * [92] 反转链表 II
 *
 * https://leetcode-cn.com/problems/reverse-linked-list-ii/description/
 *
 * algorithms
 * Medium (48.69%)
 * Likes:    285
 * Dislikes: 0
 * Total Accepted:    32.1K
 * Total Submissions: 65.8K
 * Testcase Example:  '[1,2,3,4,5]\n2\n4'
 *
 * 反转从位置 m 到 n 的链表。请使用一趟扫描完成反转。
 * 
 * 说明:
 * 1 ≤ m ≤ n ≤ 链表长度。
 * 
 * 示例:
 * 
 * 输入: 1->2->3->4->5->NULL, m = 2, n = 4
 * 输出: 1->4->3->2->5->NULL
 * 
 */

// @lc code=start
/**
 * Definition for a singly-linked list.
 * class ListNode {
 *     public $val = 0;
 *     public $next = null;
 *     function __construct($val) { $this->val = $val; }
 * }
 */
/**
 * Definition for a singly-linked list.
 * class ListNode {
 *     public $val = 0;
 *     public $next = null;
 *     function __construct($val) { $this->val = $val; }
 * }
 */
class Solution
{

    protected $successor;
    /**
     * @param ListNode $head
     * @param Integer $m
     * @param Integer $n
     * @return ListNode
     */
    function reverseBetween($head, $m, $n)
    {
        if ($m == 1) {
            return $this->reverseN($head, $n);
        }

        $head->next = $this->reverseBetween($head->next, $m - 1, $n - 1);
        return $head;
    }

    // 递归函数的含义：传入一个链表和一个整数，反转链表的前 n 个节点，返回链表头节点
    private function reverseN($head, $n)
    {
        if ($n == 1) {
            $this->successor = $head->next;
            return $head;
        }

        $last = $this->reverseN($head->next, $n - 1);
        $head->next->next = $head;
        $head->next = $this->successor;

        return $last;
    }
}
// @lc code=end

class ListNode
{
    public $val = 0;
    public $next = null;
    function __construct($val)
    {
        $this->val = $val;
    }
}

$head = new ListNode(1);
$head->next = new ListNode(2);
$head->next->next = new ListNode(3);
$head->next->next->next = new ListNode(4);
$head->next->next->next->next = new ListNode(5);
$m = 2;
$n = 4;

$list = (new Solution())->reverseBetween($head, $m, $n);
while ($list) {
    echo $list->val . PHP_EOL;
    $list = $list->next;
}
