<?php

if(isset($_GET['idmedico'])){
    require '../DAO/citaDAO.php';

    $id_medico=$_GET['idmedico'];
    $obj = new citaDAO();
    $resul=$obj->readOneById($id_medico);
    echo $resul;
} 

?>