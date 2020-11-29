<?php



if(isset($_POST['name']) && isset($_POST['last_name']) && isset($_POST['mail']) && 
isset($_POST['pass']) && isset($_POST['ask']) && isset($_POST['answer'])){

    require_once '../DAO/facade.php';
    require_once '../DAO/admonDAO.php';
    

    $name=$_POST['name'];
    $lastname=$_POST['last_name'];
    $mail=$_POST['mail'];
    $pass=$_POST['pass'];
    $passreal=md5($pass);
    $askr=$_POST['ask'];
    $ans=$_POST['answer'];
     $adminDAO = new admonDAO();
     $facade = new facade();
     if($facade->validarMail($mail) == 1){
    
    $resul=$adminDAO->insert($name,$lastname,$mail,$passreal,$askr,$ans);
      echo $resul;
     }else{
         echo 0;
     }
} 
?>
