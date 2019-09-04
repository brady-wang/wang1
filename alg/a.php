<?php

function twoSum($nums, $target)
{

    $count = count($nums);
    $res = [];
    for ($i = 0; $i <= $count - 2; $i++) {
        for ($j = $i + 1; $j <= $count - 1; $j++) {
            if (($nums[$i] + $nums[$j]) == $target) {
                $res = [$i, $j];
                break;
            }
        }
    }
    return $res;

}

$res = twoSum([3,2,4],6);
var_dump($res);