<?php

/**
 * 使用数组模拟实现并查集 Quick Find
 */
require_once 'UF.php';

class UnionFind1 implements UF
{
    private $ids = [];

    public function __construct(int $size)
    {
        // 初始化，任意两个元素都不相连
        for ($i = 0; $i < $size; ++$i) {
            $this->ids[$i] = $i;
        }
    }

    public function getSize()
    {
        return count($this->ids);
    }

    // 查找元素 p 所对应的集合编号 O(1)
    private function find(int $p)
    {
        if ($p < 0 || $p >= $this->getSize()) {
            return null;
        }
        return $this->ids[$p];
    }

    // 查看元素 p 和元素 q 是否所属同一个集合 O(1)
    public function isConnected(int $p, int $q): bool
    {
        $pId = $this->find($p);
        $qId = $this->find($q);
        if (is_null($pId) || is_null($qId)) {
            return false;
        }
        return $pId == $qId;
    }

    // 将元素 p 和元素 q 连接 O(n)
    public function unionElements(int $p, int $q)
    {
        $pId = $this->find($p);
        $qId = $this->find($q);
        if (is_null($pId) || is_null($qId) || $pId == $qId) {
            return;
        }
        for ($i = 0; $i < $this->getSize(); $i++) {
            if ($this->ids[$i] == $pId) {
                $this->ids[$i] == $qId;
            }
        }
    }
}
