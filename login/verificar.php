
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
	/*function Inicio($estado){
			if($_SESSION['id']!="" ){
				if($_SESSION["rol"] == "Administrador"&& $estado==1){
				}
				else if($_SESSION["rol"] == "Paciente" && $estado==2){
				}
			}
			else if($_SESSION['id']=="" && $estado==3){
				echo "Sin inicio de sesion";
			}
		}*/
}

?>
   