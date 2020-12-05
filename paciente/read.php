<?php

if(isset($_GET['id'])){
    require '../DAO/pacienteDAO.php';

    $id=$_GET['id'];
    $obj = new pacienteDAO();
    $resul=$obj->readOneById($id);
    echo $resul;
} 

?>