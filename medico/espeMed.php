<?php
include('../config.php');
$config = new config();

$link=$config->con();
if(isset($_GET['especialidad'])){
$sql="select idmedico,nombre from medico where especialidad_idespecialidad=
(select idespecialidad from especialidad where nombre ='".$_GET['especialidad']."')";

$res=$link->query($sql);
if($res->num_rows>0){
    $return_med['medicos']=array();
    while($row=$res->fetch_array()){
        array_push($return_med['medicos'],
        array('idmedico'=>$row['idmedico'],
               'nombre'=>$row['nombre']
            ));

    }
    echo json_encode($return_med);
 }
}
else{
    echo "A la espera de un id";
}

?>