<?php

/**
 * @comment 1162. 地图分析
 * @author ZouZhipeng <zzpwestlife@gmail.com>
 * @date 2020/1/6
 * @time 15:40
 * Class Solution1162
 * 你现在手里有一份大小为 N x N 的『地图』（网格） grid，上面的每个『区域』（单元格）都用 0 和 1 标记好了。其中 0 代表海洋，1 代表陆地，你知道距离陆地区域最远的海洋区域是是哪一个吗？请返回该海洋区域到离它最近的陆地区域的距离。
 *
 * 我们这里说的距离是『曼哈顿距离』（ Manhattan Distance）：(x0, y0) 和 (x1, y1) 这两个区域之间的距离是 |x0 - x1| + |y0 - y1| 。
 *
 * 如果我们的地图上只有陆地或者海洋，请返回 -1。
 */
class Solution1162
{
    /**
     * @param Integer[][] $grid
     * @return Integer
     */
    function maxDistance($grid)
    {
        if (empty($grid)) {
            return -1;
        }
        // 思路：1、找到所有的陆地 2、从陆地逐渐往海水扩展
        // 首先记录所有陆地的坐标
        $rowCount = count($grid);
        $columnCount = count($grid[0]);
        $land = [];
    }
}


$grid = [[1, 0, 1], [0, 0, 0], [1, 0, 1]];
$grid = [[1, 0, 0], [0, 0, 0], [0, 0, 0]];
echo (new Solution1162())->maxDistance($grid) . PHP_EOL;