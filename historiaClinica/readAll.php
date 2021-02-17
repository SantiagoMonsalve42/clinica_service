<?php
include ('../config.php');
include ('../DAO/historiaDAO.php');
$conf= new config();
$link= $conf->con();
$hisDAO= new historiaDAO();


$sql=$hisDAO->
readAll();

if(mysqli_query($link, $sql)){
    // echo "Insercion correcta";
    echo($sql);
}
else{
    echo "Fallo al mostrar",mysqli_error($link);
    mysqli_close($link);
}



?>