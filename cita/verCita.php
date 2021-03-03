<?php

if(isset($_GET['idmedico']) && isset($_GET['hora'])){
    require '../DAO/citaDAO.php';
    $id_medico=$_GET['idmedico'];
    $hora=$_GET['hora'];
    $obj = new citaDAO();
    $resul=$obj->readOneByMailAndHour($id_medico,$hora);
    echo $resul;
} 

?>