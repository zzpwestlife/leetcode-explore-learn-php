<?php
/*
 * @lc app=leetcode.cn id=21 lang=php
 *
 * [21] 合并两个有序链表
 *
 * https://leetcode-cn.com/problems/merge-two-sorted-lists/description/
 *
 * algorithms
 * Easy (59.22%)
 * Likes:    834
 * Dislikes: 0
 * Total Accepted:    175.6K
 * Total Submissions: 295.4K
 * Testcase Example:  '[1,2,4]\n[1,3,4]'
 *
 * 将两个有序链表合并为一个新的有序链表并返回。新链表是通过拼接给定的两个链表的所有节点组成的。 
 * 
 * 示例：
 * 
 * 输入：1->2->4, 1->3->4
 * 输出：1->1->2->3->4->4
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
     * @param ListNode $l1
     * @param ListNode $l2
     * @return ListNode
     */
    function mergeTwoLists1($l1, $l2)
    {
        $dummyHead = new ListNode(null);
        $cur = $dummyHead;
        while ($l1 !== null && $l2 !== null) {
            if ($l1->val <= $l2->val) {
                $cur->next = $l1;
                $l1 = $l1->next;
            } else {
                $cur->next = $l2;
                $l2 = $l2->next;
            }
            $cur = $cur->next;
        }

        if ($l1 !== null) {
            $cur->next = $l1;
        } elseif ($l2 !== null) {
            $cur->next = $l2;
        }

        return $dummyHead->next;
    }

    function mergeTwoLists($l1, $l2)
    {
        // 递归解法
        // 递归函数的含义：返回当前两个链表合并之后的头节点(每一层都返回排序好的链表头)
        if ($l1 === null) {
            return $l2;
        }

        if ($l2 === null) {
            return $l1;
        }

        if ($l1->val < $l2->val) {
            $l1->next = $this->mergeTwoLists($l1->next, $l2);
            return $l1;
        } else {
            $l2->next = $this->mergeTwoLists($l1, $l2->next);
            return $l2;
        }
    }
}
// @lc code=end
