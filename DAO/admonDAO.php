<?php

require_once("../config.php");
class admonDAO extends config{
    private $admons;
    public function __construct(){
        $this->admons=array();
    }

    public function readall(){  //read
        $sql="select * from administrador";
        $link=$this->con(); 
        $resul=mysqli_query($link,$sql);
        while($row=$resul->fetch_assoc()){
            $this->admons[]=$row;
        }
        return json_encode( $this->admons);
    }
    public function readOneById($id){
       
     $sql="select * from administrador where idadministrador=$id";
     $link=$this->con();       
     $resul=mysqli_query($link,$sql);

            if($link->affected_rows >0){
                while($row=$resul->fetch_assoc()){
                    $array=$row;
                }
                return json_encode($array);
            }
            else
            return "No hay ID's aun";
            
    }
    public function getMail($mail){
        $sql="select * from administrador where correo='$mail'";
        $link=$this->con();       
        $resul=mysqli_query($link,$sql);
        $tam=$resul->num_rows;
        return $tam;
    }
    public function getMailPswd($mail,$clave){
    $sql="select correo,clave from administrador where correo='$mail' and clave='md5($clave)'";
        $link=$this->con();       
        $resul=mysqli_query($link,$sql);
        $tam=$resul->num_rows;
        return $tam;
    }

    public function insert($name,$lastname,$mail,$pass,$ask,$ans){ //create
        $sql="insert into administrador(nombre,apellido,correo,clave,pregunta,respuesta)values
        ('$name','$lastname','$mail','$pass','$ask','$ans')";
        $resul=mysqli_query($this->con(),$sql);
        if($resul){
            return true;
        }else{
            return false;
        }
    }
    public function delete($id){ //delete
        $sql="delete from administrador where idadministrador=$id";
        $resul=mysqli_query($this->con(),$sql);
        if($resul){
            return true;
        }else{
            return false;
        }
    }
    
    public function updatePass($id,$pass){//update
        $sql="update administrador set clave='$pass'
        where idadministrador='$id'";
        $resul=mysqli_query($this->con(),$sql);
       return $resul;
    }
}

?>