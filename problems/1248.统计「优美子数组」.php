<?php
/*
 * @lc app=leetcode.cn id=1248 lang=php
 *
 * [1248] 统计「优美子数组」
 *
 * https://leetcode-cn.com/problems/count-number-of-nice-subarrays/description/
 *
 * algorithms
 * Medium (46.56%)
 * Likes:    29
 * Dislikes: 0
 * Total Accepted:    3.9K
 * Total Submissions: 7.7K
 * Testcase Example:  '[1,1,2,1,1]\n3'
 *
 * 给你一个整数数组 nums 和一个整数 k。
 *
 * 如果某个 连续 子数组中恰好有 k 个奇数数字，我们就认为这个子数组是「优美子数组」。
 *
 * 请返回这个数组中「优美子数组」的数目。
 *
 *
 *
 * 示例 1：
 *
 * 输入：nums = [1,1,2,1,1], k = 3
 * 输出：2
 * 解释：包含 3 个奇数的子数组是 [1,1,2,1] 和 [1,2,1,1] 。
 *
 *
 * 示例 2：
 *
 * 输入：nums = [2,4,6], k = 1
 * 输出：0
 * 解释：数列中不包含任何奇数，所以不存在优美子数组。
 *
 *
 * 示例 3：
 *
 * 输入：nums = [2,2,2,1,2,2,1,2,2,2], k = 2
 * 输出：16
 *
 *
 *
 *
 * 提示：
 *
 *
 * 1 <= nums.length <= 50000
 * 1 <= nums[i] <= 10^5
 * 1 <= k <= nums.length
 *
 *
 */

// @lc code=start
class Solution
{
    /**
     * @param int[] $nums
     * @param int   $k
     *
     * @return int
     */
    public function numberOfSubarrays1($nums, $k)
    {
        // 记录奇数间偶数堆的情况
        $map = [];
        $index = 0;
        $evenCount = 0;
        foreach ($nums as $num) {
            if ($num & 1) {
                $map[$index] = $evenCount;
                $evenCount = 0;
                ++$index;
            } else {
                ++$evenCount;
            }
        }
        $map[$index] = $evenCount;
        $count = count($map); // 奇数总个数为 $count - 1

        $sum = 0;
        for ($i = 0; $i < $count; ++$i) {
            if ($i + $k >= $count) {
                continue;
            }
            // 两侧偶数个数的乘积
            $sum += ($map[$i] + 1) * ($map[$i + $k] + 1);
        }

        return $sum;
    }
}
// @lc code=end

$nums = [1, 1, 2, 1, 1, 2];
$nums = [2, 2, 2, 1, 2, 2, 1, 2, 2, 2];
$nums = [1, 1, 1, 1, 1, 1];
$k = 2;
echo (new Solution())->numberOfSubarrays($nums, $k) . PHP_EOL;
