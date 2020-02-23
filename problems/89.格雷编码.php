<?php
/*
 * @lc app=leetcode.cn id=89 lang=php
 *
 * [89] 格雷编码
 *
 * https://leetcode-cn.com/problems/gray-code/description/
 *
 * algorithms
 * Medium (67.36%)
 * Likes:    130
 * Dislikes: 0
 * Total Accepted:    18.6K
 * Total Submissions: 27.5K
 * Testcase Example:  '2'
 *
 * 格雷编码是一个二进制数字系统，在该系统中，两个连续的数值仅有一个位数的差异。
 * 
 * 给定一个代表编码总位数的非负整数 n，打印其格雷编码序列。格雷编码序列必须以 0 开头。
 * 
 * 示例 1:
 * 
 * 输入: 2
 * 输出: [0,1,3,2]
 * 解释:
 * 00 - 0
 * 01 - 1
 * 11 - 3
 * 10 - 2
 * 
 * 对于给定的 n，其格雷编码序列并不唯一。
 * 例如，[0,2,3,1] 也是一个有效的格雷编码序列。
 * 
 * 00 - 0
 * 10 - 2
 * 11 - 3
 * 01 - 1
 * 
 * 示例 2:
 * 
 * 输入: 0
 * 输出: [0]
 * 解释: 我们定义格雷编码序列必须以 0 开头。
 * 给定编码总位数为 n 的格雷编码序列，其长度为 2^n。当 n = 0 时，长度为 2^0 = 1。
 * 因此，当 n = 0 时，其格雷编码序列为 [0]。
 * 
 * 
 */

// @lc code=start
class Solution
{
    protected $result = [];
    /**
     * @param Integer $n
     * @return Integer[]
     */
    function grayCode($n)
    {
        // 镜像法
        if ($n == 0) return [0];
        $result = ['0', '1'];
        for ($i = 2; $i <= $n; ++$i) {
            while (strlen(reset($result)) < $i) {
                $one = array_shift($result);
                $result[] = '0' . $one;
            }

            $reverseArr = [];
            // foreach ($result as $item) {
            //     $reverseArr[] = $this->reverse($item);
            // }

            $result = array_merge($result, $reverseArr);
        }
        return $result;
        //     if ($n == 0) return [0];
        //     $this->gray($n, '');
        //     return $this->result;
        // }

        // private function gray($n, $path)
        // {
        //     if (strlen($path) == $n) {
        //         // $this->result[] = bindec($path);
        //         $this->result[] = $path;
        //         return;
        //     }

        //     // 最后一位是 1 的时候需要特殊处理
        //     if ($path && substr($path, 0, -1) == '1') {
        //         $this->gray($n, $path . '1');
        //         $this->gray($n, $path . '0');
        //     } else {
        //         $this->gray($n, $path . '0');
        //         $this->gray($n, $path . '1');
        //     }
        // }
    }

    private function reverse($str)
    {
        $return = '';
        for ($i = 0; $i < strlen($str); ++$i) {
            $num = substr($str, $i, 1);
            if ($num == '0') {
                $return .= '1';
            } else {
                $return .= '0';
            }
        }

        return $return;
    }
}
// @lc code=end

error_reporting(E_ALL);
ini_set('display_errors', 1);
$n = 2;
print_r((new Solution())->grayCode($n));
echo PHP_EOL;
