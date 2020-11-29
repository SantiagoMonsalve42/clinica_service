<?php

if(isset($_GET['readall'])){
    require '../DAO/adminDAO.php';

    $adminDAO = new admonDAO();
    $resul=$adminDAO->readall();
    echo $resul;
} 

?>