<?php
/*
 * @lc app=leetcode.cn id=887 lang=php
 *
 * [887] 鸡蛋掉落
 *
 * https://leetcode-cn.com/problems/super-egg-drop/description/
 *
 * algorithms
 * Hard (20.53%)
 * Likes:    217
 * Dislikes: 0
 * Total Accepted:    10.2K
 * Total Submissions: 45.6K
 * Testcase Example:  '1\n2'
 *
 * 你将获得 K 个鸡蛋，并可以使用一栋从 1 到 N  共有 N 层楼的建筑。
 * 
 * 每个蛋的功能都是一样的，如果一个蛋碎了，你就不能再把它掉下去。
 * 
 * 你知道存在楼层 F ，满足 0 <= F <= N 任何从高于 F 的楼层落下的鸡蛋都会碎，从 F 楼层或比它低的楼层落下的鸡蛋都不会破。
 * 
 * 每次移动，你可以取一个鸡蛋（如果你有完整的鸡蛋）并把它从任一楼层 X 扔下（满足 1 <= X <= N）。
 * 
 * 你的目标是确切地知道 F 的值是多少。
 * 
 * 无论 F 的初始值如何，你确定 F 的值的最小移动次数是多少？
 * 
 * 
 * 
 * 
 * 
 * 
 * 示例 1：
 * 
 * 输入：K = 1, N = 2
 * 输出：2
 * 解释：
 * 鸡蛋从 1 楼掉落。如果它碎了，我们肯定知道 F = 0 。
 * 否则，鸡蛋从 2 楼掉落。如果它碎了，我们肯定知道 F = 1 。
 * 如果它没碎，那么我们肯定知道 F = 2 。
 * 因此，在最坏的情况下我们需要移动 2 次以确定 F 是多少。
 * 
 * 
 * 示例 2：
 * 
 * 输入：K = 2, N = 6
 * 输出：3
 * 
 * 
 * 示例 3：
 * 
 * 输入：K = 3, N = 14
 * 输出：4
 * 
 * 
 * 
 * 
 * 提示：
 * 
 * 
 * 1 <= K <= 100
 * 1 <= N <= 10000
 * 
 * 
 */

// @lc code=start
class Solution
{
    protected $memo;
    /**
     * @param Integer $K
     * @param Integer $N
     * @return Integer
     */
    function superEggDrop1($K, $N)
    {
        // dp(K, N) 数组的含义, K 个鸡蛋，N 层楼最坏情况最少需要扔几次鸡蛋
        // base case, dp(K, 0) = 0, dp(1, N) = N
        // 在第 i 层扔，有两种状态，碎：dp(K - 1, i - 1); 不碎： dp(K, N - i)
        // 状态转移方程 dp(K, N) = min(min, 这次在第 i 层扔);
        // 状态转移方程 dp(K, N) = min(min, max(dp(K - 1, i - 1), dp(K, N - i)));
        $this->memo = array_fill(0, $K + 1, array_fill(0, $N + 1, null));
        $this->dp($K, $N);

        return $this->memo[$K][$N];
    }

    private function dp($K, $N)
    {
        if ($K == 1) $this->memo[$K][$N] = $N;
        if ($N == 0) $this->memo[$K][$N] = 0;
        if (isset($this->memo[$K][$N])) return $this->memo[$K][$N];

        $min = PHP_INT_MAX;
        // for ($i = 1; $i <= $N; ++$i) {
        //     $min = min($min, max($this->dp($K - 1, $i - 1), $this->dp($K, $N - $i)) + 1);
        // }

        # 用二分搜索代替线性搜索
        $low = 1;
        $high = $N;
        while ($low <= $high) {
            $mid = floor(($low + ($high - $low) / 2));
            $broken = $this->dp($K - 1, $mid - 1);
            $notBroken = $this->dp($K, $N - $mid);
            // 取大的那个，最坏情况
            if ($broken > $notBroken) {
                $high = $mid - 1;
                $min = min($min, $broken + 1);
            } else {
                $low = $mid + 1;
                $min = min($min, $notBroken + 1);
            }
        }
        $this->memo[$K][$N] = $min;
        return $min;
    }

    function superEggDrop($K, $N)
    {
        // dp 数组含义 dp[K][m]：有 K 个鸡蛋，最多允许扔 m 次
        // 最终返回 dp[K][m] == N 时的 m 值
        // 状态转移方程 dp[K][m] = dp[K-1][m-1] + dp[K][m-1] + 1;
        $dp = array_fill(0, $K + 1, array_fill(0, $N + 1, 0));
        $m = 0;
        while ($dp[$K][$m] < $N) {
            $m++;
            for ($k = 1; $k <= $K; ++$k) {
                $dp[$k][$m] = $dp[$k - 1][$m - 1] + $dp[$k][$m - 1] + 1;
            }
        }
        return $m;
    }
}
// @lc code=end
error_reporting(E_ALL);
ini_set('display_errors', 1);
$K = 4;
$N = 5000;
echo (new Solution())->superEggDrop($K, $N) . PHP_EOL;
