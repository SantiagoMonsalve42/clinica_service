<?php

class config{
    function con(){
        $host="localhost";
        $user="root";
        $pass="";
        $bdname="clinica";
        $RUTA="https://clinica-service.000webhostapp.com/";
        $link=mysqli_connect($host,$user,$pass)
        or die("Error 1 del tipo: ".mysqli_error($link));

        mysqli_select_db($link,$bdname)
        or die("Error 2 del tipo:".mysqli_error($link));
        return $link;
    }

    function ejecutar($sentencia){
        $this -> resultado = $this -> mysqli -> query($sentencia);
    }

    function cerrar(){
        $this -> mysqli -> close();
    }
     function numFilas(){
        if($this -> resultado!=null){
            return $this -> resultado -> num_rows;
        }else{
            return 0;
        }
    }
    function extraer(){
        return $this -> resultado -> fetch_row();
    }

    function ultimoId(){
        return $this -> mysqli -> insert_id;
    }
}
?>
