<?php

$time = date("Y-m-d H:i:s",time());
sleep(1);

    file_put_contents("supervisor.log",$time.PHP_EOL,FILE_APPEND);

