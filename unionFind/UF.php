<?php

/**
 * 并查集接口
 */
interface UF
{
    public function getSize();

    public function isConnected(int $p, int $q);

    public function unionElements(int $p, int $q);
}
