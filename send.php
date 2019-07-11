<?php
include_once('rabbitmq.php');
class Publisher extends rabbitmq
{
    public function __construct()
    {
        parent::__construct('crm', 'crm_test', 'crm_test');
    }
    public function doProcess($msg)
    {

    }

}



$publisher = new Publisher();
for($i=0;$i<2;$i++){
    $publisher->sendMessage('Hello,World!');
}

$publisher->closeConnetct();