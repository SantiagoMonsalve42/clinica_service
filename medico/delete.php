<?php
if(isset($_POST['idmedico'])){
	include ('../config.php');
	include ('../DAO/medicoDAO.php');
	$conf= new config();
	$link= $conf->con();
	$medDAO= new medicoDAO();

	$id_medico=$_POST['idmedico']

	$sql=$medDAO->
	delete($id_medico);
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