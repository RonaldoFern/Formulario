<?php
    $usuario= 'root';
    $senha= '';
    $database= 'db_login';
    $host= 'localhost';

    $mysqli = new mysqli($host, $usuario, $senha, $database);

     if ($mysqli->error){
         die("falha 100" . $mysqli->error);
     }




