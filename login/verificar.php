
<?php
error_reporting(0);
	require_once ("../DAO/facade.php");
	if(isset($_POST["correo"]) && $_POST["clave"]){
	 $objf = new facade();
	 $id= $objf->validarCredencial($_POST["correo"],$_POST["clave"]);
     echo $id;
	}

?>
   