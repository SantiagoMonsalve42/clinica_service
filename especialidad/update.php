<?php

if(isset($_POST['idespecalidad'])){
    require '../DAO/especialidadDAO.php';
    $conf= new config();
    $link= $conf->con();
    $espeDAO= new especialidadDAO();

    $id_especialidad=$_POST['idespecalidad'];
    $nombre=$_POST['nombre'];

    $citaDAO = new citaDAO();
    if($link->affected_rows>0){
        $resul=$citaDAO->update($id_especialidad,$nombre);
        echo $resul;
    }
}

?>