<?php
/**
 * Created by PhpStorm.
 * User: brady
 * Date: 2019/8/19
 * Time: 14:52
 */

/**
原理

比较相邻的元素。如果第一个比第二个大，就交换他们两个。
对每一对相邻元素做同样的工作，从开始第一对到结尾的最后一对。在这一点，最后的元素应该会是最大的数。
针对所有的元素重复以上的步骤，除了最后一个。
持续每次对越来越少的元素重复上面的步骤，直到没有任何一对数字需要比较。

 */
function bubble_sort($arr = [])
{

    if(empty($arr) || !is_array($arr)){
        return [];
    }

    $max = count($arr);
    $change_count = 0;
    $total_count = 0;
    for($i=0;$i<$max-1; $i++){
        print_r("<br>第".($i+1)."趟比较开始<br>");
        for($j=0;$j<$max-1-$i;$j++){
            if($arr[$j] > $arr[$j+1]){
                $tmp = $arr[$j];
                $arr[$j] = $arr[$j+1];
                $arr[$j+1] = $tmp;
                print_r("<br>");
                print_r(join(',',$arr));
                $change_count++;
            }
            $total_count ++;

        }
    }
    var_dump("一共比较".$change_count);
    var_dump("总共循环".$total_count);
    return $arr;
}

$list = array_rand(range(1,10000), 100); //生成3000个元素的随机数组
shuffle($list); //打乱数组的顺序

echo "<pre>";
print_r("比较前");
print_r(join(',',$list));

$t1 = microtime(true);
$res = bubble_sort($list);
$t2 = microtime(true);
echo "冒泡排序用时：".(($t2-$t1)*1000).'ms'."\n";

print_r("比较后");
print_r(join(',',$res));