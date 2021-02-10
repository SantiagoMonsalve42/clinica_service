<?php
include ('../config.php');
include ('../DAO/consultorioDAO.php');
$conf= new config();
$link= $conf->con();
$conDAO= new consultorioDAO();

$nombre=$_POST['nombre'];

$sql=$conDAO->
insert($nombre);

    if(mysqli_query($link, $sql)){
        // echo "Insercion correcta";
        echo("Registro correcto");
    }
    else{
        echo "Insercion incorrecta",mysqli_error($link);
        mysqli_close($link);
    }
    
?>