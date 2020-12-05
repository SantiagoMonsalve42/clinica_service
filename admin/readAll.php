<?php

if(isset($_GET['readall'])){
    require '../DAO/admonDAO.php';

    $adminDAO = new admonDAO();
    $resul=$adminDAO->readall();
    echo $resul;
} 

?>