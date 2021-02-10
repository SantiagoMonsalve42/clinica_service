<?php
if(isset($_POST['idconsultorio'])){
	include ('../config.php');
	include ('../DAO/consultiorioDAO.php');
	$conf= new config();
	$link= $conf->con();
	$conDAO= new consultorioDAO();

	$id_consultorio=$_POST['idconsultorio'];

	$sql=$conDAO->
	delete($id_consultorio);
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