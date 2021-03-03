<?php
include('../config.php');
$conf= new config();
$link= $conf->con();
$nombre=$_GET['nombre'];
$sql="select * from especialidad where nombre='$nombre'";
$arrayMed = array();
$arrayMed["especialidad"] = array();

$result=mysqli_query($link,$sql);

while($row = mysqli_fetch_array($result)){
    
    // Array temporal para crear una sola categoría
    $arr = array();
    $arr["idespecialidad"] = $row["idespecialidad"];
    $arr["nombre"] = $row["nombre"];
    
    // Push categoría a final json array
    array_push($arrayMed["especialidad"], $arr);
}
// Mantener el encabezado de respuesta a json
header('Content-Type: application/json');
//Escuchando el resultado de json
echo json_encode($arrayMed);
?>