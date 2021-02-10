<?php

if(isset($_POST['idmedico'])){
	require '../DAO/medicoDAO.php';
    $conf= new config();
    $link= $conf->con();
    $medDAO= new medicoDAO();

	$id_medico=$_POST['idmedico'];
	$nombre=$_POST['nombre'];
	$apellido=$_POST['apellido'];
	$correo=$_POST['correo'];
	$tarjeta=$_POST['tarjetaprofesional'];
	$pregunta=$_POST['pregunta'];
	$respuesta=$_POST['respuesta'];
	$fecha_nac=$_POST['fecha_nacimiento'];

	$medDAO = new medicoDAO();
	if($link->affected_rows>0){
		$resul=$medDAO->update($id_medico,$nombre,$apellido,$correo,$tarjeta,$pregunta,$respuesta,$fecha_nac);
		echo $resul;
	}
} 

?>