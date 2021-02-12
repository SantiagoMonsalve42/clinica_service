
<?php
	require_once ("../DAO/facade.php");
	if(isset($_POST["correo"]) && $_POST["clave"]){
	 $objf = new facade();
	 $array;
	 $id= $objf->validarCredencial($_POST["correo"],$_POST["clave"]);
		switch($id){
			case 0:
				$array = array('id' => 0, 'variable_sesion' => "null");
				break;
			case 1:
				$array = array('id' => 1, 'variable_sesion' => $_POST["correo"]);
				break;
			case 2:
				$array = array('id' => 2, 'variable_sesion' => $_POST["correo"]);
				break;
			case 3:
				$array = array('id' => 3, 'variable_sesion' => $_POST["correo"]);
				break;
		}
		echo json_encode($array);

	}

?>
   