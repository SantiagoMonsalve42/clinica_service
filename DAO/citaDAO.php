<?php

require_once("../config.php");
class citaDAO extends config{
    private $admons;
    public function __construct(){
        $this->admons['cita']=array();
    }

    public function readall(){  //read
        $sql="select * from cita";
        $link=$this->con(); 
        $resul=mysqli_query($link,$sql);
        while($row=$resul->fetch_assoc()){
            $this->admons[]=$row;
        }
        return json_encode( $this->admons);
    }
    public function readOneById($id){
       
     $sql="select c.idcita,p.nombre,p.apellido,c.fecha,c.hora,cc.nombre as consult from 
     paciente p,cita c,consultorio cc where p.idpaciente = c.paciente_idpaciente 
     and cc.idconsultorio = c.consultorio_idconsultorio and 
     c.medico_idmedico=( SELECT idmedico FROM medico WHERE correo ='$id') 
     and c.fecha = CURDATE() and c.hora >= DATE_FORMAT(NOW( ), '%H:%i:%S') 
     and c.estado=1 order by c.fecha,c.hora";
     $link=$this->con();       
     $resul=mysqli_query($link,$sql);

            if($link->affected_rows >0){
                while($row=$resul->fetch_array()){
                    array_push($this->admons['cita'],array(
                        'idcita'=> $row['idcita'],
                        'nombre'=> $row['nombre'],
                        'apellido'=> $row['apellido'],
                        'fecha'=> $row['fecha'],
                        'hora'=> $row['hora'],
                        'consult'=> $row['consult']
                    ));
                }
                return json_encode( $this->admons);
            }
            
    }
    public function readOneByMailAndHour($id,$hour){
       
        $sql="select c.idcita,p.idpaciente,p.nombre,p.apellido,c.fecha,c.hora,cc.nombre as consult from 
        paciente p,cita c,consultorio cc where p.idpaciente = c.paciente_idpaciente 
        and cc.idconsultorio = c.consultorio_idconsultorio and 
        c.medico_idmedico=( SELECT idmedico FROM medico WHERE correo ='$id') 
       and c.hora = '$hour'";
        $link=$this->con();       
        $resul=mysqli_query($link,$sql);
   
               if($link->affected_rows >0){
                   while($row=$resul->fetch_array()){
                       array_push($this->admons['cita'],array(
                           'idpaciente'=> $row['idpaciente'],
                           'nombre'=> $row['nombre'],
                           'apellido'=> $row['apellido'],
                           'fecha'=> $row['fecha'],
                           'hora'=> $row['hora'],
                           'consult'=> $row['consult'],
                           'idcita'=> $row['idcita']
                       ));
                   }
                   return json_encode( $this->admons);
               }
               
       }


    public function insert($date,$time,$idmedico,$idpaciente,$idconsultorio,$estado){ //create
        $sql="insert into cita(fecha,hora,medico_idmedico,paciente_idpaciente,consultorio_idconsultorio,estado)values
        ('$date','$time','$idmedico','$idpaciente','$idconsultorio','$estado')";
        $resul=mysqli_query($this->con(),$sql);
        if($resul){
            return true;
        }else{
            return false;
        }
    }
    public function delete($id){ //delete
        $sql="delete from cita where idcita=$id";
        $resul=mysqli_query($this->con(),$sql);
        if($resul){
            return true;
        }else{
            return false;
        }
    }

    public function update($id,$date,$time,$estado){//update
        $sql="update cita set fecha='$date', hora='$time',estado='$estado'
        where idcita='$id'";
        $resul=mysqli_query($this->con(),$sql);
       return $resul;
    } 
    
    public function ver_citas() {
        $sql = "select c.idcita, c.fecha, c.hora, cn.nombre, p.nombre, p.apellido from cita c, consultorio cn, paciente p, medico m
                where m.idmedico = c.medico_idmedico and p.idpaciente = c.paciente_idpaciente and cn.idconsultorio = c.consultorio_idconsultorio";
        $resul=mysqli_query($this->con(),$sql);
        return $resul;
    }

}
?>