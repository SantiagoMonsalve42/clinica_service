<?php

if(isset($_POST['idespecialidad'])){
    require '../DAO/especialidadDAO.php';

    $id_especialidad=$_GET['idespecialidad'];
    $obj = new especialidadDAO();
    $resul=$obj->readOneById($id_especialidad);
    echo $resul;
} 

?>