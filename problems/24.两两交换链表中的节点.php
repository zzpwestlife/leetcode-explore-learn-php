<?php
/*
 * @lc app=leetcode.cn id=24 lang=php
 *
 * [24] 两两交换链表中的节点
 *
 * https://leetcode-cn.com/problems/swap-nodes-in-pairs/description/
 *
 * algorithms
 * Medium (63.86%)
 * Likes:    401
 * Dislikes: 0
 * Total Accepted:    67.8K
 * Total Submissions: 105.8K
 * Testcase Example:  '[1,2,3,4]'
 *
 * 给定一个链表，两两交换其中相邻的节点，并返回交换后的链表。
 * 
 * 你不能只是单纯的改变节点内部的值，而是需要实际的进行节点交换。
 * 
 * 
 * 
 * 示例:
 * 
 * 给定 1->2->3->4, 你应该返回 2->1->4->3.
 * 
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
class Solution
{
    /**
     * @param ListNode $head
     * @return ListNode
     */
    function swapPairs2($head)
    {
        if ($head === null || $head->next === null) {
            return $head;
        }

        $dummyHead = new ListNode(null);
        $dummyHead->next = $head;
        $cur = $dummyHead;
        while ($cur->next !== null && $cur->next->next !== null) {
            $a = $cur->next;
            $b = $cur->next->next;
            $cur->next = $b;
            $a->next = $b->next;
            $b->next = $a;
            $cur = $cur->next->next;
        }

        return $dummyHead->next;
    }

    function swapPairs($head)
    {
        // terminator
        if ($head === null || $head->next === null) {
            return $head;
        }

        $next = $head->next;
        $head->next = $this->swapPairs($next->next);
        $next->next = $head;
        return $next;
    }
}
// @lc code=end
