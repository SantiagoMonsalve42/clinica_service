<?php
include ('../config.php');
include ('../DAO/especialidadDAO.php');
$conf= new config();
$link= $conf->con();
$espeDAO= new especialidadDAO();

$nombre=$_POST['nombre'];


$sql=$espeDAO->
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