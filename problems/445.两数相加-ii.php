<?php
/*
 * @lc app=leetcode.cn id=445 lang=php
 *
 * [445] 两数相加 II
 *
 * https://leetcode-cn.com/problems/add-two-numbers-ii/description/
 *
 * algorithms
 * Medium (53.25%)
 * Likes:    153
 * Dislikes: 0
 * Total Accepted:    20K
 * Total Submissions: 36K
 * Testcase Example:  '[7,2,4,3]\n[5,6,4]'
 *
 * 给你两个 非空 链表来代表两个非负整数。数字最高位位于链表开始位置。它们的每个节点只存储一位数字。将这两数相加会返回一个新的链表。
 * 
 * 你可以假设除了数字 0 之外，这两个数字都不会以零开头。
 * 
 * 
 * 
 * 进阶：
 * 
 * 如果输入链表不能修改该如何处理？换句话说，你不能对列表中的节点进行翻转。
 * 
 * 
 * 
 * 示例：
 * 
 * 输入：(7 -> 2 -> 4 -> 3) + (5 -> 6 -> 4)
 * 输出：7 -> 8 -> 0 -> 7
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
    function addTwoNumbers($l1, $l2)
    {
        if ($l1 === null) return $l2;
        if ($l2 === null) return $l1;
        $stack1 = new SplStack();
        $stack2 = new SplStack();
        while ($l1 !== null) {
            $stack1->push($l1->val);
            $l1 = $l1->next;
        }
        while ($l2 !== null) {
            $stack2->push($l2->val);
            $l2 = $l2->next;
        }

        $carry = 0;
        $head = null;
        while (!$stack1->isEmpty() || !$stack2->isEmpty() || $carry > 0) {
            $sum = $carry;
            $sum += $stack1->isEmpty() ? 0 : $stack1->pop();
            $sum += $stack2->isEmpty() ? 0 : $stack2->pop();
            $node = new ListNode($sum % 10);
            $node->next = $head;
            $head = $node;
            $carry = floor($sum / 10);
        }
        return $head;
    }
}
// @lc code=end
