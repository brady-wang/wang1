<?php

/**
 * 冒泡排序
 * 数据结构----------------数组
 * 最差时间复杂度-----------O(n^2)
 * 最优时间复杂度-----------O(n)
 * 平均时间复杂度-----------O(n^2)
 * 空间复杂度---------------O(1)
 * 稳定性------------------稳定
 */


//冒泡排序
$arr = array_rand(range(1,1000),100);
shuffle($arr);

function bubble_sort($arr)
{
    $len = count($arr);

    for($i=0;$i<$len-1;$i++){
        for($j=0;$j<$len-1-$i;$j++){
            if($arr[$j] > $arr[$j+1]){
                $tmp  = $arr[$j];
                $arr[$j] = $arr[$j+1];
                $arr[$j+1] = $tmp;
            }
        }
    }
    return $arr;
}

$sortedArr = bubble_sort($arr);
echo "排序后".join(',',$sortedArr);