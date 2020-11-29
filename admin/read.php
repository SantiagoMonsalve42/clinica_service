<?php

if(isset($_GET['id'])){
    require '../DAO/adminDAO.php';

    $id=$_GET['id'];
    $adminDAO = new admonDAO();
    $resul=$adminDAO->readOneById($id);
    echo $resul;
} 

?>