<?php
// +----------------------------------------------------------------------
// | JuhePHP [ NO ZUO NO DIE ]
// +----------------------------------------------------------------------
// | Copyright (c) 2010-2015 http://juhe.cn All rights reserved.
// +----------------------------------------------------------------------
// | Author: Juhedata <info@juhe.cn-->
// +----------------------------------------------------------------------

//----------------------------------
// 聚合数据-手机号码归属地查询API
//----------------------------------
$apiurl = 'http://apis.juhe.cn/mobile/get';
$phone = $_GET['phone'];
$params = array(
'key' => '38c95b729ad71a81f2394364a8c431c7', //您申请的手机号码归属地查询接口的appkey
'phone' => $phone //要查询的手机号码
);

$paramsString = http_build_query($params);

$content = @file_get_contents($apiurl.'?'.$paramsString);
$result = json_decode($content,true);
print_r($result);
if($result['error_code'] == '0'){
/*
"province":"浙江",
"city":"杭州",
"areacode":"0571",
"zip":"310000",
"company":"中国移动",
"card":"移动动感地带卡"
*/
echo "省份：".$result['result']['province']."\r\n";
echo "城市：".$result['result']['city']."\r\n";

}else{
echo "调用手机归属地查询接口返回错误：查询手机号码:(".$phone.")"." 错误原因:".$result['reason']."(".$result['error_code'].")"."-resultcode:(".$result['resultcode'].")";
}