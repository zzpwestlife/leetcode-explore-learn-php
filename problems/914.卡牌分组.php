<?php
/*
 * @lc app=leetcode.cn id=914 lang=php
 *
 * [914] 卡牌分组
 *
 * https://leetcode-cn.com/problems/x-of-a-kind-in-a-deck-of-cards/description/
 *
 * algorithms
 * Easy (32.64%)
 * Likes:    113
 * Dislikes: 0
 * Total Accepted:    20K
 * Total Submissions: 54.2K
 * Testcase Example:  '[1,2,3,4,4,3,2,1]'
 *
 * 给定一副牌，每张牌上都写着一个整数。
 * 
 * 此时，你需要选定一个数字 X，使我们可以将整副牌按下述规则分成 1 组或更多组：
 * 
 * 
 * 每组都有 X 张牌。
 * 组内所有的牌上都写着相同的整数。
 * 
 * 
 * 仅当你可选的 X >= 2 时返回 true。
 * 
 * 
 * 
 * 示例 1：
 * 
 * 输入：[1,2,3,4,4,3,2,1]
 * 输出：true
 * 解释：可行的分组是 [1,1]，[2,2]，[3,3]，[4,4]
 * 
 * 
 * 示例 2：
 * 
 * 输入：[1,1,1,2,2,2,3,3]
 * 输出：false
 * 解释：没有满足要求的分组。
 * 
 * 
 * 示例 3：
 * 
 * 输入：[1]
 * 输出：false
 * 解释：没有满足要求的分组。
 * 
 * 
 * 示例 4：
 * 
 * 输入：[1,1]
 * 输出：true
 * 解释：可行的分组是 [1,1]
 * 
 * 
 * 示例 5：
 * 
 * 输入：[1,1,2,2,2,2]
 * 输出：true
 * 解释：可行的分组是 [1,1]，[2,2]，[2,2]
 * 
 * 
 * 
 * 提示：
 * 
 * 
 * 1 <= deck.length <= 10000
 * 0 <= deck[i] < 10000
 * 
 * 
 * 
 * 
 */

// @lc code=start
class Solution
{

    /**
     * @param Integer[] $deck
     * @return Boolean
     */
    function hasGroupsSizeX1($deck)
    {
        $n = count($deck);
        if ($n <= 1) return false;
        sort($deck);
        for ($i = 2; $i <= $n; ++$i) {
            if ($n % $i == 0) {
                $groupCount = $n / $i;
                for ($j = 0; $j < $groupCount; ++$j) {
                    $g = array_slice($deck, $j * $i, $i);
                    if (array_sum($g) != end($g) * $i) {
                        continue 2;
                    }
                    if ($j == $groupCount - 1) return true;
                }
            }
        }
        return false;
    }

    public function hasGroupsSizeX($deck)
    {
        $count = array_count_values($deck);
        // 迭代求多个数的最大公约数
        $x = 0;
        foreach ($count as $n) {
            $x = $this->gcd($x, $n);
            if ($x == 1) return false;
        }

        return $x >= 2;
    }

    private function gcd($a, $b)
    {
        return $b == 0 ? $a : $this->gcd($b, $a % $b);
    }
}
// @lc code=end

error_reporting(E_ALL);
ini_set('display_errors', 1);
$deck = [1, 2, 3, 4, 4, 3, 2, 1];
$deck = [1, 1, 1, 2, 2, 2, 3, 3];
// $deck = [0, 0, 0, 0, 0, 1, 1, 1, 1, 1];
// $deck = [1, 1, 1, 2, 2, 2, 3, 3];
var_dump((new Solution())->hasGroupsSizeX($deck));
