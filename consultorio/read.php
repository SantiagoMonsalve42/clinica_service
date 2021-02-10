<?php

if(isset($_POST['idconsultorio'])){
    require '../DAO/consultorioDAO.php';

    $id_consultorio=$_POST['idconsultorio'];
    $obj = new consultorioDAO();
    $resul=$obj->readOneById($id_consultorio);
    echo $resul;
} 

?>