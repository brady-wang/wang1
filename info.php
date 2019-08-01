<?php


$str = "==";
$a = "3".$str."3";
if(eval("return $a;")){
    var_dump(true);
} else {
    var_dump(false);
}

