<?php

if (isset($_GET['idhistoria'])) {
    require '../DAO/historiaDAO.php';

    $id_historia = $_GET['idhistoria'];
    $obj = new historiaDAO();
    $resul = $obj->readOneById($id_historia);
    echo $resul;
}
?>