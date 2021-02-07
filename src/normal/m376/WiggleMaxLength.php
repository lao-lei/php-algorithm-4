<?php


namespace Algorithm\normal\m376;

/**
 * 摆动序列
 *
 * 如果连续数字之间的差严格地在正数和负数之间交替，则数字序列称为摆动序列。
 * 第一个差（如果存在的话）可能是正数或负数。少于两个元素的序列也是摆动序列。
 *
 * 例如， [1,7,4,9,2,5] 是一个摆动序列，因为差值 (6,-3,5,-7,3) 是正负交替出现的。
 * 相反, [1,4,7,2,5] 和 [1,7,4,5,5] 不是摆动序列，第一个序列是因为它的前两个差值都是正数，第二个序列是因为它的最后一个差值为零。
 *
 * 给定一个整数序列，返回作为摆动序列的最长子序列的长度。
 * 通过从原始序列中删除一些（也可以不删除）元素来获得子序列，剩下的元素保持其原始顺序。
 *
 * Class WiggleMaxLength
 * @package Algorithm\normal\m376
 */
class WiggleMaxLength
{
    /**
     * @param Integer[] $nums
     * @return Integer
     */
    public static function handle(array $nums): int
    {
        $count = count($nums);
        if ($count <= 1) {
            return $count;
        }
        $flag = 0; // 0未知， 1升， 2降
        $result = 1;
        for ($i = 1; $i < $count; $i++) {
            if ($nums[$i] > $nums[$i - 1] && $flag != 1) {
                $result++;
                $flag = 1;
            } elseif ($nums[$i] < $nums[$i - 1] && $flag != 2) {
                $result++;
                $flag = 2;
            }
        }
        return $result;
    }
}