<?php

if(isset($_POST['idcita'])){
    require '../DAO/citaDAO.php';

    $id_cita=$_POST['idcita'];
    $obj = new citaDAO();
    $resul=$obj->readOneById($id_cita);
    echo $resul;
} 

?>