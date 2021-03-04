<?php
if(isset($_GET['id'])){
    require '../DAO/medicoDAO.php';
    
    $id=$_GET['id'];
    $obj = new medicoDAO();
    $resul=$obj->consultarTotalRegistrosM($id);
    echo $resul;
}
?>