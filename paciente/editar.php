<?php
if($_SERVER['REQUEST_METHOD']=='POST'){
    include('../config.php');
    $confi= new config();
    $link=$confi->con();
  
    $id=$_REQUEST['idpaciente'];
    $nom=$_REQUEST['nombre'];
    $ape=$_REQUEST['apellido'];
    $correo=$_REQUEST['correo'];
    $clave=$_REQUEST['clave'];
    $tel=$_REQUEST['telefono'];
    $cc=$_REQUEST['cedula'];
    $preg=$_REQUEST['pregunta'];
    $resp=$_REQUEST['respuesta'];
    $fecha_nac=$_REQUEST['fecha_nacimiento'];

    $sql="UPDATE paciente SET nombre='$nom,'apellido='$ape,' correo='$correo,' clave='$clave,' tel='$telefono,' cedula='$cc,' pregunta='$preg,' respuesta='$resp,' fecha_nacimiento='$fecha_nac,'  WHERE idpaciente=$id";
    $res=$link->query($sql);
    //verficar si existen registros
    if($link->affected_rows>0){
        if($res==TRUE){
        echo "Se Actualizo el paciente ";
        }else{
            echo "ERROR";
        }
    }else{
        echo "No existe ese id $id";
    }
    
    $link->close();

}
else{
    echo "A la espera de un id";
}
    
?>