<?php
//鸡尾酒排序
/**
 * 鸡尾酒排序也就是定向冒泡排序, 鸡尾酒搅拌排序, 搅拌排序 (也可以视作选择排序的一种变形), 涟漪排序, 来回排序 or 快乐小时排序, 是冒泡排序的一种变形。此演算法与冒泡排序的不同处在于排序时是以双向在序列中进行排序。
 *
 * 原理：数组中的数字本是无规律的排放，先找到最小的数字，把他放到第一位，然后找到最大的数字放到最后一位。然后再找到第二小的数字放到第二位，再找到第二大的数字放到倒数第二位。以此类推，直到完成排序。
 */
$arr = array_rand(range(1, 100), 10);
shuffle($arr);
echo join(',', $arr);

function cocktail($arr)
{
    $left = 0; //左边界
    $right = count($arr) - 1; //右边界
    while ($left < $right) {
        for ($i = $left; $i < $right; $i++) { //找到最大的放到最右边
            if ($arr[$i] > $arr[$i + 1]) {
                $tmp = $arr[$i];
                $arr[$i] = $arr[$i + 1];
                $arr[$i + 1] = $tmp;
            }
        }
        $right--; //右边界自减


        for ($j = $right; $j > $left; $j--) { //从右向左，找到最小的放到最左边
            if ($arr[$j] < $arr[$j - 1]) {
                $tmp1 = $arr[$j];
                $arr[$j] = $arr[$j - 1];
                $arr[$j - 1] = $tmp1;
            }
        }
        $left++;

    }

    return $arr;

}

$res = cocktail($arr);
echo "排序后";
echo join(',', $res);