<?php


function tps_pcntl_wait($childProcessCode){

    $pid = pcntl_fork();
    if($pid>0){
        pcntl_wait($status);
    }elseif($pid==0){
        eval($childProcessCode);
        //var_dump("开启子进程".posix_getpid());
        exit;
    }else{
        die('Cannot fork.');
    }
}
function test($i)
{
    var_dump("第".$i."页 执行成功 ");
}

for($i=0;$i<100;$i++){
    tps_pcntl_wait("test($i);");
}

