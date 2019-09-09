<?php


function romanToInt($string) {
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
    $arr = array_flip($arr);
    $len = strlen($string);
    $int = 0;
    for($i=0;$i<$len;$i++){
        if( isset($string[$i+1]) && ( $arr[$string[$i]] < $arr[$string[$i+1]]) ){
            $int  = $int + ($arr[$string[$i+1]] - $arr[$string[$i]]);
            $i++;
        } else {
            $int += $arr[$string[$i]];
        }

    }

    return $int;

}


$roman = "LVIII";
echo "转换前".$roman."<br>";
$int = romanToInt($roman);

echo "<br>转换结果".$int;