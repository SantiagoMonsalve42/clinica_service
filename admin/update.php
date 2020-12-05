<?php
  
if(isset($_POST['id']) && isset($_POST['ask']) && isset($_POST['ans']) ){
    
    require '../DAO/admonDAO.php';

    $id=$_POST['id'];
    $ask=$_POST['ask'];
    $ans= $_POST['ans'];
    $adminDAO = new admonDAO();
    $resul=$adminDAO->update($id,$ask,$ans);
    echo $resul;
} 

?>