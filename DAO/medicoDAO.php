<?php

require_once("../config.php");
class medicoDAO extends config{
    private $admons;
    public function __construct(){
        $this->admons['medico']=array();
    }

    public function readall(){  //read
        $sql="select * from medico";
        $link=$this->con(); 
        $resul=mysqli_query($link,$sql);
        while($row=$resul->fetch_assoc()){
            $this->admons[]=$row;
        }
        return json_encode( $this->admons);
    }
    public function readOneById($id){
       
     $sql="select * from medico where idmedico='$id' or correo ='$id'";
     $link=$this->con();       
     $resul=mysqli_query($link,$sql);
     if($link->affected_rows >0){
        while($row=$resul->fetch_array()){
            array_push($this->admons['medico'],array(
                'idmedico'=> $row['idmedico'],
                'nombre'=> $row['nombre'],
                'apellido'=> $row['apellido'],
                'fecha_nacimiento'=> $row['fecha_nacimiento'],
                'correo'=> $row['correo'],
                'tarjetaprofesional'=> $row['tarjetaprofesional'],
                'pregunta'=> $row['pregunta']
            ));
        }
        return json_encode( $this->admons);
    }
            
    }
    public function getMail($mail){
        $sql="select * from medico where correo='$mail'";
        $link=$this->con();       
        $resul=mysqli_query($link,$sql);
        $tam=$resul->num_rows;
        return $tam;
    }

    public function insert($name,$lastname,$date,$mail,$pass,$prof,$idespecialidad,$ask,$ans){ //create
        $sql="insert into medico(nombre,apellido,fecha_nacimiento,correo,clave,tarjetaprofesional,especialidad_idespecialidad,pregunta,respuesta)values
        ('$name','$lastname','$date','$mail','$pass','$prof',$idespecialidad,'$ask','$ans')";
        $resul=mysqli_query($this->con(),$sql);
        if($resul){
            return true;
        }else{
            return false;
        }
    }
    public function delete($id){ //delete
        $sql="delete from medico where idmedico=$id";
        $resul=mysqli_query($this->con(),$sql);
        if($resul){
            return true;
        }else{
            return false;
        }
    }
    
    public function updatePass($id,$pass){//update
        $sql="update medico set clave='$pass'
        where idmedico='$id'";
        $resul=mysqli_query($this->con(),$sql);
       return $resul;
    }

    public function update($idmedico,$name,$lastname,$mail,$prof,$ask,$ans,$date){//update
        $sql="update medico set nombre='$name', apellido='$lastname',correo='$mail',tarjetaprofesional='$prof',pregunta='$ask',respuesta='$ans',fecha_nacimiento='$date'
        where idmedico='$idmedico'";
        $resul=mysqli_query($this->con(),$sql);
       return $resul;
    } 
    
    

}
?>