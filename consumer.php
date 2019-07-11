<?php
include_once('rabbitmq.php');
class Consumer extends rabbitmq
{
    public function __construct()
    {
        parent::__construct('crm', 'crm_test', 'crm_test');
    }
    public function doProcess($msg)
    {
        echo $msg."\n";
    }
}
$consumer = new Consumer();
//$consumer->dealMq(false);
$consumer->dealMq(false);
