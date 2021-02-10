<?php
include ('../config.php');
include ('../DAO/consultorioDAO.php');
$conf= new config();
$link= $conf->con();
$conDAO= new consultorioDAO();


$sql=$conDAO->
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