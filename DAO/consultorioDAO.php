<?php

require_once("../config.php");
class consultorioDAO extends config{
    private $admons;
    public function __construct(){
        $this->admons=array();
    }

    public function readall(){  //read
        $sql="select * from consultorio";
        $link=$this->con(); 
        $resul=mysqli_query($link,$sql);
        while($row=$resul->fetch_assoc()){
            $this->admons[]=$row;
        }
        return json_encode( $this->admons);
    }
    public function readallArray(){  //read
        $sql="select * from consultorio";
        $link=$this->con(); 
        $resul=mysqli_query($link,$sql);
        while($row=$resul->fetch_assoc()){
            $this->admons[]=$row;
        }
        return $this->admons;
    }
    public function readOneById($id){
       
     $sql="select * from consultorio where idconsultorio=$id";
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
        $sql="select * from consultorio where nombre='$name'";
        $link=$this->con();       
        $id=0;
        $resul=mysqli_query($link,$sql);
        if($link->affected_rows == 1){
            while($row=$resul->fetch_assoc()){
                $id=$row['idconsultorio'];
            }  
        }
        return $id;
    }

    public function insert($name){ //create
        $sql="insert into consultorio(nombre)values
        ('$name')";
        $resul=mysqli_query($this->con(),$sql);
        if($resul){
            return true;
        }else{
            return false;
        }
    }
    public function delete($id){ //delete
        $sql="delete from consultorio where idconsultorio=$id";
        $resul=mysqli_query($this->con(),$sql);
        if($resul){
            return true;
        }else{
            return false;
        }
    }
    
    public function updateName($id,$pass){//update
        $sql="update consultorio set nombre='$pass'
        where idconsultorio=$id";
        $resul=mysqli_query($this->con(),$sql);
       return $resul;
    }
}
?>