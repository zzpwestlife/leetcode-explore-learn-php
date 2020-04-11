<?php
/*
 * @lc app=leetcode.cn id=460 lang=php
 *
 * [460] LFU缓存
 *
 * https://leetcode-cn.com/problems/lfu-cache/description/
 *
 * algorithms
 * Hard (33.66%)
 * Likes:    112
 * Dislikes: 0
 * Total Accepted:    4.3K
 * Total Submissions: 11.8K
 * Testcase Example:  '["LFUCache","put","put","get","put","get","get","put","get","get","get"]\n[[2],[1,1],[2,2],[1],[3,3],[2],[3],[4,4],[1],[3],[4]]'
 *
 * 设计并实现最不经常使用（LFU）缓存的数据结构。它应该支持以下操作：get 和 put。
 * 
 * get(key) - 如果键存在于缓存中，则获取键的值（总是正数），否则返回 -1。
 * put(key, value) -
 * 如果键不存在，请设置或插入值。当缓存达到其容量时，它应该在插入新项目之前，使最不经常使用的项目无效。在此问题中，当存在平局（即两个或更多个键具有相同使用频率）时，最近最少使用的键将被去除。
 * 
 * 进阶：
 * 你是否可以在 O(1) 时间复杂度内执行两项操作？
 * 
 * 示例：
 * 
 * 
 */
// @lc code=start
class LFUCache
{
    public $minFreq;
    public $capacity;
    public $freqTable;
    public $keyTable;
    /**
     * @param Integer $capacity
     */
    function __construct($capacity)
    {
        $this->minFreq = 0;
        $this->capacity = $capacity;
        $this->freqTable = [];
        $this->keyTable = [];
    }

    /**
     * @param Integer $key
     * @return Integer
     */
    function get($key)
    {
        // 每次访问一个已经存在的元素的时候
        // 应该先把结点从当前所属的访问次数双链表里删除，
        // 然后再添加到它「下一个访问次数」的双向链表的头部；
        if ($this->capacity <= 0) return -1;
        if (!isset($this->keyTable[$key])) return -1;
        $node = $this->keyTable[$key];
        $list = $this->freqTable[$node->freq];
        if ($node->freq == $this->minFreq && count($list) == 1) $this->minFreq++;
        $index = array_search($key, $list);
        unset($this->freqTable[$node->freq][$index]);
        if (!isset($this->freqTable[$node->freq + 1])) $this->freqTable[$node->freq + 1] = [];
        array_unshift($this->freqTable[$node->freq + 1], $key);
        $node->freq++;
        $this->keyTable[$key] = $node;
        return $node->value;
    }

    /**
     * @param Integer $key
     * @param Integer $value
     * @return null
     */
    function put($key, $value)
    {
        if (isset($this->keyTable[$key])) {
            if ($this->capacity <= 0) return -1;
            $node = $this->keyTable[$key];
            $list = $this->freqTable[$node->freq];
            if ($node->freq == $this->minFreq && count($list) == 1) $this->minFreq++;
            $index = array_search($key, $list);
            unset($this->freqTable[$node->freq][$index]);
            if (!isset($this->freqTable[$node->freq + 1])) $this->freqTable[$node->freq + 1] = [];
            array_unshift($this->freqTable[$node->freq + 1], $key);
            $node->value = $value;
            $node->freq++;
            $this->keyTable[$key] = $node;
            return;
        }

        // 1、如果满了，先删除访问次数最小的的末尾结点，
        // 再删除 map 里对应的 key
        if ($this->capacity == count($this->keyTable)) {
            if (isset($this->freqTable[$this->minFreq]) && !empty($this->freqTable[$this->minFreq])) {
                $tail = array_pop($this->freqTable[$this->minFreq]);
                unset($this->keyTable[$tail]);
            }
        }

        // 2、再创建新结点放在访问次数为 1 的双向链表的前面
        $node = new LFUNode($key, $value, 1);
        $this->keyTable[$key] = $node;
        if (!isset($this->freqTable[1])) {
            $this->freqTable[1] = [];
        }
        $this->minFreq = 1;
        array_unshift($this->freqTable[1], $key);
    }

    public function dump()
    {
        echo '===============' . PHP_EOL;
        $freqTable = $this->freqTable;
        foreach ($freqTable as $freq => $list) {
            echo 'freq: ' . $freq . PHP_EOL;
            var_dump($list);
        }
        echo '===============' . PHP_EOL;
    }
}

class LFUNode
{
    public $key;
    public $value;
    public $freq;
    public function __construct($key, $value, $freq)
    {
        $this->key = $key;
        $this->value = $value;
        $this->freq = $freq;
    }
}
/**
 * Your LFUCache object will be instantiated and called as such:
 * $obj = LFUCache($capacity);
 * $ret_1 = $obj->get($key);
 * $obj->put($key, $value);
 */
// @lc code=end

error_reporting(E_ALL);
ini_set('display_errors', 1);

// $cache = new LFUCache(2);
// $cache->put(1, 1);
// $cache->put(2, 2);
// echo $cache->get(1) . PHP_EOL;
// $cache->put(3, 3);
// echo $cache->get(2) . PHP_EOL;
// echo $cache->get(3) . PHP_EOL;
// $cache->put(4, 4);
// echo $cache->get(1) . PHP_EOL;
// echo $cache->get(3) . PHP_EOL;
// echo $cache->get(4) . PHP_EOL;

// $cache = new LFUCache(1);
// $cache->put(2, 1);
// echo $cache->get(2) . PHP_EOL;
// $cache->put(3, 2);
// echo $cache->get(2) . PHP_EOL;
// echo $cache->get(3) . PHP_EOL;

// $cache = new LFUCache(2);
// $cache->put(2, 1);
// $cache->put(2, 2);
// echo $cache->get(2) . PHP_EOL;
// $cache->put(1, 1);
// $cache->put(4, 1);
// echo $cache->get(2) . PHP_EOL;

// test case 
// ["LFUCache","put","put","put","put","put","get","put","get","get","put","get","put","put","put","get","put","get","get","get","get","put","put","get","get","get","put","put","get","put","get","put","get","get","get","put","put","put","get","put","get","get","put","put","get","put","put","put","put","get","put","put","get","put","put","get","put","put","put","put","put","get","put","put","get","put","get","get","get","put","get","get","put","put","put","put","get","put","put","put","put","get","get","get","put","put","put","get","put","put","put","get","put","put","put","get","get","get","put","put","put","put","get","put","put","put","put","put","put","put"]
// [[10],[10,13],[3,17],[6,11],[10,5],[9,10],[13],[2,19],[2],[3],[5,25],[8],[9,22],[5,5],[1,30],[11],[9,12],[7],[5],[8],[9],[4,30],[9,3],[9],
// [10],[10],[6,14],[3,1],[3],[10,11],[8],[2,14],[1],[5],[4],[11,4],[12,24],[5,18],[13],[7,23],[8],[12],[3,27],[2,12],[5],[2,9],[13,4],[8,18],[1,7],[6],[9,29],[8,21],[5],[6,30],[1,12],[10],[4,15],[7,22],[11,26],[8,17],[9,29],[5],[3,4],[11,30],[12],[4,29],[3],[9],[6],[3,4],[1],[10],[3,29],[10,28],[1,20],[11,13],[3],[3,12],[3,8],[10,9],[3,26],[8],[7],[5],[13,17],[2,27],[11,15],[12],[9,19],[2,15],[3,16],[1],[12,17],[9,1],[6,19],[4],[5],[5],[8,1],[11,7],[5,2],[9,28],[1],[2,2],[7,4],[4,22],[7,24],[9,26],[13,28],[11,26]]
// expected answer
// [null,null,null,null,null,null,-1,null,19,17,null,-1,null,null,null,-1,null,-1,5,-1,12,null,null,3,5,5,null,null,1,null,-1,null,30,5,30,null,null,null,-1,null,-1,24,null,null,18,null,null,null,null,14,null,null,18,null,null,11,null,null,null,null,null,18,null,null,-1,null,4,29,30,null,12,11,null,null,null,null,29,null,null,null,null,17,-1,18,null,null,null,-1,null,null,null,20,null,null,null,29,18,18,null,null,null,null,20,null,null,null,null,null,null,null]
