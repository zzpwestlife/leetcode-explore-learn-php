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
    function mergeTwoLists($l1, $l2)
    {
        $dummyHead = new ListNode(null);
        $cur = $dummyHead;
        while ($l1 !== null && $l2 !== null) {
            if ($l1->val <= $l2->val) {
                $cur->next = $l1;
                $cur = $l1;
                $l1 = $l1->next;
            } else {
                $cur->next = $l2;
                $cur = $l2;
                $l2 = $l2->next;
            }
        }

        if ($l1 === null) {
            $cur->next = $l2;
        } else {
            $cur->next = $l1;
        }
        return $dummyHead->next;
    }
}
// @lc code=end
