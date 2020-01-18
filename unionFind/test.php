<?php

function testUnion($uf, $m)
{
    $size = $uf->getSize();
    $t1 = microtime(true);
    for ($i = 0; $i < $m; $i++) {
        $p = rand(0, $size);
        $q = rand(0, $size);
        $uf->unionElements($p, $q);
    }

    $t2 = microtime(true);
    return ($t2 - $t1);
}

function testFind($uf, $m)
{
    $size = $uf->getSize();
    $t1 = microtime(true);
    for ($i = 0; $i < $m; $i++) {
        $p = rand(0, $size);
        $q = rand(0, $size);
        $uf->isConnected($p, $q);
    }
    $t2 = microtime(true);
    return ($t2 - $t1);
}

$size = 100000;
$m = 20000;

//require_once './UnionFind1.php';
//$uf1 = new UnionFind1($size);
//// O(n) 最慢，测试时注意
//echo 'uf1 union: ' . testUnion('UnionFind1', $m) . PHP_EOL;
//// O(1)
//echo 'uf1 find: ' . testFind($uf1, $m) . PHP_EOL;
//
//require_once './UnionFind2.php';
//$uf2 = new UnionFind2($size);
//// O(h)
//echo 'uf2 union: ' . testUnion($uf2, $m) . PHP_EOL;
//// O(h)
//echo 'uf2 find: ' . testFind($uf2, $m) . PHP_EOL;

require_once './UnionFind3.php';
$uf3 = new UnionFind3($size);
// O(h)
echo 'uf3 union: ' . testUnion($uf3, $m) . PHP_EOL;
// O(h)
echo 'uf3 find: ' . testFind($uf3, $m) . PHP_EOL;

require_once './UnionFind4.php';
$uf4 = new UnionFind4($size);
// O(h)
echo 'uf4 union: ' . testUnion($uf4, $m) . PHP_EOL;
// O(h)
echo 'uf4 find: ' . testFind($uf4, $m) . PHP_EOL;

require_once './UnionFind5.php';
$uf5 = new UnionFind5($size);
// O(h)
echo 'uf5 union: ' . testUnion($uf5, $m) . PHP_EOL;
// O(h)
echo 'uf5 find: ' . testFind($uf5, $m) . PHP_EOL;

require_once './UnionFind6.php';
$uf6 = new UnionFind6($size);
// O(h)
echo 'uf6 union: ' . testUnion($uf6, $m) . PHP_EOL;
// O(h)
echo 'uf6 find: ' . testFind($uf6, $m) . PHP_EOL;