<?php
if (isset($_POST['idhistoria'])) {
    include('../config.php');
    include('../DAO/historiaDAO.php');
    $conf = new config();
    $link = $conf->con();
    $hisDAO = new historiaDAO();

    $id_historia = $_POST['idhistoria'];

    $sql = $hisDAO->
    delete($id_historia);
    if ($link->affected_rows > 0) {
        // echo "Insercion correcta";
        echo("Eliminación correcta");
    } else {
        echo "Algo está fallando", mysqli_error($link);
        mysqli_close($link);
    }
}


?>