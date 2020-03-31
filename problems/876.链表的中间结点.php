<?php
/*
 * @lc app=leetcode.cn id=876 lang=php
 *
 * [876] 链表的中间结点
 *
 * https://leetcode-cn.com/problems/middle-of-the-linked-list/description/
 *
 * algorithms
 * Easy (64.14%)
 * Likes:    167
 * Dislikes: 0
 * Total Accepted:    35.4K
 * Total Submissions: 53K
 * Testcase Example:  '[1,2,3,4,5]'
 *
 * 给定一个带有头结点 head 的非空单链表，返回链表的中间结点。
 * 
 * 如果有两个中间结点，则返回第二个中间结点。
 * 
 * 
 * 
 * 示例 1：
 * 
 * 输入：[1,2,3,4,5]
 * 输出：此列表中的结点 3 (序列化形式：[3,4,5])
 * 返回的结点值为 3 。 (测评系统对该结点序列化表述是 [3,4,5])。
 * 注意，我们返回了一个 ListNode 类型的对象 ans，这样：
 * ans.val = 3, ans.next.val = 4, ans.next.next.val = 5, 以及 ans.next.next.next
 * = NULL.
 * 
 * 
 * 示例 2：
 * 
 * 输入：[1,2,3,4,5,6]
 * 输出：此列表中的结点 4 (序列化形式：[4,5,6])
 * 由于该列表有两个中间结点，值分别为 3 和 4，我们返回第二个结点。
 * 
 * 
 * 
 * 
 * 提示：
 * 
 * 
 * 给定链表的结点数介于 1 和 100 之间。
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
    function middleNode1($head)
    {
        $arr = [];
        $cur = $head;
        while ($cur) {
            $arr[] = $cur->val;
            $cur = $cur->next;
        }

        $mid = (int) (count($arr) / 2);
        $cur = $head;
        for ($i = 0; $i < $mid; ++$i) {
            $cur = $cur->next;
        }

        return $cur;
    }

    function middleNode($head)
    {
        // 快慢指针
        $slow = $fast = $head;
        while ($fast && $fast->next) {
            $slow = $slow->next;
            $fast = $fast->next->next;
        }

        return $slow;
    }
}
// @lc code=end
