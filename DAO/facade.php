<?php
include 'admonDAO.php';
include 'medicoDAO.php';
include 'pacienteDAO.php';
include 'especialidadDAO.php';

class facade{
    public function __construct(){
    }
    //cuando la funcion retorne 3 es que el mail ingresado es valido
    public function validarMail($mail){
        $obja = new admonDAO();
        $act=0;
        if($obja->getMail($mail) == 0){
            $act++;
        }
        return $act;
    }
    public function validarEspecialidad($mail){
        $obje = new especialidadDAO();
        $act=0;
        $resul=$obje->readallArray();
        for ($i=0;$i<count($resul);$i++){
            if(strtoupper($resul[$i]['nombre']) == strtoupper($mail))
            return false;
        }
        return true;
    }
  
}

?>