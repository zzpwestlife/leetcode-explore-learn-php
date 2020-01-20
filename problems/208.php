<?php

/**
 * @comment 实现 Trie
 * @author ZouZhipeng <zzpwestlife@gmail.com>
 * @date 2020/1/20
 * @time 10:03
 * Class Trie
 * 实现一个 Trie (前缀树)，包含 insert, search, 和 startsWith 这三个操作。
 *
 * 示例:
 *
 * Trie trie = new Trie();
 *
 * trie.insert("apple");
 * trie.search("apple");   // 返回 true
 * trie.search("app");     // 返回 false
 * trie.startsWith("app"); // 返回 true
 * trie.insert("app");
 * trie.search("app");     // 返回 true
 * 说明:
 *
 * 你可以假设所有的输入都是由小写字母 a-z 构成的。
 * 保证所有输入均为非空字符串。
 */
class Trie
{
    /* root TrieNode stores the first characters */
    private $root;

    function __construct()
    {
        // empty root
        $this->root = new TrieNode(-1, []);
    }

    function insert($string, $weight = 0)
    {
        $currentNode = $this->root;
        $l = strlen($string);
        for ($i = 0; $i < $l; $i++) {
            $char = $string[$i];
            if (!$currentNode->isChild($char)) {
                $n = new TrieNode($weight, null);
                $currentNode->addChild($char, $n);
            }
            $currentNode = $currentNode->getChild($char);
        }

        // is a word
        $currentNode->weight = 1;
    }

    function search($string)
    {
        $currentNode = $this->root;
        $l = strlen($string);
        for ($i = 0; $i < $l; $i++) {
            $char = $string[$i];
            if ($currentNode->isLeaf() || !$currentNode->isChild($char)) {
                return null;
            }
            $currentNode = $currentNode->getChild($char);
        }
        return $currentNode;
    }

    function getWeight($string)
    {
        $node = $this->search($string);
        return is_null($node) ? -1 : $node->weight;
    }
}

/**
 * Your Trie object will be instantiated and called as such:
 * $obj = Trie();
 * $obj->insert($word);
 * $ret_2 = $obj->search($word);
 * $ret_3 = $obj->startsWith($prefix);
 */
class TrieNode
{
    // weight is needed for the given problem
    public $weight;
    /* TrieNode children,
    * e.g. [0 => (TrieNode object1), 2 => (TrieNode object2)]
    * where 0 stands for 'a', 1 for 'c'
    * and TrieNode objects are references to other TrieNodes.
    */
    private $children;

    function __construct($weight, $children)
    {
        $this->weight = $weight;
        $this->children = $children;
    }

    /** map lower case english letters to 0-25 */
    static function getAsciiValue($char)
    {
        return intval(ord($char)) - intval(ord('a'));
    }

    function addChild($char, $node)
    {
        if (!isset($this->children)) {
            $this->children = [];
        }
        $this->children[self::getAsciiValue($char)] = $node;
    }

    function isChild($char)
    {
        return isset($this->children[self::getAsciiValue($char)]);
    }

    function getChild($char)
    {
        return $this->children[self::getAsciiValue($char)];
    }

    function isLeaf()
    {
        return empty($this->children);
    }
}


$trie = new Trie();
$trie->insert("apple");
echo $trie->search("apple") . PHP_EOL;
echo $trie->search("app") . PHP_EOL;
//echo $trie->startsWith("app") . PHP_EOL;
//$trie->insert("app");
//$trie->search("app");     // 返回 true