<?php
include ('../config.php');
include ('../DAO/pacienteDAO.php');
$conf= new config();
$link= $conf->con();
$pacDAO= new pacienteDAO();


$sql=$pacDAO->readAll();

  if(mysqli_query($link, $sql)){
       // echo "Correcta";
        echo($sql);
    }
    else{
        echo "Fallo al mostrar",mysqli_error($link);
        mysqli_close($link);
    }



?>