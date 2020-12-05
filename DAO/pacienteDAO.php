<?php

require_once("../config.php");
class pacienteDAO extends config{
    private $admons;
    public function __construct(){
        $this->pacientes=array();
    }

    public function readall(){  //read
        $sql="select * from paciente";
        $link=$this->con(); 
        $resul=mysqli_query($link,$sql);
        while($row=$resul->fetch_assoc()){
            $this->pacientes[]=$row;
        }
        return json_encode( $this->pacientes);
    }
    public function readOneById($id){
       
     $sql="select * from paciente where idpaciente='$id' or correo ='$id'";
     $link=$this->con();       
     $resul=mysqli_query($link,$sql);

            if($link->affected_rows >0){
                while($row=$resul->fetch_assoc()){
                    $array=$row;
                }
                return json_encode($array);
            }
            else
            return null;
            
    }
    public function getMail($mail){
        $sql="select * from paciente where correo='$mail'";
        $link=$this->con();       
        $resul=mysqli_query($link,$sql);
        $tam=$resul->num_rows;
        return $tam;
    }
    public function getMailPswd($mail,$clave){
        $sql="select * from paciente where correo='$mail' and clave='$clave'";
        $link=$this->con();       
        $resul=mysqli_query($link,$sql);
        $tam=$resul->num_rows;
        return $tam;
    }

    public function insert($name,$lastname,$mail,$pass,$cc,$tel,$ask,$ans,$date){ //create

        $est=1;
        $sql="insert into paciente(nombre,apellido,correo,clave,cedula,telefono,pregunta,respuesta,fecha_nacimiento,estado)values
        ('$name','$lastname','$mail',md5('$pass'),'$cc','$tel','$ask','$ans',$date,0)";
        $resul=mysqli_query($this->con(),$sql);
        if($resul){
            return true;
        }else{
            return false;
        }
    }
    public function delete($id){ //delete
        $sql="delete from paciente where ipaciente=$id";
        $resul=mysqli_query($this->con(),$sql);
        if($resul){
            return true;
        }else{
            return false;
        }
    }
    
    public function updatePass($id,$pass){//update
        $sql="update paciente set clave='$pass'
        where idpaciente='$id'";
        $resul=mysqli_query($this->con(),$sql);
       return $resul;
    }
}
?>