<?php
/*
 * @lc app=leetcode.cn id=72 lang=php
 *
 * [72] 编辑距离
 *
 * https://leetcode-cn.com/problems/edit-distance/description/
 *
 * algorithms
 * Hard (55.88%)
 * Likes:    513
 * Dislikes: 0
 * Total Accepted:    26.8K
 * Total Submissions: 47.8K
 * Testcase Example:  '"horse"\n"ros"'
 *
 * 给定两个单词 word1 和 word2，计算出将 word1 转换成 word2 所使用的最少操作数 。
 * 
 * 你可以对一个单词进行如下三种操作：
 * 
 * 
 * 插入一个字符
 * 删除一个字符
 * 替换一个字符
 * 
 * 
 * 示例 1:
 * 
 * 输入: word1 = "horse", word2 = "ros"
 * 输出: 3
 * 解释: 
 * horse -> rorse (将 'h' 替换为 'r')
 * rorse -> rose (删除 'r')
 * rose -> ros (删除 'e')
 * 
 * 
 * 示例 2:
 * 
 * 输入: word1 = "intention", word2 = "execution"
 * 输出: 5
 * 解释: 
 * intention -> inention (删除 't')
 * inention -> enention (将 'i' 替换为 'e')
 * enention -> exention (将 'n' 替换为 'x')
 * exention -> exection (将 'n' 替换为 'c')
 * exection -> execution (插入 'u')
 * 
 * 
 */

// @lc code=start
class Solution
{
    protected $word1;
    protected $word2;
    protected $memo;
    /**
     * @param String $word1
     * @param String $word2
     * @return Integer
     */
    function minDistance1($word1, $word2)
    {
        $this->word1 = $word1;
        $this->word2 = $word2;
        $l1 = strlen($word1);
        $l2 = strlen($word2);
        $this->memo = array_fill(0, $l1, array_fill(0, $l2, null));
        return $this->dp($l1 - 1, $l2 - 1);
    }

    private function dp($i, $j)
    {
        if (isset($this->memo[$i][$j])) {
            return $this->memo[$i][$j];
        }
        // 递归函数的含义：返回 $word1[0,...,1] 与 $word2[0,...,j] 的编辑距离
        // base case
        if ($i == -1) {
            return $j + 1;
        }

        if ($j == -1) {
            return $i + 1;
        }

        if ($this->word1[$i] == $this->word2[$j]) {
            $this->memo[$i][$j] = $this->dp($i - 1, $j - 1);
        } else {
            $this->memo[$i][$j] = min(
                // delete
                $this->dp($i - 1, $j),
                // insert
                $this->dp($i, $j - 1),
                // replace
                $this->dp($i - 1, $j - 1)
            ) + 1;
        }

        return $this->memo[$i][$j];
    }

    function minDistance2($word1, $word2)
    {
        // 自底向上的 dp
        $l1 = strlen($word1);
        $l2 = strlen($word2);
        $dp = array_fill(0, $l1 + 1, array_fill(0, $l2 + 1, 0));
        // base case
        for ($i = 1; $i <= $l1; ++$i) {
            $dp[$i][0] = $i;
        }
        for ($j = 1; $j <= $l2; ++$j) {
            $dp[0][$j] = $j;
        }

        for ($i = 1; $i <= $l1; ++$i) {
            for ($j = 1; $j <= $l2; ++$j) {
                // 注意下标
                if ($word1[$i - 1] == $word2[$j - 1]) {
                    $dp[$i][$j] = $dp[$i - 1][$j - 1];
                } else {
                    $dp[$i][$j] = min(
                        // delete
                        $dp[$i - 1][$j],
                        // insert
                        $dp[$i][$j - 1],
                        // replace
                        $dp[$i - 1][$j - 1]
                    ) + 1;
                }
            }
        }

        return $dp[$l1][$l2];
    }

    function minDistance($word1, $word2)
    {
        // 自底向上的 dp
        $l1 = strlen($word1);
        $l2 = strlen($word2);
        $dp = new DpNode();
        $dp->array = array_fill(0, $l1 + 1, array_fill(0, $l2 + 1, 0));
        // base case
        for ($i = 1; $i <= $l1; ++$i) {
            $dp->array[$i][0] = $i;
        }
        for ($j = 1; $j <= $l2; ++$j) {
            $dp->array[0][$j] = $j;
        }

        for ($i = 1; $i <= $l1; ++$i) {
            for ($j = 1; $j <= $l2; ++$j) {
                // 注意下标
                if ($word1[$i - 1] == $word2[$j - 1]) {
                    $dp->array[$i][$j] = $dp->array[$i - 1][$j - 1];
                    $k = $dp->array[$i][$j];
                    $dp->choice[] = sprintf('%d, %d, skip, val=%d', $i, $j, $dp->array[$i][$j]);
                    $dp->action[] = 0;
                } else {
                    $a = $dp->array[$i - 1][$j];
                    $b = $dp->array[$i][$j - 1];
                    $c = $dp->array[$i - 1][$j - 1];
                    $min = min(
                        // delete
                        $a,
                        // insert
                        $b,
                        // replace
                        $c
                    );
                    $dp->array[$i][$j] = $min + 1;
                    if ($min == $a) {
                        $dp->choice[] = sprintf('%d, %d, delete %s, val=%d', $i, $j, $word1[$i - 1], $dp->array[$i][$j]);
                        $dp->action[] = 2;
                    } elseif ($min == $b) {
                        $dp->choice[] = sprintf('%d, %d, insert %s,val=%d', $i, $j, $word2[$j - 1], $dp->array[$i][$j]);
                        $dp->action[] = 1;
                    } else {
                        $dp->choice[] = sprintf('%d, %d, replace %s as %s, val=%d', $i, $j, $word1[$i - 1], $word2[$j - 1], $dp->array[$i][$j]);
                        $dp->action[] = 3;
                    }
                }
            }
        }

        print_r($dp->action);
        // print_r($dp->choice);
        return $dp->array[$l1][$l2];
    }
}

class DpNode
{
    public $array;
    public $choice;
    // 0 代表啥都不做
    // 1 代表插入
    // 2 代表删除
    // 3 代表替换
    public $action;
    public function __construct()
    {
        $this->array  = [];
        $this->choice = [];
        $this->action = [];
    }
}
// @lc code=end
$word1 = "horse";
$word2 = "ord";
echo (new Solution())->minDistance($word1, $word2) . PHP_EOL;
