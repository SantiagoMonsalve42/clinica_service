<?php

if(isset($_POST['idmedico'])){
    require '../DAO/citaDAO.php';

    $id_medico=$_POST['idmedico'];
    $obj = new citaDAO();
    $resul=$obj->readOneById($id_medico);
    echo $resul;
} 

?>