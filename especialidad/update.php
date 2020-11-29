<?php
  
if(isset($_POST['id']) && isset($_POST['name']) ){
    
    require '../DAO/especialidadDAO.php';

    $id=$_POST['id'];
    $name=$_POST['name'];
    $espe = new especialidadDAO();
    $resul=$espe->updateName($id,$name);
    echo $resul;
} 

?>