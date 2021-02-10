<?php

if(isset($_POST['idconsultorio'])){
	require '../DAO/consultorioDAO.php';

	$id_consultorio=$_POST['idmedico'];
	$nombre=$_POST['nombre'];

	$conDAO = new consultorioDAO();
	if($link->affected_rows>0){
		$resul=$pacDAO->update($id,$nombre);
		echo $resul;
	}
} 

?>