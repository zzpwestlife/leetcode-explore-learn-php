<?php
/*
 * @lc app=leetcode.cn id=1162 lang=php
 *
 * [1162] 地图分析
 *
 * https://leetcode-cn.com/problems/as-far-from-land-as-possible/description/
 *
 * algorithms
 * Medium (37.25%)
 * Likes:    57
 * Dislikes: 0
 * Total Accepted:    13.5K
 * Total Submissions: 30.9K
 * Testcase Example:  '[[1,0,1],[0,0,0],[1,0,1]]'
 *
 * 你现在手里有一份大小为 N x N 的『地图』（网格） grid，上面的每个『区域』（单元格）都用 0 和 1 标记好了。其中 0 代表海洋，1
 * 代表陆地，你知道距离陆地区域最远的海洋区域是是哪一个吗？请返回该海洋区域到离它最近的陆地区域的距离。
 * 
 * 我们这里说的距离是『曼哈顿距离』（ Manhattan Distance）：(x0, y0) 和 (x1, y1) 这两个区域之间的距离是 |x0 -
 * x1| + |y0 - y1| 。
 * 
 * 如果我们的地图上只有陆地或者海洋，请返回 -1。
 * 
 * 
 * 
 * 示例 1：
 * 
 * 
 * 
 * 输入：[[1,0,1],[0,0,0],[1,0,1]]
 * 输出：2
 * 解释： 
 * 海洋区域 (1, 1) 和所有陆地区域之间的距离都达到最大，最大距离为 2。
 * 
 * 
 * 示例 2：
 * 
 * 
 * 
 * 输入：[[1,0,0],[0,0,0],[0,0,0]]
 * 输出：4
 * 解释： 
 * 海洋区域 (2, 2) 和所有陆地区域之间的距离都达到最大，最大距离为 4。
 * 
 * 
 * 
 * 
 * 提示：
 * 
 * 
 * 1 <= grid.length == grid[0].length <= 100
 * grid[i][j] 不是 0 就是 1
 * 
 * 
 */

// @lc code=start
class Solution
{

    public function maxDistance($grid)
    {
        $directions = [[-1, 0], [0, -1], [1, 0], [0, 1]];
        $queue = new SplQueue();
        $m = count($grid);
        if ($m == 0) return -1;
        $n = count($grid[0]);
        // 先把所有的陆地都入队。
        for ($i = 0; $i < $m; $i++) {
            for ($j = 0; $j < $n; $j++) {
                if ($grid[$i][$j] == 1) {
                    $queue->enqueue($i * $m + $j);
                }
            }
        }

        // 从各个陆地开始，一圈一圈的遍历海洋，最后遍历到的海洋就是离陆地最远的海洋。
        $hasOcean = false;
        $point = null;
        while (!$queue->isEmpty()) {
            $point = $queue->dequeue();
            $x = floor($point / $m);
            $y = $point % $m;
            // 取出队列的元素，将其四周的海洋入队。
            for ($i = 0; $i < 4; $i++) {
                $newX = $x + $directions[$i][0];
                $newY = $y + $directions[$i][1];
                if ($newX < 0 || $newX >= $m || $newY < 0 || $newY >= $n || $grid[$newX][$newY] != 0) {
                    continue;
                }
                $grid[$newX][$newY] = $grid[$x][$y] + 1; // 这里我直接修改了原数组，因此就不需要额外的数组来标志是否访问
                $hasOcean = true;
                $queue->enqueue($newX * $m + $newY);
            }
        }

        // 没有陆地或者没有海洋，返回-1。
        if ($point === null || !$hasOcean) {
            return -1;
        }

        // 返回最后一次遍历到的海洋的距离。
        $x = floor($point / $m);
        $y = floor($point % $m);
        return $grid[$x][$y] - 1;
    }
}
// @lc code=end
$grid = [[0, 0, 1, 1, 1], [0, 1, 1, 0, 0], [0, 0, 1, 1, 0], [1, 0, 0, 0, 0], [1, 1, 0, 0, 1]];
echo (new Solution())->maxDistance($grid) . PHP_EOL;
