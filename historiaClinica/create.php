<?php

if(isset($_POST['peso']) && isset($_POST['altura']) && isset($_POST['motivo_consulta']) && 
isset($_POST['enfermedades']) && isset($_POST['alergias']) && isset($_POST['medicamentos']) && 
isset($_POST['antecedentes_personales']) && isset($_POST['antecedentes_familiares']) &&
isset($_POST['paciente_idpaciente'])){
    
include('../DAO/historiaDAO.php');

$hisDAO = new historiaDAO();

$peso = $_POST['peso'];
$altura = $_POST['altura'];
$motConsulta = $_POST['motivo_consulta'];
$enfermedades = $_POST['enfermedades'];
$alergias = $_POST['alergias'];
$medicamentos = $_POST['medicamentos'];
$antPersonales = $_POST['antecedentes_personales'];
$antFamiliares = $_POST['antecedentes_familiares'];
$idpaciente = $_POST['paciente_idpaciente'];

$sql = $hisDAO->insert($peso, $altura, $motConsulta, $enfermedades, $alergias, $medicamentos, $antPersonales, $antFamiliares,$idpaciente);
if($sql){
    echo 1;
}else{
    echo 0;
}


}
?>