<?php

if(isset($_GET['id'])){
    require '../DAO/admonDAO.php';

    $id=$_GET['id'];
    $adminDAO = new admonDAO();
    $resul=$adminDAO->readOneById($id);
    echo $resul;
} 

?>