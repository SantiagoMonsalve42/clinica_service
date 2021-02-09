<?php

if(isset($_POST['id_medico'])){
    require '../DAO/medicoDAO.php';

    $id_medico=$_POST['idmedico'];
    $obj = new medicoDAO();
    $resul=$obj->readOneById($id_medico);
    echo $resul;
} 

?>