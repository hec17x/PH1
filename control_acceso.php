<?php
   $user = $_GET['usuario'];
   $password = $_GET['password'];

   $userH="Hector";
   $passH="Hector1";
   $userR="Roberto";
   $passR="Roberto1";
 
   if (($user == $userH OR $user == $userR) AND ($password == $passH OR $password ==$passR)){
      echo "Bienvenido ".$user;
   }
   else{
      echo "¡Usuario o contraseña incorrectos!";
      echo '<a href="'.$_SERVER['HTTP_REFERER'].'"><br>Volver</a>';
   }
?>