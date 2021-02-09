<?php
include ('../config.php');
include ('../DAO/medicoDAO.php');
$conf= new config();
$link= $conf->con();
$medDAO= new medicoDAO();

$nombre=$_POST['nombre'];
$apellido=$_POST['apellido'];
$correo=$_POST['correo'];
$clave=$_POST['clave'];
$tarjeta=$_POST['tarjetaprofesional'];
$pregunta=$_POST['pregunta'];
$respuesta=$_POST['respuesta'];
$fecha_nac=$_POST['fecha_nacimiento'];

$sql=$medDAO->
insert($nombre,$apellido,$correo,$clave,$tarjeta,$pregunta,$respuesta,$fecha_nac);

  if(mysqli_query($link, $sql)){
       // echo "Insercion correcta";
        echo("Registro correcto");
    }
    else{
        echo "Insercion incorrecta",mysqli_error($link);
        mysqli_close($link);
    }



?>