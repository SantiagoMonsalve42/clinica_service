<?php
include ('../config.php');
include ('../DAO/citaDAO.php');
$conf= new config();
$link= $conf->con();
$medDAO= new medicoDAO();


$sql=$medDAO -> ver_citas();

  if(mysqli_query($link, $sql)){
       // echo "Insercion correcta";
        echo($sql);
    }
    else{
        echo "Fallo al mostrar",mysqli_error($link);
        mysqli_close($link);
    }

?>