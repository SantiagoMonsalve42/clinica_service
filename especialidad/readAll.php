<?php

if(isset($_GET['readall'])){
    require '../DAO/especialidadDAO.php';
    $id=$_GET['readall'];
    $espe = new especialidadDAO();
    $resul=$espe->readall($id);
    echo $resul;
} 

?>