<?php

if(isset($_POST['idpaciente'])){
	require '../DAO/oacienteDAO.php';
    $conf = new config();
    $link = $conf->con();
    $pacDAO = new pacienteDAO();

	$id=$_POST['idpaciente'];
	$nombre=$_POST['nombre'];
	$apellido=$_POST['apellido'];
	$correo=$_POST['correo'];
	$cc=$_POST['cc'];
	$telefono=$_POST['telefono'];
	$pregunta=$_POST['pregunta'];
	$respuesta=$_POST['respuesta'];
	$fecha_nac=$_POST['fecha_nacimiento'];

	$pacDAO = new pacienteDAO();
	if($link->affected_rows>0){
		$resul=$pacDAO->update($id,$nombre,$apellido,$correo,$cc,$telefono,$pregunta,$respuesta,$fecha_nac);
		echo $resul;
	}
} 

?>