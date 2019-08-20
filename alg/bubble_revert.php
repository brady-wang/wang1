<?php

#冒泡倒着来
function bubble_sort($arr = [])
{

    if (empty($arr) || !is_array($arr)) {
        return [];
    }

    $max = count($arr);
    $change_count = 0;
    $total_count = 0;
    for ($i = 0; $i < $max - 1; $i++) {
        print_r("<br>第" . ($i + 1) . "趟比较开始<br>");
        //从最后一个 $max-1 开始向左排序，只要比左边的小，就交换，每次循环后最左边的是最小的，不必参与下次，所以循环次数 $max-1-$i
        for ($j = $max - 1; $j >= 1; $j--) {
            var_dump($arr[$j]);
            var_dump($arr[$j - 1]);
            if ($arr[$j] < $arr[$j - 1]) {
                $tmp = $arr[$j];
                $arr[$j] = $arr[$j - 1];
                $arr[$j - 1] = $tmp;
                print_r("<br>");
                print_r(join(',', $arr));
                $change_count++;
            }
            $total_count++;

        }
    }
    var_dump("一共比较" . $change_count);
    var_dump("总共循环" . $total_count);
    return $arr;

}

$list = [4, 3, 2, 1];

echo "<pre>";
print_r("比较前");
print_r(join(',', $list));

$res = bubble_sort($list);

print_r("比较后");
print_r(join(',', $res));