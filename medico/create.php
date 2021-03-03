<?php
include ('../config.php');
include ('../DAO/medicoDAO.php');
$conf= new config();
$link= $conf->con();
$medDAO= new medicoDAO();

$nombre=$_POST['nombre'];
$apellido=$_POST['apellido'];
$fecha_nac=$_POST['fecha_nacimiento'];
$correo=$_POST['correo'];
$clave=$_POST['clave'];
$tarjeta=$_POST['tarjetaprofesional'];
$idEspecialidad=$_POST['especialidad_idespecialidad'];
$pregunta=$_POST['pregunta'];
$respuesta=$_POST['respuesta'];

$sql=$medDAO->insert($nombre,$apellido,$fecha_nac,$correo,$clave,$tarjeta,$pregunta,$respuesta);

  if(mysqli_query($link, $sql)){
       // echo "Insercion correcta";
        echo("Registro correcto");
    }
    else{
        echo "Insercion incorrecta",mysqli_error($link);
        mysqli_close($link);
    }

?>