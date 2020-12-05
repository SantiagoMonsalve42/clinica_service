
<?php
	require_once("../config.php");
	require_once ("../DAO/admonDAO.php");
	require_once ("../DAO/pacienteDAO.php");
	class verificar{
		private $admons;
    	function __construct(){
		$correo = $_POST["correo"];
		$clave = $_POST["clave"];
		$id=$_POST["id"];
		$rol_param=$_POST["rol"];
		$rol_sesion=$_SESSION["rol"];

		$adminDAO = new admonDAO();
		$admDAO=$adminDAO->getMailPswd($correo,$clave);

		$paciDAO = new pacienteDAO();
		$pacDAO=$paciDAO->getMailPswd($correo,$clave);
	}
		function valida($estado){
			if($admDAO>0){
				$_SESSION['id'] = $adminDAO->readOneById($id);
		    	$rol_sesion = $rol_param;
		    	$estado=1; 
		}
		else if($pacDAO){
			
			$_SESSION['id'] = $paciDAO->readOneById($id);
		    $rol_sesion = $rol_param;
		    $estado=2;
		}
		else{
			$estado=3;
		    
		}
	}
	
}

?>
   