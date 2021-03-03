<?php
if(isset($_GET['mail'])){
    require '../DAO/medicoDAO.php';
    $medDAO= new medicoDAO();
    $resul=$medDAO->verCitasByMail($_GET['mail']);
    echo $resul;
}

?>