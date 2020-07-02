<?php
/*
 * @lc app=leetcode.cn id=692 lang=php
 *
 * [692] 前K个高频单词
 */

// @lc code=start
class Solution
{

    /**
     * @param String[] $words
     * @param Integer $k
     * @return String[]
     */
    function topKFrequent($words, $k)
    {
        $count = [];
        foreach ($words as $word) {
            if (isset($count[$word])) {
                $count[$word]['val']++;
            } else {
                $count[$word] = [
                    'key' => $word,
                    'val' => 1,
                ];
            }
        }

        $count = array_values($count);
        // 自定义排序
        uasort($count, function ($a, $b) {
            if ($a['val'] == $b['val']) {
                if ($a['key'] == $b['key']) {
                    return 0;
                } else {
                    return $a['key'] < $b['key'] ? -1 : 1;
                }
            }
            return $a['val'] > $b['val'] ? -1 : 1;
        });
        $ans = [];
        foreach ($count as $item) {
            $ans[] = $item['key'];
            if (count($ans) == $k) break;
        }

        return $ans;
    }
}
// @lc code=end

$words = ["i", "love", "leetcode", "i", "love", "coding"];
$k = 3;

var_dump((new Solution())->topKFrequent($words, $k));
