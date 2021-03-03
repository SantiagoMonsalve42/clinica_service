<?php

if((isset($_POST['idcita']) && isset($_POST['fecha']) && 
isset($_POST['hora']) && isset($_POST['estado']))){
	require '../DAO/citaDAO.php';
    

	$id_cita=$_POST['idcita'];
	$fecha=$_POST['fecha'];
	$hora=$_POST['hora'];
	$estado=$_POST['estado'];

	$citaDAO = new citaDAO();
	$resul=$citaDAO->update($id_cita,$fecha,$hora,$estado);
	if($resul){
		echo 1;
	}else{
		echo 0;
	}

}

?>