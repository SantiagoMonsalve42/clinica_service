<?php
include('../config.php');
include('../DAO/historiaDAO.php');
$conf = new config();
$link = $conf->con();
$hisDAO = new historiaDAO();

$peso = $_POST['peso'];
$altura = $_POST['altura'];
$motConsulta = $_POST['motivo_consulta'];
$enfermedades = $_POST['enfermedades'];
$alergias = $_POST['alergias'];
$medicamentos = $_POST['medicamentos'];
$antPersonales = $_POST['antecedentes_personales'];
$antFamiliares = $_POST['antecedentes_familiares'];

$sql = $hisDAO->
insert($peso, $altura, $motConsulta, $enfermedades, $alergias, $medicamentos, $antPersonales, $antFamiliares);

if (mysqli_query($link, $sql)) {
    // echo "Insercion correcta";
    echo("Registro correcto");
} else {
    echo "Insercion incorrecta", mysqli_error($link);
    mysqli_close($link);
}

?>