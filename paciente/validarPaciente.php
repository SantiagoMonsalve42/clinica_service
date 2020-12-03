<?php 
include '../config.php';


	$config= new config();
	$link=$config->con();

	$correo_paciente=$_POST['correo'];
	$clave_paciente=$_POST['clave'];
	//$correo_admin="100@100.com";
	//$clave_admin="100";

	$sql=$link->prepare("SELECT correo,clave FROM paciente WHERE correo=? AND clave=md5(?)");//Previene inyeciones sql
	$sql->bind_param('ss',$correo_paciente,$clave_paciente);//Traer parametros siendo los 2 de tipo string
	$sql->execute();//Ejecutar sentencia de select

	$resultado=$sql->get_result();//Toma resultado del select
	if($fila=$resultado->fetch_assoc()){//Se valida si se encuentran los datos y se añaden a $fila
		echo json_encode($fila,JSON_UNESCAPED_UNICODE);//Permite almacenar todo un json que reconoce caracteres especiales
	}

	$sql->close();
	$link->close();


?>