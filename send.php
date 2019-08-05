<?php
include_once('rabbitmq.php');
class Publisher extends rabbitmq
{
    public function __construct()
    {
        parent::__construct('crm1', 'crm_test1', '','fanout');
    }
    public function doProcess($msg)
    {

    }

}



$publisher = new Publisher();
for($i=0;$i<10;$i++){
    $publisher->sendMessage('Hello,World!');
}

$publisher->closeConnetct();