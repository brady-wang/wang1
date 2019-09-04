<?php
/**
 * Created by PhpStorm.
 * User: brady
 * Date: 2019/9/4
 * Time: 15:30
 */

function reverse($number)
{

    $max =  pow(2,31) -1;
    $min = pow(-2,31);

    $flag = true;
    if($number<0){
        $flag = false;
        $number = abs($number);
    }

    $number = (string)$number;
    $number = str_split($number);
    $len = count($number);
    $half = floor($len / 2);

    for($i = 0;$i<$half;$i++){
        $j = $len-1-$i;
      //  echo ($i."与".$j."交换"."<br>");
        $tmp = $number[$i];
        $number[$i] = $number[$j];
        $number[$j] = $tmp;
    }
    $res = $flag ?  join('',$number) : "-".join('',$number);
    $res = intval($res);
    if($res > $max - 1 || $res < $min){
        $res =  0;
    }

    return $res;
}

var_dump(reverse(1534236469));