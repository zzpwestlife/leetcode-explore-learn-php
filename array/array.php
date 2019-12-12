<?php

class SimpleArray
{
    public function __construct()
    {

    }

    public function test()
    {
        // 1. Initialize
        $a0 = new SplFixedArray(5);
        $a1 = [1, 2, 3];

        // 2. get length
        echo 'the size of a0 is: ' . count($a0) . PHP_EOL;
        echo 'the size of a1 is: ' . count($a1) . PHP_EOL;

        // 3. access element
        echo 'the first element of a1 is: ' . $a1[0] . PHP_EOL;

        // 4. iterate all elements
        echo 'version 1 - the contents of a1 are: ';
        for ($i = 0; $i < count($a1); ++$i) {
            echo ' ' . $a1[$i];
        }
        echo PHP_EOL;

        echo 'version2 - the contents of a1 are: ';
        foreach ($a1 as $value) {
            echo ' ' . $value;
        }
        echo PHP_EOL;

        // 5. modify element
        $a1[0] = 4;
        echo implode(',', $a1) . PHP_EOL;
        sort($a1);
        echo implode(',', $a1) . PHP_EOL;
    }
}

(new SimpleArray())->test();


