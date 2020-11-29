<?php



if(isset($_POST['name'])){

    require_once '../DAO/facade.php';
    require_once '../DAO/especialidadDAO.php';
    

    $name=$_POST['name'];

     $espe = new especialidadDAO();
     $facade = new facade();
     if($facade->validarEspecialidad($name)){
     $resul=$espe->insert($name);
      echo $resul;
     }else{
         echo 0;
     }
} 
?>