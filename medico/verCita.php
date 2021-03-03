<?php
include ('../config.php');
include ('../DAO/citaDAO.php');
$conf= new config();
$link= $conf->con();
$medDAO= new medicoDAO();



$sql=$medDAO -> ver_citas();
$res = $link -> query($sql);
if ($res->num_rows>0) {
    $return_cit['cita']=array();
    while($row=$res->fetch_arra()){
        array_push($return_cit['cita'], 
            array('fecha'=>$row['fecha'], 
                'hora'=>$row['hora'],
                'nombreCon'=>$row['nombreCon'],
                'nombre'=>$row['nombre'],
                'apellido'=>$row['apellido']
            ));
    }
    echo json_encode($return_cit);
}

?>