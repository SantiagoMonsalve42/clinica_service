<?php

class config{
   
function con(){
     $host="localhost";
    $user="root";
   $pass="123456";
   $bdname="clinica";
    $link=mysqli_connect($host,$user,$pass)
    or die("Error 1 del tipo: ".mysqli_error($link));

    mysqli_select_db($link,$bdname)
    or die("Error 2 del tipo:".mysqli_error($link));
    return $link;
}
}

?>