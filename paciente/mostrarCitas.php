<?php
include('../config.php');
$conf= new config();
$link= $conf->con();
if(isset($_GET['correo'])){
    
    $sql="select cita.fecha,cita.hora from cita,paciente where paciente.correo ='".$_GET['correo']."'";
    $res=$link->query($sql);
    if($res->num_rows>0){
        $return_med['cita']=array();
        while($row=$res->fetch_array()){
            array_push($return_med['cita'],
            array('fecha'=>$row['fecha'],
                   'hora'=>$row['hora']
                ));

    }
    echo json_encode($return_med);
 }
 
}

else{
    echo "A la espera de un correo";
}
?>
