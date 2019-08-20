<?php
//选择排序
//原理：每一次从待排序的数据元素中选出最小（或最大）的一个元素，存放在序列的起始位置，直到全部待排序的数据元素排完.


$arr = array_rand(range(1, 100), 10);
shuffle($arr);

function select_sort($arr)
{
    $max = count($arr) - 1;

    for ($i = 0; $i < $max; $i++) {

    }
}
