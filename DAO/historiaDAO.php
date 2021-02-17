<?php

require_once("../config.php");
class historiaDAO extends config{
    private $admons;
    public function __construct(){
        $this->admons=array();
    }

    public function readall(){  //read
        $sql="select * from historia_clinica";
        $link=$this->con();
        $resul=mysqli_query($link,$sql);
        while($row=$resul->fetch_assoc()){
            $this->admons[]=$row;
        }
        return json_encode( $this->admons);
    }
    public function readOneById($id){

        $sql="select * from historia_clinica where idhistoria=$id";
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

    public function insert($peso,$altura,$motConsulta,$enfermedades,$alergias,$medicamentos,$antPersonales,$antFamiliares){ //create
        $sql="insert into historia_clinica(peso,altura,motivo_consulta,enfermedades,alergias,medicamentos,antecedentes_personales,
                                            antecedentes_familiares)values
        ('$peso','$altura','$motConsulta','$enfermedades','$alergias','$medicamentos',$antPersonales,'$antFamiliares')";
        $resul=mysqli_query($this->con(),$sql);
        if($resul){
            return true;
        }else{
            return false;
        }
    }
    public function delete($id){ //delete
        $sql="delete from historia_clinica where idhistoria=$id";
        $resul=mysqli_query($this->con(),$sql);
        if($resul){
            return true;
        }else{
            return false;
        }
    }

    public function update($idhistoria,$peso,$altura,$motConsulta,$enfermedades,$alergias,$medicamentos,$antPersonales,$antFamiliares){//update
        $sql="update historia_clinica set peso='$peso', altura='$altura',motivo_consulta='$motConsulta',enfermedades='$enfermedades',
                            alergias='$alergias',medicamentos='$medicamentos',antecedentes_personales='$antPersonales', antecedentes_familiares= '$antFamiliares'
        where idhistoria='$idhistoria'";
        $resul=mysqli_query($this->con(),$sql);
        return $resul;
    }

}
?>