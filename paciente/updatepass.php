<?php
  
if(isset($_POST['idpaciente']) && isset($_POST['pass']) ){
    
    require '../DAO/pacienteDAO.php';

    $id=$_POST['idpaciente'];
    $pass=$_POST['pass'];
    $npass= md5($pass);
    $obj = new pacienteDAO();
    $resul=$obj->updatePass($id,$npass);
    echo $resul;
} 

?>