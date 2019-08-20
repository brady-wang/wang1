<?php
//选择排序 找到最小的下表，依次放入到最左边

$arr = [7,6,5,4,3,2,1];

function select_sort($arr)
{

    for($i = 0;$i<count($arr)-1; $i++){ //循环次数
        $min = $i; //默认最小的为第一个

        for($j = $i+1;$j<count($arr);$j++){ //$i已经排序好的下标  从他后面依次开始和min下标的比较，最小的给出来
            if($arr[$j] < $arr[$min]){
                $min = $j;
             }
        }

        //如果最小的下表不等于开始的第一个 交换
        if($min != $i){
            $tmp = $arr[$i];
            $arr[$i] = $arr[$min];
            $arr[$min] = $tmp;
        }

        print_r("第".($i+1).'次'.join(',',$arr)."<br>");

    }

    return $arr;
}

echo join(',',$arr);
echo "<br>";
$res = select_sort($arr);
echo join(',',$res);