<?php

/**
 * rank 优化 （基于树的高度优化）
 */
require_once './UF.php';

class UnionFind4 implements UF
{
    private $parent = [];
    private $rank = [];

    public function __construct(int $size)
    {
        // 初始化，任意两个元素都不相连
        for ($i = 0; $i < $size; ++$i) {
            $this->parent[$i] = $i;
            $this->rank[$i] = 1;
        }
    }

    public function getSize()
    {
        return count($this->parent);
    }

    // 查找元素 p 所对应的集合编号， O(h) 复杂度，h 为树的高度
    private function find(int $p)
    {
        if ($p < 0 || $p >= $this->getSize()) {
            return null;
        }
        while ($p != $this->parent[$p]) {
            $p = $this->parent[$p];
        }

        return $p;
    }

    // 查看元素 p 和元素 q 是否所属同一个集合 O(h)
    public function isConnected(int $p, int $q): bool
    {
        $pRoot = $this->find($p);
        $qRoot = $this->find($q);
        if (is_null($pRoot) || is_null($qRoot)) {
            return false;
        }
        return $pRoot == $qRoot;
    }

    // 将元素 p 和元素 q 连接 O(h)
    public function unionElements(int $p, int $q): void
    {
        $pRoot = $this->find($p);
        $qRoot = $this->find($q);
        if (is_null($pRoot) || is_null($qRoot) || $pRoot == $qRoot) {
            return;
        }

        // 防止高度过高 将 rank 低的集合合并到 rank 高的集合上
        if ($this->rank[$pRoot] < $this->rank[$qRoot]) {
            $this->parent[$pRoot] = $qRoot;
        } elseif ($this->rank[$qRoot] < $this->rank[$pRoot]) {
            $this->parent[$qRoot] = $pRoot;
        } else {
            $this->parent[$qRoot] = $pRoot;
            $this->rank[$pRoot]++;
        }
    }
}
