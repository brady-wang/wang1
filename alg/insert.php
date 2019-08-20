<?php
$arr = [7,6,5,4,3,2,1];

function insertSort($arr){
    //获取需要排序的长度
    $length=count($arr);
    //假定第一个为有序的，所以从$i开始比较
    for ($i=1; $i <$length ; $i++) {


        $tmp=$arr[$i];
        print_r("待比较的值为".$tmp."<br>");
        for($j=$i-1;$j>=0;$j--){
            //若插入值比较小，则将后面的元素后移一位   ，并将值插入

            if($tmp<$arr[$j]){
                print_r($tmp."比 下标".$j." " .$arr[$j]."小");

                $arr[$j+1] = $arr[$j];
                $arr[$j] = $tmp;

                print_r("交换后".join(',',$arr)."<br>");
            }else{
                break;
            }
        }
        print_r("第".$i."次比较 结果".join(',',$arr)."<br>");
    }
    return $arr;
}

print_r("比较前".join(',',$arr)."<br>");
$res = (insertSort($arr));
echo join(',', $res);
