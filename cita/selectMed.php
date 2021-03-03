<?php
include('../config.php');
$conf= new config();
$link= $conf->con();

$sql="select * from medico";
$arrayMed = array();
$arrayMed["medico"] = array();

$result=mysqli_query($link,$sql);

while($row = mysqli_fetch_array($result)){
    
    // Array temporal para crear una sola categoría
    $arr = array();
    $arr["idmedico"] = $row["idmedico"];
    $arr["nombre"] = $row["nombre"];
    
    // Push categoría a final json array
    array_push($arrayMed["medico"], $arr);
}
// Mantener el encabezado de respuesta a json
header('Content-Type: application/json');
//Escuchando el resultado de json
echo json_encode($arrayMed);
?>