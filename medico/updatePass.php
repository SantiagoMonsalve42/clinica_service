<?php
if(isset($_POST['idmedico']) && isset($_POST['pass'])){
    require '../DAO/medicoDAO.php';
    $medDAO= new medicoDAO();
    $resul=$medDAO->updatePass($_POST['idmedico'],md5($_POST['pass']));
    if($resul){
        echo 1;
    }else{
        echo 0;
    }

}

?>