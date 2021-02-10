<?php

if(isset($_POST['idconsultorio'])){
	require '../DAO/consultorioDAO.php';

	$id_cita=$_POST['idcita'];
	$fecha=$_POST['fecha'];
	$hora=$_POST['hora'];
	$idmedico=$_POST['medico_idmedico'];
	$idpaciente=$_POST['paciente_idpaciente'];
	$idconsultorio=$_POST['consultorio_idconsultorio'];
	$estado=$_POST['estado'];

	$citaDAO = new citaDAO();
	if($link->affected_rows>0){
	    $resul=$pacDAO->update($id_cita,$fecha,$hora,$idmedico,$idpaciente,$idconsultorio,$estado);
		echo $resul;
	}
} 

?>