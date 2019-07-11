<?php

require_once __DIR__ . '/vendor/autoload.php';
use PhpAmqpLib\Connection\AMQPStreamConnection;

$connection = new AMQPStreamConnection('192.168.33.50', 5672, 'admin', 'admin');
$channel = $connection->channel();

$exchangeName = 'ttt'; //交换机名
$queueName = 'ttt'; //队列名称
$routingKey = 'ttt'; //路由关键字(也可以省略)

$channel->exchange_declare($exchangeName, 'direct', false, true, false); //声明初始化交换机
$channel->queue_declare($queueName, false, true, false, false); //声明初始化一条队列
$channel->queue_bind($queueName, $exchangeName, $routingKey); //将队列与某个交换机进行绑定，并使用路由关键字


echo ' [*] Waiting for messages. To exit press CTRL+C', "\n";
$callback = function($msg) {
    echo " [x] Received ", $msg->body, "\n";
};
$channel->basic_consume('ttt', '', false, true, false, false, $callback);
while(count($channel->callbacks)) {
    $channel->wait();
}

$channel->close();
$connection->close();


?>