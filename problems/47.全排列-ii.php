<?php
/*
 * @lc app=leetcode.cn id=47 lang=php
 *
 * [47] 全排列 II
 *
 * https://leetcode-cn.com/problems/permutations-ii/description/
 *
 * algorithms
 * Medium (56.61%)
 * Likes:    223
 * Dislikes: 0
 * Total Accepted:    38.4K
 * Total Submissions: 67.5K
 * Testcase Example:  '[1,1,2]'
 *
 * 给定一个可包含重复数字的序列，返回所有不重复的全排列。
 * 
 * 示例:
 * 
 * 输入: [1,1,2]
 * 输出:
 * [
 * ⁠ [1,1,2],
 * ⁠ [1,2,1],
 * ⁠ [2,1,1]
 * ]
 * 
 */

// @lc code=start
class Solution
{
    protected $result = [];
    /**
     * @param Integer[] $nums
     * @return Integer[][]
     */
    function permuteUnique($nums)
    {
        if (empty($nums)) return [];
        sort($nums);
        $visited = array_fill(0, count($nums), false);
        $this->helper($nums, [], $visited);
        return $this->result;
    }

    private function helper($nums, $path, $visited)
    {
        if (count($path) == count($nums)) {
            $this->result[] = $path;
            return;
        }
        for ($i = 0; $i < count($nums); ++$i) {
            // 第一次剪枝，去掉已经访问过的
            if ($visited[$i]) continue;
            // 第二次剪枝，该元素与前一个元素相等，且前一个元素访问过
            if ($i > 0 && $visited[$i - 1] && $nums[$i] == $nums[$i - 1]) continue;
            $path[] = $nums[$i];
            $visited[$i] = true;
            $this->helper($nums, $path, $visited);
            array_pop($path);
            $visited[$i] = false;
        }
    }
}
// @lc code=end
$nums = [1, 1, 2];
$result = (new Solution())->permuteUnique($nums);
echo PHP_EOL;
