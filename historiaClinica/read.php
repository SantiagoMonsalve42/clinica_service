<?php

if (isset($_POST['idhistoria'])) {
    require '../DAO/historiaDAO.php';

    $id_historia = $_POST['idhistoria'];
    $obj = new historiaDAO();
    $resul = $obj->readOneById($id_historia);
    echo $resul;
}
?>