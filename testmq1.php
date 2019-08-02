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

$exchangeName = 'queue_crm_staff'; //交换机名
$queueName = 'queue_crm_staff'; //队列名称
$routingKey = ''; //路由关键字(也可以省略)

$conn = new AMQPStreamConnection( //建立生产者与mq之间的连接
    $conf['host'], $conf['port'], $conf['user'], $conf['pwd'], $conf['vhost']
);
$channel = $conn->channel(); //在已连接基础上建立生产者与mq之间的通道


$channel->exchange_declare($exchangeName, 'direct', false, true, false); //声明初始化交换机
$channel->queue_declare($queueName, false, true, false, false); //声明初始化一条队列
$channel->queue_bind($queueName, $exchangeName, $routingKey); //将队列与某个交换机进行绑定，并使用路由关键字



$msgBody = json_encode(["name" => "iGoo", "age" => 22]);
$msgBody = '{
                    "model": "organization",
                    "type": "3",
                "data": {
                "id": "9",
                        "name": "技术中心",
                        "pid": "1",
                        "area_code": ""
                }
                }';
$msg = new AMQPMessage($msgBody, ['content_type' => 'text/plain', 'delivery_mode' => 2]); //生成消息
for($i=0;$i<10000000;$i++){
    $r = $channel->basic_publish($msg, $exchangeName, $routingKey); //推送消息到某个交换机
}

$channel->close();
$conn->close();