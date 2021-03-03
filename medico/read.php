<?php

if(isset($_GET['idmedico'])){
    require '../DAO/medicoDAO.php';

    $id_medico=$_GET['idmedico'];
    $obj = new medicoDAO();
    $resul=$obj->readOneById($id_medico);
    echo $resul;
} 

?>