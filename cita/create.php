<?php
include ('../config.php');
include ('../DAO/citaDAO.php');
$conf= new config();
$link= $conf->con();
$citaDAO= new citaDAO();

$fecha=$_POST['fecha'];
$hora=$_POST['hora'];
$idmedico=$_POST['medico_idmedico'];
$idpaciente=$_POST['paciente_idpaciente'];
$idconsultorio=$_POST['consultorio_idconsultorio'];
$estado=$_POST['estado'];

$sql=$citaDAO->
insert($fecha, $hora, $idmedico, $idpaciente, $idconsultorio, $estado);

    if(mysqli_query($link, $sql)){
        // echo "Insercion correcta";
        echo("Registro correcto");
    }
    else{
        echo "Insercion incorrecta",mysqli_error($link);
        mysqli_close($link);
    }
    
?>