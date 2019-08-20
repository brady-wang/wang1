<?php
//选择排序
//原理：每一次从待排序的数据元素中选出最小（或最大）的一个元素，存放在序列的起始位置，直到全部待排序的数据元素排完.


$arr = array_rand(range(1, 100), 10);
shuffle($arr);
$arr = [7,6,5,4,3,2,1];


function select_sort($arr)
{
    $len = count($arr);
    for ($i = 0; $i < $len - 1; $i++) { //循环len次
        $min = $i;
        print_r($i);
        for($j = $i+1;$j<$len;$j++){ //每次找到最小的min
            if($arr[$j] < $arr[$min]){
                $min = $j;
            }
        }

        if($min != $i){
            $tmp = $arr[$min];
            $arr[$min] = $arr[$i];
            $arr[$i] = $tmp;
        }
        print_r("第".($i+1)."次排序后结果".join(',',$arr).'<br>');

    }
    return $arr;

}

$res=  select_sort($arr);
echo join(',',$res);
