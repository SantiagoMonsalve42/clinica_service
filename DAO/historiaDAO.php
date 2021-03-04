<?php

require_once("../config.php");
class historiaDAO extends config{
    private $admons;
    private $data;
    public function __construct(){
        $this->admons=array();
        $this->data['historia']=array();
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

        $sql="select idhistoria, peso, altura, motivo_consulta, enfermedades, alergias, medicamentos, antecedentes_personales, antecedentes_familiares
	    from historia_clinica 
        where paciente_idpaciente = (SELECT idpaciente from paciente where correo = '$id')";
        $link=$this->con();
        $resul=mysqli_query($link,$sql);

        if($link->affected_rows >0){
            while($row=$resul->fetch_array()){
                array_push($this -> data['historia'], array(
                    'idhistoria'=>$row['idhistoria'],
                    'peso'=>$row['peso'],
                    'altura'=>$row['altura'],
                    'motivo_consulta'=>$row['motivo_consulta'],
                    'enfermedades'=>$row['enfermedades'],
                    'alergias'=>$row['alergias'],
                    'medicamentos'=>$row['medicamentos'],
                    'antecedentes_personales'=>$row['antecedentes_personales'],
                    'antecedentes_familiares'=>$row['antecedentes_familiares']
                ));
            }
            return json_encode($this -> data);
        }

    }
    
    public function readOneById2($id){
        
        $sql="select idhistoria, peso, altura, motivo_consulta, enfermedades, alergias, medicamentos, antecedentes_personales, antecedentes_familiares
	    from historia_clinica
        where paciente_idpaciente = (SELECT idpaciente from paciente where correo = '$id')";
        $link=$this->con();
        $resul=mysqli_query($link,$sql);
        
        if($link->affected_rows > 0){
            while($row=$resul->fetch_array()){
                array_push($this -> admons, array($row[0], $row[1],$row[2],$row[3],$row[4],$row[5],$row[6],$row[7],$row[8]));
            }
            return $this -> admons;
        }
        
    }

    public function insert($peso,$altura,$motConsulta,$enfermedades,$alergias,$medicamentos,$antPersonales,$antFamiliares,$idpaciente){ //create
        $sql="insert into historia_clinica(peso,altura,motivo_consulta,enfermedades,alergias,medicamentos,antecedentes_personales,
                                            antecedentes_familiares,paciente_idpaciente)values
        ('$peso','$altura','$motConsulta','$enfermedades','$alergias','$medicamentos','$antPersonales','$antFamiliares','$idpaciente')";
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