<?php
include ('../config.php');
include ('../DAO/citaDAO.php');
$conf= new config();
$link= $conf->con();
$citaDAO= new citaDAO();
if(isset($_POST['fecha']) && isset($_POST['hora']) && isset($_POST['medico_idmedico']) && isset($_POST['paciente_idpaciente']) && isset($_POST['consultorio_idconsultorio']) && isset($_POST['estado']) && isset($_POST['especialidad_idespecialidad'])){

$fecha=$_POST['fecha'];
$hora=$_POST['hora'];
$idmedico=$_POST['medico_idmedico'];
$idpaciente=$_POST['paciente_idpaciente'];
$idconsultorio=$_POST['consultorio_idconsultorio'];
$estado=$_POST['estado'];
<<<<<<< Updated upstream

$sql=$citaDAO->insert($fecha, $hora, $idmedico, $idpaciente, $idconsultorio, $estado);
=======
$especialidad=$_POST['especialidad_idespecialidad'];
$sql=$citaDAO->
insert($fecha, $hora, $idmedico, $idpaciente, $idconsultorio, $estado,$especialidad);
>>>>>>> Stashed changes

    if(mysqli_query($link,$sql)){
        // echo "Insercion correcta";
        echo("1");
    }
    else{
        echo "0";
        mysqli_close($link);
    }
    
?>
    