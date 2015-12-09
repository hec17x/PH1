
  <?php 
   include('cabecera.inc');
   include('inicio.inc');
  ?>
  

<?php
session_start();
   $id = $_POST['Id_usuario'];
   $user = $_POST['usuario'];
   $password = $_POST['contrasenya'];
   $email = $_POST['Email'];
   $nacimiento = $_POST['R_Nacimiento'];
   $ciudad = $_POST['R_ciudad'];

//Hacemos las mierda de validaciones aqui tambien por si acaso

//validamos usuario*******************************************************************************************
if (preg_match('/^[a-zA-Z0-9]{3,15}$/',$user)){ 

//Usuario correcto

}else{

?>

<script type="text/javascript">
    alert("Nombre de usuario incorrecto");
    stop();
    history.back();
  
  </script>
  
  <?php
}


//validamos contraseña********************************************************************************************

if(($password=="") || ($password==" ")){

?>

<script type="text/javascript">
    alert("Introduce una contraseña");
    stop();
    history.back();
  </script>
  
  <?php



}else{

      if(!(preg_match('/(^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])[a-zA-Z0-9_]{6,15}$)/',$password)) ){

          //error
          ?>

          <script type="text/javascript">
              alert("Contraseña incorrecta");
              stop();
              history.back();
            </script>
            
            <?php

      }else{

          //correcta
          }
}


// Validamos EMAIL ********************************************************************************/*********

if(preg_match('/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/',$email)){
 //correcto
 }
else{
 
    ?> 

    <script type="text/javascript">
    alert("Email Incorrecto");
    stop();
    history.back();
    </script>
  
    <?php
}


//validamos fecha de nacimiento*****************************************************************************

  if($nacimiento == null || $nacimiento == ""){
    ?>
    <script type="text/javascript">
    alert("La fecha introducida es incorrecta.");
    stop();
    history.back();
    </script>
    <?php
  }




  if(!($iden = mysql_connect("localhost", "root", "")))
    die("Error: No se pudo conectar");
  // Selecciona la base de datos
  if(!mysql_select_db("p&i", $iden))
    die("Error: No existe la base de datos");




$sentencia = "UPDATE usuarios
          SET NomUsuario='$user', Clave='$password', Email = '$email', FNacimiento='$nacimiento', Ciudad='$ciudad'
          WHERE IdUsuario='$id'";





 $fecha = date('Y-m-d H:i:s');

 

  //ejecutamos la sentencias
  $resultado = mysql_query($sentencia, $iden);
  if(!$resultado)
  {
   echo "<br>";
   echo "<br>";
   echo "<br>";
   echo "<br>";
   echo "<br>";
   echo "<br>";

  ?>
  <script type="text/javascript">
        alert("Este usuario ya esta ocupado");
        stop();
        history.back();
  </script>
  <?php
  }
  else{ 
     setcookie('user',$user,time()+ 365 * 24 * 60 * 60);
     setcookie('pass',$password,time()+365 * 24 * 60 * 60);
     $_SESSION['user'] = $user;
     $_SESSION['pass'] = $password;
    }

   echo "<br>";
   echo "<br>";
   echo "<br>";
   echo "<br>";
   echo "Datos actualizados con éxito:";
   echo "<br>";
   echo "<br>";
   echo "Usuario: " .$user;
   echo "<br>";      
   echo "<br>";
   echo "Contraseña: " .$password;
   echo "<br>";      
   echo "<br>";
   echo "Email: " .$email;
 
   echo "<br>";      
   echo "<br>";
   echo "Fecha Nacimiento: " .$nacimiento;
   echo "<br>";      
   echo "<br>";
   echo "Ciudad: " .$ciudad;
   echo "<br>";      
   echo "<br>";




   echo '<script language="javascript">
    function redireccionarPagina() {
        window.location = "perfil.php";
      }
      setTimeout("redireccionarPagina()", 5000);
    
    </script>';  



?>

<?php 
    include('pie.inc');
  ?>