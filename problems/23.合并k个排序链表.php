<?php
/*
 * @lc app=leetcode.cn id=23 lang=php
 *
 * [23] 合并K个排序链表
 *
 * https://leetcode-cn.com/problems/merge-k-sorted-lists/description/
 *
 * algorithms
 * Hard (48.51%)
 * Likes:    586
 * Dislikes: 0
 * Total Accepted:    101.6K
 * Total Submissions: 202.1K
 * Testcase Example:  '[[1,4,5],[1,3,4],[2,6]]'
 *
 * 合并 k 个排序链表，返回合并后的排序链表。请分析和描述算法的复杂度。
 *
 * 示例:
 *
 * 输入:
 * [
 * 1->4->5,
 * 1->3->4,
 * 2->6
 * ]
 * 输出: 1->1->2->3->4->4->5->6
 *
 */

// @lc code=start
/**
 * Definition for a singly-linked list.
 * class ListNode {
 *     public $val = 0;
 *     public $next = null;
 *     function __construct($val) { $this->val = $val; }
 * }.
 */
/**
 * Definition for a singly-linked list.
 * class ListNode {
 *     public $val = 0;
 *     public $next = null;
 *     function __construct($val) { $this->val = $val; }
 * }.
 */
class Solution
{
    /**
     * @param ListNode[] $lists
     *
     * @return ListNode
     */
    public function mergeKLists1($lists)
    {
        // 1. 暴力解法
        // 时间复杂度， O(nlogn)
        // 空间复杂度 O(n)
        $n = count($lists);
        if ($n == 0) {
            return null;
        }

        if ($n == 1) {
            return reset($lists);
        }

        $arr = [];
        for ($i = 0; $i < $n; ++$i) {
            $list = $lists[$i];
            while ($list !== null) {
                $arr[] = $list->val;
                $list = $list->next;
            }
        }

        $dummyHead = new ListNode(0);
        $cur = $dummyHead;
        sort($arr);
        foreach ($arr as $v) {
            $cur->next = new ListNode($v);
            $cur = $cur->next;
        }

        return $dummyHead->next;
    }

    public function mergeKLists2($lists)
    {
        // 2. 逐一比较
        // 时间复杂度 O(kN)
        // 空间复杂度 O(N)
        $n = count($lists);
        if ($n == 0) {
            return null;
        }

        if ($n == 1) {
            return reset($lists);
        }

        foreach ($lists as $key => $list) {
            if ($list === null) {
                unset($lists[$key]);
            }
        }

        $dummyHead = new ListNode(0);
        $cur = $dummyHead;
        while (!empty($lists)) {
            $min = PHP_INT_MAX;
            $minKey = -1;
            $offset = 0;
            foreach ($lists as $key => $list) {
                if ($list->val < $min) {
                    $min = $list->val;
                    $minKey = $key;
                }
            }

            $cur->next = new ListNode($min);
            $cur = $cur->next;
            $lists[$minKey + $offset] = $lists[$minKey + $offset]->next;
            if ($lists[$minKey + $offset] === null) {
                unset($lists[$minKey + $offset]);
            }
        }

        return $dummyHead->next;
    }

    private function dump($lists)
    {
        echo 'start ============' . count($lists) . PHP_EOL;
        foreach ($lists as $list) {
            while ($list !== null) {
                echo $list->val . '->';
                $list = $list->next;
            }

            echo PHP_EOL;
        }
        echo 'end' . PHP_EOL;
    }

    public function mergeKLists3($lists)
    {
        // 3. 使用优先队列
        // 时间复杂度， O(nlogk)
        // 空间复杂度 O(n)
        $n = count($lists);
        if ($n == 0) {
            return null;
        }

        if ($n == 1) {
            return reset($lists);
        }

        $pq = new SplPriorityQueue();
        foreach ($lists as $list) {
            while ($list !== null) {
                // 优先队列默认是从大到小
                $pq->insert($list->val, -$list->val);
                $list = $list->next;
            }
        }

        $dummyHead = $cur = new ListNode(0);
        while (!$pq->isEmpty()) {
            $cur->next = new ListNode($pq->extract());
            $cur = $cur->next;
        }
        return $dummyHead->next;
    }

    public function mergeKLists4($lists)
    {
        // 4. 两两合并
        // 时间复杂度， O(kN)
        // 空间复杂度 O(1)
        $n = count($lists);
        if ($n == 0) {
            return null;
        }

        if ($n == 1) {
            return reset($lists);
        }

        for ($i = 0; $i < $n - 1; ++$i) {
            $lists[$n - 1] = $this->mergeTwoLists($lists[$i], $lists[$n - 1]);
        }

        return $lists[$n - 1];
    }

    private function mergeTwoLists($list1, $list2)
    {
        if ($list1 === null) {
            return $list2;
        }

        if ($list2 === null) {
            return $list1;
        }

        $dummyHead = $cur = new ListNode(0);
        while ($list1 !== null && $list2 !== null) {
            if ($list1->val < $list2->val) {
                $cur->next = new ListNode($list1->val);
                $list1 = $list1->next;
            } else {
                $cur->next = new ListNode($list2->val);
                $list2 = $list2->next;
            }
            $cur = $cur->next;
        }

        if ($list1 !== null) {
            $cur->next = $list1;
        } else {
            $cur->next = $list2;
        }
        return $dummyHead->next;
    }

    public function mergeKLists5($lists)
    {
        // 5. 两两合并 + 分治
        // 时间复杂度， O(kN)
        // 空间复杂度 O(1)
        $n = count($lists);
        if ($n == 0) {
            return null;
        }

        if ($n == 1) {
            return reset($lists);
        }

        // 不好理解，画图看
        $interval = 1;
        while ($interval < $n) {
            for ($i = 0; $i < $n; $i += $interval * 2) {
                if (isset($lists[$i + $interval])) {
                    $lists[$i] = $this->mergeTwoLists($lists[$i], $lists[$i + $interval]);
                }
            }
            $interval *= 2;
        }

        return $lists[0];
    }

    public function mergeKLists($lists)
    {
        // 5. 两两合并 + 分治 + 递归
        // 时间复杂度， O(kN)
        // 空间复杂度 O(1)
        $n = count($lists);
        if ($n == 0) {
            return null;
        }

        if ($n == 1) {
            return reset($lists);
        }

        if ($n == 2) {
            return $this->mergeTwoLists($lists[0], $lists[1]);
        }

        return $this->merge1($lists, 0, $n - 1);
    }

    private function merge1(&$lists, $left, $right)
    {
        if ($left == $right) {
            return $lists[$left];
        }

        $mid = $left + floor(($right - $left) / 2);
        $l1 = $this->merge1($lists, $left, $mid);
        $l2 = $this->merge1($lists, $mid + 1, $right);
        return $this->mergeTwoLists($l1, $l2);
    }
}
// @lc code=end
