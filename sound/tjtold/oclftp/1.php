<?php
$b =  PHP_EOL . PHP_EOL . PHP_EOL . PHP_EOL .date( "Y/m/d H:i:s",time()).","."download,". "123"."successful" ;    //PHP_EOL
 
 
file_put_contents("C:\Users\Administrator\Desktop\ocleventlog.txt", $b , FILE_APPEND);


?>