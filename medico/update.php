<?php

if(isset($_POST['idmedico'])){
	require '../DAO/medicoDAO.php';

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
		$resul=$pacDAO->update($id,$nombre,$apellido,$correo,$tarjeta,$pregunta,$respuesta,$fecha_nac);
		echo $resul;
	}
} 

?>