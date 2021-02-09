<?php

if(isset($_POST['idpaciente'])){
    require '../DAO/pacienteDAO.php';

    $id=$_POST['idpaciente'];
    $obj = new pacienteDAO();
    $resul=$obj->readOneById($id);
    echo $resul;
} 

?>