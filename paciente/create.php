<?php
include ('../config.php');
include ('../DAO/pacienteDAO.php');
$conf= new config();
$link= $conf->con();
$pacDAO= new pacienteDAO();

$nombre=$_POST['nombre'];
$apellido=$_POST['apellido'];
$correo=$_POST['correo'];
$clave=$_POST['clave'];
$cc=$_POST['cc'];
$telefono=$_POST['telefono'];
$pregunta=$_POST['pregunta'];
$respuesta=$_POST['respuesta'];
$fecha_nac=$_POST['fecha_nac'];

$sql=$pacDAO->
insert($nombre,$apellido,$correo,$clave,$cc,$telefono,$pregunta,$respuesta,$fecha_nac);

  if(mysqli_query($link, $sql)){
       // echo "Insercion correcta";
        echo("Registro correcto");
    }
    else{
        echo "Insercion incorrecta",mysqli_error($link);
        mysqli_close($link);
    }



?>