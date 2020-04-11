<?php
/*
 * @lc app=leetcode.cn id=146 lang=php
 *
 * [146] LRU缓存机制
 *
 * https://leetcode-cn.com/problems/lru-cache/description/
 *
 * algorithms
 * Medium (45.01%)
 * Likes:    480
 * Dislikes: 0
 * Total Accepted:    44K
 * Total Submissions: 94K
 * Testcase Example:  '["LRUCache","put","put","get","put","get","put","get","get","get"]\n[[2],[1,1],[2,2],[1],[3,3],[2],[4,4],[1],[3],[4]]'
 *
 * 运用你所掌握的数据结构，设计和实现一个  LRU (最近最少使用) 缓存机制。它应该支持以下操作： 获取数据 get 和 写入数据 put 。
 * 
 * 获取数据 get(key) - 如果密钥 (key) 存在于缓存中，则获取密钥的值（总是正数），否则返回 -1。
 * 写入数据 put(key, value) -
 * 如果密钥不存在，则写入其数据值。当缓存容量达到上限时，它应该在写入新数据之前删除最久未使用的数据值，从而为新的数据值留出空间。
 * 
 * 进阶:
 * 
 * 你是否可以在 O(1) 时间复杂度内完成这两种操作？
 * 
 * 示例:
 * 
 */

// @lc code=start
class LRUCache
{
    public $keyTable;
    public $useTable;
    public $capacity;
    /**
     * @param Integer $capacity
     */
    function __construct($capacity)
    {
        $this->capacity = $capacity;
        $this->keyTable = [];
        $this->useTable = [];
    }

    /**
     * @param Integer $key
     * @return Integer
     */
    function get($key)
    {
        if ($this->keyTable && isset($this->keyTable[$key])) {
            $index = array_search($key, $this->useTable);
            unset($this->useTable[$index]);
            array_unshift($this->useTable, $key);
            return $this->keyTable[$key];
        }
        return -1;
    }

    /**
     * @param Integer $key
     * @param Integer $value
     * @return NULL
     */
    function put($key, $value)
    {
        // 如果密钥不存在，则写入其数据值。当缓存容量达到上限时，它应该在写入新数据之前删除最久未使用的数据值，从而为新的数据值留出空间。
        if ($this->capacity && count($this->keyTable) == $this->capacity) {
            if (!isset($this->keyTable[$key])) {
                $endKey = end($this->useTable);
                array_pop($this->useTable);
                unset($this->keyTable[$endKey]);
            }
        }

        if (isset($this->keyTable[$key])) {
            $index = array_search($key, $this->useTable);
            unset($this->useTable[$index]);
        }
        $this->keyTable[$key] = $value;
        array_unshift($this->useTable, $key);
    }
}

/**
 * Your LRUCache object will be instantiated and called as such:
 * $obj = LRUCache($capacity);
 * $ret_1 = $obj->get($key);
 * $obj->put($key, $value);
 */
// @lc code=end

// [null,null,null,1,null,-1,1]
$cache = new LRUCache(2);
$cache->put(2, 1);
$cache->put(1, 1);
echo $cache->get(2) . PHP_EOL;
$cache->put(4, 1);
echo $cache->get(1) . PHP_EOL;
echo $cache->get(2) . PHP_EOL;
