<?php

require_once("../config.php");
class especialidadDAO extends config{
    private $admons;
    public function __construct(){
        $this->admons['especialidad']=array();
    }

    public function readall(){  //read
        $sql="select * from especialidad";
        $link=$this->con(); 
        $resul=mysqli_query($link,$sql);
        if ($link->affected_rows > 0){
            while($row=$resul->fetch_array()){
                array_push($this->admons['especialidad'], array(
                   'idEspecialidad' => $row['idespecialidad'],
                    'nombre' => $row['nombre']
                ));
            }
            return json_encode($this->admons);
        }
    }
    
    public function readallArray(){  //read
        $sql="select * from especialidad";
        $link=$this->con(); 
        $resul=mysqli_query($link,$sql);
        while($row=$resul->fetch_assoc()){
            $this->admons[]=$row;
        }
        return $this->admons;
    }
    public function readOneById($id){
       
     $sql="select * from especialidad where idespecialidad=$id";
     $link=$this->con();       
     $resul=mysqli_query($link,$sql);

            if($link->affected_rows >0){
                while($row=$resul->fetch_assoc()){
                    $array=$row;
                }
                return json_encode($array);
            }
            else
            return "marica";
            
    }
    public function getID($name){
        $sql="select * from especialidad where nombre='$name'";
        $link=$this->con();       
        $id=0;
        $resul=mysqli_query($link,$sql);
        if($link->affected_rows == 1){
            while($row=$resul->fetch_assoc()){
                $id=$row['idespecialidad'];
            }  
        }
        return $id;
    }

    public function insert($name){ //create
        $sql="insert into especialidad(nombre)values
        ('$name')";
        $resul=mysqli_query($this->con(),$sql);
        if($resul){
            return true;
        }else{
            return false;
        }
    }
    public function delete($id){ //delete
        $sql="delete from especialidad where idespecialidad=$id";
        $resul=mysqli_query($this->con(),$sql);
        if($resul){
            return true;
        }else{
            return false;
        }
    }
    
    public function updateName($id,$pass){//update
        $sql="update especialidad set nombre='$pass'
        where idespecialidad=$id";
        $resul=mysqli_query($this->con(),$sql);
       return $resul;
    }
}
?>