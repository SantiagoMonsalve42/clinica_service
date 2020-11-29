<?php

if(isset($_GET['id'])){
    require '../DAO/especialidadDAO.php';

    $id=$_GET['id'];
    $espe = new especialidadDAO();
    $resul=$espe->readOneById($id);
    echo $resul;
} 

?>