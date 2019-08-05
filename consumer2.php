<?php
include_once('rabbitmq.php');
class Consumer extends rabbitmq
{
    public function __construct()
    {
        parent::__construct('crm1', 'crm_test2', '','fanout');
    }
    public function doProcess($msg)
    {
        echo $msg."\n";
    }
}
$consumer = new Consumer();
//$consumer->dealMq(false);
$consumer->dealMq(false);
