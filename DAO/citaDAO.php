<?php

require_once("../config.php");
class citaDAO extends config{
    private $admons;
    public function __construct(){
        $this->admons=array();
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
       
     $sql="select * from cita where idcita=$id";
     $link=$this->con();       
     $resul=mysqli_query($link,$sql);

            if($link->affected_rows >0){
                while($row=$resul->fetch_assoc()){
                    $array=$row;
                }
                return json_encode($array);
            }
            else
            return "Falla";
            
    }

    public function insert($date,$time,$idmedico,$idpaciente,$idconsultorio,$estado){ //create
        $sql="insert into medico(fecha,hora,medico_idmedico,paciente_idpaciente,consultorio_idconsultorio,estado)values
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