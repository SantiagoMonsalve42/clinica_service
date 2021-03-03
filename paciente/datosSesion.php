<?php
if($_SERVER['REQUEST_METHOD']=='GET'){
include('../config.php');
$conf = new config();
$link=$conf->con();
$correo=$_GET['correo'];

$sql="select * from paciente where correo='$correo'";
$res=$link->query($sql);
//verficar si existen registros
if($link->affected_rows>0){
 while($row=$res->fetch_assoc()){
  $array=$row;
}
echo json_encode($array);
}else{
    echo "No existe el paciente con ese correo $correo";
}
$res->close();
$link->close();

}

?>