<?php
if(isset($_POST['idpaciente'])){
	include ('../config.php');
	include ('../DAO/pacienteDAO.php');
	$conf= new config();
	$link= $conf->con();
	$pacDAO= new pacienteDAO();

	$id_paciente=$_POST['idpaciente'];

	$sql=$pacDAO->
	delete($id_paciente);
	if($link->affected_rows>0){
       // echo "Insercion correcta";
		echo("Eliminación correcta");
	}
	else{
		echo "Algo está fallando",mysqli_error($link);
		mysqli_close($link);
	}
}




?>