<?php
include ('../config.php');
include ('../DAO/especialidadDAO.php');
$conf= new config();
$link= $conf->con();
$espeDAO= new especialidadDAO();


$sql = $espeDAO-> readAll();

if(mysqli_query($link, $sql)){
    // echo "Insercion correcta";
    echo($sql);
}
else{
    echo "Fallo al mostrar",mysqli_error($link);
    mysqli_close($link);
}



?>