<?php

require_once "./vendor/autoload.php";

use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Message\AMQPMessage;


$conf = [
    'host' => '192.168.33.50',
    'port' => 5672,
    'user' => 'wang',
    'pwd' => 'wang',
    'vhost' => '/queue_crm',
];

//$conf = [
//    'host' => '192.168.11.101',
//    'port' => 5672,
//    'user' => 'dgmq-sz-crm',
//    'pwd' => '123456',
//    'vhost' => '/queue_crm',
//];

$exchangeName = 'queue_crm_staff_test_brady'; //交换机名
$queueName = 'queue_crm_staff_test_brady'; //队列名称
$routingKey = ''; //路由关键字(也可以省略)

$conn = new AMQPStreamConnection( //建立生产者与mq之间的连接
    $conf['host'], $conf['port'], $conf['user'], $conf['pwd'], $conf['vhost']
);
$channel = $conn->channel(); //在已连接基础上建立生产者与mq之间的通道


$channel->exchange_declare($exchangeName, 'direct', false, true, false); //声明初始化交换机
$channel->queue_declare($queueName, false, true, false, false); //声明初始化一条队列
$channel->queue_bind($queueName, $exchangeName, $routingKey); //将队列与某个交换机进行绑定，并使用路由关键字


$array = [1,2,3,4];


for($i=1;$i<1000;$i++){
    $msgBody1 = '{
                    "model": "organization",
                    "type": ' . $array[array_rand($array)] . ',
                "data": {
                "id": ' . $i . ',
                        "name": "技术中心'.$i.'",
                        "pid": "'.$i.'",
                        "area_code": ' . random_int(1000, 9999) . '
                }
                }';
    $msgBody = '{
                "model": "job",
                "type": "'.$array[array_rand($array)].'",
                "data":
                    {
                        "id": "'.$i.'",
                        "name": "天河区店导'.$i.'",
                        "is_guide": "1",
                        "is_part": "0",
                        "guide_code": "CountyGuide",
                        "organization_id": "82",
                        "pid": "110",
                        "area_code": "'.random_int(1000, 9999).'"
                    }
            }';
    $msg = new AMQPMessage($msgBody, ['content_type' => 'text/plain', 'delivery_mode' => 2]); //生成消息
    $msg1 = new AMQPMessage($msgBody1, ['content_type' => 'text/plain', 'delivery_mode' => 2]); //生成消息

    $r = $channel->basic_publish($msg, $exchangeName, $routingKey); //推送消息到某个交换机
    $r = $channel->basic_publish($msg1, $exchangeName, $routingKey); //推送消息到某个交换机
}

$channel->close();
$conn->close();