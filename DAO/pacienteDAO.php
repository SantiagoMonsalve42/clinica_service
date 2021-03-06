<?php

require_once("../config.php");
class pacienteDAO extends config{
    private $admons;
    public function __construct(){
        $this->pacientes=array();
        $this->admons=array();
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
        $pass=md5($pass);
        $est=1;
        $sql="insert into paciente(nombre,apellido,correo,clave,cedula,telefono,pregunta,respuesta,fecha_nacimiento,estado)values
        ('$name','$lastname','$mail','$pass','$cc','$tel','$ask','$ans','$date','0')";
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
    
    public function updatePass($id,$pass){//update password
        $sql="update paciente set clave='$pass'
        where idpaciente='$id'";
        $resul=mysqli_query($this->con(),$sql);
       return $resul;
    }

   public function update($idpaciente,$name,$lastname,$mail,$cc,$tel,$ask,$ans,$date){//update
        $sql="update paciente set nombre='$name', apellido='$lastname',correo='$mail',cedula='$cc',telefono='$tel',pregunta='$ask',respuesta='$ans',fecha_nacimiento='$date'
        where idpaciente='$idpaciente'";
        $resul=mysqli_query($this->con(),$sql);
       return $resul;
    }
    
    public function getName($id) {
        $sql="SELECT nombre, apellido, correo from paciente where correo = '$id'";
        $link=$this->con();
        $resul=mysqli_query($link,$sql);
        if($link->affected_rows > 0){
            while($row=$resul->fetch_array()){
                array_push($this -> admons, array($row[0], $row[1],$row[2]));
            }
            return $this -> admons;
        }
    }
}
?>