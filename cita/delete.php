<?php
if(isset($_POST['idcita'])){
	include ('../config.php');
	include ('../DAO/citaDAO.php');
	$conf= new config();
	$link= $conf->con();
	$citaDAO= new citaDAO();

	$id_cita=$_POST['idcita'];

	$sql=$citaDAO->
	delete($id_cita);
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