<?php
/**
 * 鸡尾酒排序
 * 数据结构----------------数组
 * 最差时间复杂度-----------O(n^2)
 * 最优时间复杂度-----------O(n)
 * 平均时间复杂度-----------O(n^2)
 * 空间复杂度--------------O(1)
 * 稳定性-----------------稳定
 */

$arr = [1, 3, 34, 2, 32, 2, 78, -43, 53, -35, 0];

function CocktailSort($arr)
{
    $left = 0;// 定义左边界
    $right = count($arr) - 1;// 定义右边界
    $count = 0;
    while ($left < $right) {
        for ($i = $left; $i < $right; $i++) {// 从左向右，将最大元素放在后面
            if ($arr[$i] > $arr[$i + 1]) {
                $t = $arr[$i];
                $arr[$i] = $arr[$i + 1];
                $arr[$i + 1] = $t;
            }
        }
        $right--; // 右边界缩小
        for ($i = $right; $i > $left; $i--) {// 从右向左，将最小元素放在前面
            if ($arr[$i - 1] > $arr[$i]) {
                $t = $arr[$i - 1];
                $arr[$i - 1] = $arr[$i];
                $arr[$i] = $t;
            }
        }
        $left++;// 左边界增大

        print("第" . ($count + 1) . "次排序后" . join(',', $arr) . '<br>');
    }
    return $arr;
}

$res = (CocktailSort($arr));
echo join(',', $res);
