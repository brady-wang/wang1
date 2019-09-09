<?php

/*
 I             1
V             5
X             10
L             50
C             100
D             500
M             1000
 */
function intToRoman($num) {

    if($num > 3999 || $num <= 0){
        return false;
    }

    $arr = [
        '1000' => 'M',
        '900'=>'CM',
        '500' => 'D',
        '400'=>'CD',
        '100' => 'C',
        '90'=>'XC',
        '50' => 'L',
        '40'=>'XL',
        '10' => 'X',
        '9'=>'IX',
        '5' => 'V',
        '4'=>'IV',
        '1' => 'I',
    ];
    $countArr = [];
    foreach($arr as $k=>$v){
        if($k <= $num){
            $countArr[$k] = bcdiv($num,$k);
            $num = bcmod($num,$k);
            if($num == 0){
                break;
            }
        }
    }

    $str = '';
    krsort($countArr);
    foreach($countArr as $key=>$value){
        echo $key."有".$value."个<br>";
        $str .= str_repeat($arr[$key],$value);
    }

    return $str;

}

$num = 58;
echo "输入数字".$num."<br>";
echo intToRoman($num);