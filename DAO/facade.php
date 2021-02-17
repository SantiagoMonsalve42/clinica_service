<?php
include 'admonDAO.php';
include 'medicoDAO.php';
include 'pacienteDAO.php';
include 'especialidadDAO.php';

class facade{
    public function TipoUser($idmail){//FUNCION PARA IDENTIFICAR TIPO DE USUARIO CON EL MAIL O ID
        $tipo=0;                  //1= admon con mail  
        $objA=new admonDAO();    //2=medico con mail  3=medico con id
        $objM=new medicoDAO();   //4=paciente con mail 5=paciente con id
        $objP=new pacienteDAO();  //0=no existe
        $resul1=json_decode($objA->readall(),true);
        $resul2=json_decode($objM->readall(),true);
        $resul3=json_decode($objP->readall(),true);
        for($i=0;$i<count($resul1);$i++){
          if($resul1[$i]['correo'] == $idmail){
              $tipo=1;//es admin 
          }
        }
        for($i=0;$i<count($resul2);$i++){
           if($resul2[$i]['correo'] == $idmail ){
               $tipo=2;//es medico con mail
           }
           if( $resul2[$i]['idmedico'] == $idmail){
               $tipo=3;//es medico con id
           }
        }
        for($i=0;$i<count($resul3);$i++){
           if($resul3[$i]['correo'] == $idmail){
               $tipo=4;//es paciente con correo
           }
           if($resul3[$i]['idpaciente'] == $idmail ){
               $tipo=5;//es paciente con id
           }
        }
        return $tipo;
       }

       public function encriptarClave($pass){
        $newPassword = md5($pass);
        return $newPassword;
    }

    public function validarCredencial($mail,$pass1){//funcion para validar clave y correo/id
        $direccionador1=0;
        $tipo=$this->TipoUser($mail);
        $pass=$this->encriptarClave($pass1);
        $objA=new admonDAO();    //direcionador =1 mandar a admon
        $objM=new medicoDAO();   //direcionar=2 mandar a medico
        $objP=new pacienteDAO();  //direccionar=3 mandar a paciente
        $resul1=json_decode($objA->readall(),true); //error en datos
        $resul2=json_decode($objM->readall(),true);
        $resul3=json_decode($objP->readall(),true);
       if($tipo==1){
           for($i=0;$i<count($resul1);$i++){
               if($resul1[$i]['correo'] == $mail && $resul1[$i]['clave'] == $pass){
                  
                   $direccionador1=1;//es admin 
                   
               }
           }
       }
       if($tipo==2){
           for($i=0;$i<count($resul2);$i++){
               if($resul2[$i]['correo'] == $mail && $resul2[$i]['clave'] == $pass){
                   $direccionador1=2;//es medico 
               }
           }
       }
       if($tipo==3){
           for($i=0;$i<count($resul2);$i++){
               if($resul2[$i]['id_medico'] == $mail && $resul2[$i]['clave'] == $pass){
                   $direccionador1=2;//es medico
               }
           }
       }
       if($tipo==4){
           for($i=0;$i<count($resul3);$i++){
               if($resul3[$i]['correo'] == $mail && $resul3[$i]['clave'] == $pass){
                   $direccionador1=3;//es paciente
               }
           }
       }
       if($tipo==5){
           for($i=0;$i<count($resul3);$i++){
               if($resul3[$i]['id_paciente'] == $mail && $resul3[$i]['clave'] == $pass){
                   $direccionador1=3;//es paciente
               }
           }
       }
       return $direccionador1;
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