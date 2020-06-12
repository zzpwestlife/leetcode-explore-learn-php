<?php
/*
 * @lc app=leetcode.cn id=234 lang=php
 *
 * [234] 回文链表
 *
 * https://leetcode-cn.com/problems/palindrome-linked-list/description/
 *
 * algorithms
 * Easy (39.85%)
 * Likes:    386
 * Dislikes: 0
 * Total Accepted:    59.4K
 * Total Submissions: 148.2K
 * Testcase Example:  '[1,2]'
 *
 * 请判断一个链表是否为回文链表。
 * 
 * 示例 1:
 * 
 * 输入: 1->2
 * 输出: false
 * 
 * 示例 2:
 * 
 * 输入: 1->2->2->1
 * 输出: true
 * 
 * 
 * 进阶：
 * 你能否用 O(n) 时间复杂度和 O(1) 空间复杂度解决此题？
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
     * @return Boolean
     */
    function isPalindrome1($head)
    {
        // double pointers 快慢指针
        if ($head == null || $head->next == null) {
            return true;
        }

        if ($head->next->next == null) {
            return $head->val == $head->next->val;
        }

        $slow = $head;
        $fast = $head;
        // 边遍历边反转 slow 指针之前的链表
        while ($fast !== null && $fast->next !== null) {
            $slow = $slow->next;
            $fast = $fast->next->next;
        }

        // 用简单示例在纸上画图，可知此时，如果链表总数为偶数，slow 位于右中位
        // 如果为奇数，slow 位于中间位
        // 反转 slow 至 链表尾的链表，使用递归
        $slow = $this->reverse($slow);

        // 遍历两个链表，比较
        while ($head !== null && $slow !== null) {
            if ($head->val !== $slow->val) {
                return false;
            }

            $head = $head->next;
            $slow = $slow->next;
        }

        return true;
    }

    private function reverse($head)
    {
        if ($head === null || $head->next === null) {
            return $head;
        }

        $last = $this->reverse($head->next);
        $head->next->next = $head;
        $head->next = null;
        return $last;
    }

    function isPalindrome($head)
    {
        if ($head === null || $head->next === null) return true;
        // 快慢指针，遍历的同时反转链表前半部分
        $fast = $slow = $head;
        $pre = null;
        while ($fast !== null && $fast->next !== null) {
            // 这里的顺序会严重影响结果
            $cur = $slow;
            $fast = $fast->next->next;
            $slow = $slow->next;

            $cur->next = $pre;
            $pre = $cur;
        }

        // 此时 slow 位于右中点
        if ($fast !== null) {
            $slow = $slow->next;
        }

        while ($pre !== null) {
            if ($pre->val != $slow->val) return false;
            $pre = $pre->next;
            $slow = $slow->next;
        }
        return true;
    }

    private function dump($node)
    {
        $str = '';
        while ($node !== null) {
            $str .= $node->val . '->';
            $node = $node->next;
        }
        $str .= 'null' . PHP_EOL;
        return $str;
    }
}
// @lc code=end
