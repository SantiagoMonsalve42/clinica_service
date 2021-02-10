<?php
if(isset($_POST['idespecialidad'])){
    include ('../config.php');
    include ('../DAO/especialidadDAO.php');
    $conf= new config();
    $link= $conf->con();
    $espeDAO= new especialidadDAO();

    $id_especialidad=$_POST['idespecialidad'];

    $sql=$espeDAO->
    delete($id_especialidad);
    if($link->affected_rows>0){
        // echo "Insercion correcta";
        echo("Eliminación correcta");
    }
    else{
        echo "Algo está fallando",mysqli_error($link);
        mysqli_close($link);
    }
}




?>