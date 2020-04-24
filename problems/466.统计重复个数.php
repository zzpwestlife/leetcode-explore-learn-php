<?php
/*
 * @lc app=leetcode.cn id=466 lang=php
 *
 * [466] 统计重复个数
 *
 * https://leetcode-cn.com/problems/count-the-repetitions/description/
 *
 * algorithms
 * Hard (29.83%)
 * Likes:    40
 * Dislikes: 0
 * Total Accepted:    1.6K
 * Total Submissions: 5.2K
 * Testcase Example:  '"acb"\n4\n"ab"\n2'
 *
 * 由 n 个连接的字符串 s 组成字符串 S，记作 S = [s,n]。例如，["abc",3]=“abcabcabc”。
 * 
 * 如果我们可以从 s2 中删除某些字符使其变为 s1，则称字符串 s1 可以从字符串 s2 获得。例如，根据定义，"abc" 可以从 “abdbec”
 * 获得，但不能从 “acbbe” 获得。
 * 
 * 现在给你两个非空字符串 s1 和 s2（每个最多 100 个字符长）和两个整数 0 ≤ n1 ≤ 10^6 和 1 ≤ n2 ≤
 * 10^6。现在考虑字符串 S1 和 S2，其中 S1=[s1,n1] 、S2=[s2,n2] 。
 * 
 * 请你找出一个可以满足使[S2,M] 从 S1 获得的最大整数 M 。
 * 
 * 
 * 
 * 示例：
 * 
 * 输入：
 * s1 ="acb",n1 = 4
 * s2 ="ab",n2 = 2
 * 
 * 返回：
 * 2
 * 
 * 
 */

// @lc code=start
class Solution
{
    /**
     * @param String $s1
     * @param Integer $n1
     * @param String $s2
     * @param Integer $n2
     * @return Integer
     */
    function getMaxRepetitions($s1, $n1, $s2, $n2)
    {
        $len1 = strlen($s1);
        $len2 = strlen($s2);
        if ($len1 == 0 || $len2 == 0 || $n1 == 0 || $n2 == 0) return 0;
        $index = $count = 0;
        $indexr = $countr = array_fill(0, $len2, 0);
        for ($i = 0; $i < $n1; ++$i) {
            for ($j = 0; $j < $len1; ++$j) {
                if ($s1[$j] == $s2[$index]) {
                    if ($index == $len2 - 1) {
                        $count++;
                        $index = 0;
                    } else {
                        $index++;
                    }
                }
            }

            $countr[$i] = $count;
            $indexr[$i] = $index;
            for ($k = 0; $k < $i; ++$k) {
                if ($indexr[$k] == $index) {
                    $prevCount = $countr[$k];
                    $patternCount = floor(($n1 - 1 - $k) / ($i - $k)) * ($countr[$i] - $countr[$k]);
                    $remainCount = $countr[$k + ($n1 - 1 - $k) % ($i - $k)] - $countr[$k];
                    return floor(($prevCount + $patternCount + $remainCount) / $n2);
                }
            }
        }

        return floor($countr[$n1 - 1] / $n2);
    }
}
// @lc code=end
