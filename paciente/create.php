<?php
include ('../config.php');
include ('../DAO/pacienteDAO.php');
$conf= new config();
$link= $conf->con();
$pacDAO= new pacienteDAO();
if(isset($_POST['nombre']) && isset($_POST['apellido']) && isset($_POST['correo']) && isset($_POST['clave']) && isset($_POST['cc']) && isset($_POST['telefono']) && isset($_POST['pregunta'])
 && isset($_POST['respuesta']) && isset($_POST['fecha_nacimiento'])){
$nombre=$_POST['nombre'];
$apellido=$_POST['apellido'];
$correo=$_POST['correo'];
$clave=$_POST['clave'];
$cc=$_POST['cc'];
$telefono=$_POST['telefono'];
$pregunta=$_POST['pregunta'];
$respuesta=$_POST['respuesta'];
$fecha_nac=$_POST['fecha_nacimiento'];

$sql=$pacDAO->
insert($nombre,$apellido,$correo,$clave,$cc,$telefono,$pregunta,$respuesta,$fecha_nac);

  if(mysqli_query($link,$sql)){
       // echo "Insercion correcta";
        echo("1");
    }
    else{
        echo "0",mysqli_error($link);
        mysqli_close($link);
    }

}else{
    echo "falta algo pirobo";
}

?>