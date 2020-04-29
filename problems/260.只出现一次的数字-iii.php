<?php
/*
 * @lc app=leetcode.cn id=260 lang=php
 *
 * [260] 只出现一次的数字 III
 *
 * https://leetcode-cn.com/problems/single-number-iii/description/
 *
 * algorithms
 * Medium (69.16%)
 * Likes:    210
 * Dislikes: 0
 * Total Accepted:    19K
 * Total Submissions: 26.5K
 * Testcase Example:  '[1,2,1,3,2,5]'
 *
 * 给定一个整数数组 nums，其中恰好有两个元素只出现一次，其余所有元素均出现两次。 找出只出现一次的那两个元素。
 * 
 * 示例 :
 * 
 * 输入: [1,2,1,3,2,5]
 * 输出: [3,5]
 * 
 * 注意：
 * 
 * 
 * 结果输出的顺序并不重要，对于上面的例子， [5, 3] 也是正确答案。
 * 你的算法应该具有线性时间复杂度。你能否仅使用常数空间复杂度来实现？
 * 
 * 
 */

// @lc code=start
class Solution
{

    /**
     * @param Integer[] $nums
     * @return Integer[]
     */
    function singleNumbers($nums)
    {
        $s = 0;
        // 第一步：所有数异或，所有数异或之后的值就是两个只出现一次的数a,b异或后的值s
        foreach ($nums as $num) $s ^= $num;
        // 用s & (-s) 可以得出s最低位(也就是最右边)为1的bit位(这个操作不太会事先知道)对应的数k
        $k = $s & (-$s);
        $ans = array_fill(0, 2, 0);
        // 我们得到s&(-s)之后在对所有数进行&操作的话，就意味着可以将a和b区分在0和1的两个组，至于其他的数字如果相同的数字自然会分到一个组
        foreach ($nums as $num) {
            // 运算符的优先级很坑
            if (($num & $k) == 0) {
                $ans[0] ^= $num;
            } else {
                $ans[1] ^= $num;
            }
        }

        return $ans;
    }
}
// @lc code=end

$nums = [1, 2, 1, 3, 2, 5];
var_dump((new Solution())->singleNumbers($nums));
