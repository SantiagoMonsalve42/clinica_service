<?php
  
if(isset($_POST['id']) && isset($_POST['pass']) ){
    
    require '../DAO/admonDAO.php';

    $id=$_POST['id'];
    $pass=$_POST['pass'];
    $npass= md5($pass);
    $adminDAO = new admonDAO();
    $resul=$adminDAO->updatePass($id,$npass);
    echo $resul;
} 

?>