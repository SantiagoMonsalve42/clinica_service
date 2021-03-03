<?php
if($_SERVER['REQUEST_METHOD']=='GET'){
include('../config.php');
$conf = new config();
$link=$conf->con();
$idpaciente=$_GET['idpaciente'];

$sql="select * from paciente where idpaciente='$idpaciente'";
$res=$link->query($sql);
//verficar si existen registros
if($link->affected_rows>0){
 while($row=$res->fetch_assoc()){
  $array=$row;
}
echo json_encode($array);
}else{
    echo "No existe el paciente con ese id $idpaciente";
}
$res->close();
$link->close();

}
else{
    echo "A la espera del id";
}

?>