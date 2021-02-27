<?php

if(isset($_GET['idpaciente'])){
    require '../DAO/pacienteDAO.php';

    $id=$_GET['idpaciente'];
    $obj = new pacienteDAO();
    $resul=$obj->readOneById($id);
    echo $resul;
} 

?>