<?php
/*
 * @lc app=leetcode.cn id=78 lang=php
 *
 * [78] 子集
 *
 * https://leetcode-cn.com/problems/subsets/description/
 *
 * algorithms
 * Medium (76.07%)
 * Likes:    467
 * Dislikes: 0
 * Total Accepted:    60.7K
 * Total Submissions: 79.4K
 * Testcase Example:  '[1,2,3]'
 *
 * 给定一组不含重复元素的整数数组 nums，返回该数组所有可能的子集（幂集）。
 * 
 * 说明：解集不能包含重复的子集。
 * 
 * 示例:
 * 
 * 输入: nums = [1,2,3]
 * 输出:
 * [
 * ⁠ [3],
 * [1],
 * [2],
 * [1,2,3],
 * [1,3],
 * [2,3],
 * [1,2],
 * []
 * ]
 * 
 */

// @lc code=start
class Solution
{
    protected $result;
    /**
     * @param Integer[] $nums
     * @return Integer[][]
     */
    function subsets($nums)
    {
        // 画出递归树，答案是遍历递归树的所有节点
        $this->result[] = [];
        $this->sub($nums, [], 0);
        return $this->result;
    }

    private function sub($nums, $list, $start)
    {
        if (count($list) == count($nums)) {
            return;
        }
        for ($i = $start; $i < count($nums); ++$i) {
            $list[] = $nums[$i];
            $this->result[] = $list;
            $this->sub($nums, $list, $i + 1);
            array_pop($list);
        }
    }
}
// @lc code=end
$nums = [1, 2, 3];
print_r((new Solution())->subsets($nums));
