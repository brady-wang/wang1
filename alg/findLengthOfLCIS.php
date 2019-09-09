<?php
    //给定一个未经排序的整数数组，找到最长且连续的的递增序列。
    function findLengthOfLCIS($arr) {
        $max = 1;
        $maxArr = [];
        $len = count($arr);
        if($len == 1){
            return 1;
        }
        if($len == 0){
            return 0;
        }

        for($i=0;$i<$len-1;$i++){
            $tmp = [];
            $tmp[] = $arr[$i];
            for($j = $i+1;$j<$len;$j++){
                $length = count($tmp);
                if($arr[$j] >  $tmp[$length-1]){
                    $tmp[] = $arr[$j];
                } else {
                    $max = count($tmp);
                    $maxArr[] = $max;
                    break;
                }
            }
            if($j == $len){
                $max = count($tmp);
                $maxArr[] = $max;
            }

            echo "第".($i)."次循环 发现最大连续为".$max."连续数组为".join('',$tmp)."<br>";
        }

        return max($maxArr);

    }

function findLengthOfLCISs($nums) {
    $res = 1;
    $temp = 1;
    $len = count($nums);
    if($len == 0){
        return 0;
    }
    for ($i=1;$i<$len;$i++){
        if($nums[$i] > $nums[$i-1]){
            $temp += 1;
            //echo "第".($i)."次  发现".$nums[$i]."大于".$nums[$i-1]." temp为".$temp."<br>";
        }else{
            $res = max($res,$temp);
            //echo "第".($i)."次  发现".$nums[$i]."不大于".$nums[$i-1]." res为".$res." 重置temp为1<br>";
            $temp = 1;
        }
    }


    $res = max($res,$temp);
    return $res;
}




$arr = [1,3,2,3,4,5];
echo "数组".join('',$arr)."<br>";
$res = findLengthOfLCISs($arr);
var_dump($res);