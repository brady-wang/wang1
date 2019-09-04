<?php

/*

 给定一个字符串，请你找出其中不含有重复字符的 最长子串 的长度。

示例 1:

输入: "abcabcbb"
输出: 3
解释: 因为无重复字符的最长子串是 "abc"，所以其长度为 3。
示例 2:

输入: "bbbbb"
输出: 1
解释: 因为无重复字符的最长子串是 "b"，所以其长度为 1。
示例 3:

输入: "pwwkew"
输出: 3
解释: 因为无重复字符的最长子串是 "wke"，所以其长度为 3。
     请注意，你的答案必须是 子串 的长度，"pwke" 是一个子序列，不是子串。

 */

//从第一个到len-1一个 依次与后面字符组成字符串 发现重复中断 返回
function lengthOfLongestSubstring($string) {

    $maxlen = 1;

    if(empty($string)){
        return 0;
    }
    $len = strlen($string);
    if($len == 1){
        return 1;
    }

    for($i=0;$i<$len-1;$i++){
        $tmp = [];
        $tmp[] = $string[$i];
        for($j = $i+1;$j< $len;$j++){
            if(!in_array($string[$j],$tmp)){
                $tmp[] = $string[$j];
            } else {
                break;
            }
        }

        $maxlen = max($maxlen,count($tmp));
        //echo "第".($i+1)."次循环 最长字符串长度".count($tmp)."字符串为".join('',$tmp)."<br>";
        unset($tmp);
    }
    return $maxlen;
}

$string = "abd3werwerc";
//lengthOfLongestSubstring($string);
var_dump(lengthOfLongestSubstring($string));