<?php
include ('../config.php');
include ('../DAO/citaDAO.php');
$conf= new config();
$link= $conf->con();
$citaDAO= new citaDAO();


$sql = $citaDAO -> readAll();

  if(mysqli_query($link, $sql)){
       // echo "Insercion correcta";
        echo($sql);
    }
    else{
        echo "Fallo al mostrar",mysqli_error($link);
        mysqli_close($link);
    }



?>