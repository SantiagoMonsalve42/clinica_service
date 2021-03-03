<?php
require '../DAO/medicoDAO.php';
$obj = new medicoDAO();
$resul = $obj -> consultarTotalRegistros();
echo $resul;
?>