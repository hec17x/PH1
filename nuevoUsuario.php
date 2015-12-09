
  <?php 
   include('cabecera.inc');
   //include('inicio.inc');
  ?>

<?php

   error_reporting(0);
   $user = $_POST['usuario'];
   $password = $_POST['contrasenya'];
   $password2 = $_POST['Contraseña'];
   $email = $_POST['Email'];

   $sexo = $_POST['R_sexo'];
   
   $nacimiento = $_POST['R_Nacimiento'];
   $ciudad = $_POST['Ciudad'];
   
   if(!empty($_POST['R_pais']))          $pais = $_POST['R_pais'];


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

      if(!(preg_match('/(^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])[a-zA-Z0-9_]{6,15}$)/',$password))){

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

if($password==$password2){

    //Las contaseñas coincide
}

else{
    //contraseñas no coinciden
    ?>

    <script type="text/javascript">
        alert("Contraseñas no coinciden");
      stop();
        history.back();
      </script>
      
      <?php
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

//Validamos si hemos seleccionado uno de los dos sexos///////////////////////////////////////////////******************
if(isset($sexo)){

}
else{

    ?>

    <script type="text/javascript">
    alert("Seleccione su sexo");    
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

//Valisdamos ahora los putos paises, aunqe no lo ponga en la practica***************************************************
if(isset($pais)){

}
else{

    ?>
    <script type="text/javascript">
    alert("Selecciona un Pais");
    stop();
    history.back();
    </script>
    <?php

}





////////////////////////////fin validaciones
  
  $target_path = "upload/avatar/";
  $target_path = $target_path . basename( $_FILES['uploadedfile']['name']); 

  if(move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $target_path))
  { 
    echo "El archivo ". basename( $_FILES['uploadedfile']['name']). " ha sido subido";
    rename ("$target_path", "upload/avatar/" .$user ."00.jpg");
  } 
  else{
    echo "Ha ocurrido un error, trate de nuevo!";
  }






  if(!($iden = mysql_connect("localhost", "root", "")))
    die("Error: No se pudo conectar");
  // Selecciona la base de datos
  if(!mysql_select_db("p&i", $iden))
    die("Error: No existe la base de datos");



 $fecha = date('Y-m-d H:i:s');

 $sentencia = "INSERT INTO usuarios(NomUsuario, Clave, Email, Sexo, FNacimiento, Ciudad, Pais, FRegistro, Foto) 
                      VALUES('$user','$password','$email','$sexo','$nacimiento', '$ciudad', '$pais', '$fecha', '$target_path')";
  // Ejecuta la sentencia SQL
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
              alert("Este usuario ya existe");
              stop();
              history.back();
            
            </script>
  <?php


  }




   echo "<br>";
   echo "<br>";
   echo "<br>";
   echo "<br>";
   echo "Registro realizado con éxito:";
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
   echo "Sexo: " .$sexo;
   echo "<br>";      
   echo "<br>";
   echo "Fecha Nacimiento: " .$nacimiento;
   echo "<br>";      
   echo "<br>";
   echo "Ciudad: " .$ciudad;
   echo "<br>";      
   echo "<br>";
   echo "Pais: " .$pais;
   echo "<br>";      
   echo "<br>";
   echo "Direccion foto: " .$target_path;



    echo '<script language="javascript">
    function redireccionarPagina() {
        window.location = "index.php";
      }
      setTimeout("redireccionarPagina()", 5000);
    
    </script>';  

?>

<?php 
    include('pie.inc');
  ?>