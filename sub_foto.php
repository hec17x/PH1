
  <?php 
   include('cabecera.inc');
   
  ?>
  

<?php
session_start();
   $titulo = $_POST['Titulo'];
   $Fsubida = $_POST['fecha'];
   $descripcion = $_POST['Descripcion'];
   

    //Validamos si hemos echo las cosas y un album///////////////////////////////////////////////******************
if(($titulo=="") || ($titulo==" ")){
      ?>

      <script type="text/javascript">
          alert("Introduce un Titulo");
          stop();
          history.back();
        </script>
        <?php
}

if(($descripcion=="") || ($descripcion==" ")){

?>

<script type="text/javascript">
    alert("Introduce una descripcion");
    stop();
    history.back();
  </script>
  
  <?php
}



if(isset($_POST['Album'])){
    $album = $_POST['Album'];
}
else{

    ?>

    <script type="text/javascript">
    alert("Seleccione un Album");    
    stop();
    history.back();
    </script>
    
    <?php
}  

if(isset($_POST['R_pais'])){
    $pais = $_POST['R_pais'];
}
else{

    ?>

    <script type="text/javascript">
    alert("Seleccione un Pais");    
    stop();
    history.back();
    </script>
    
    <?php
}



$album = $_POST['Album'];
   


   


   if(isset($_COOKIE['user'])){
      $user = $_COOKIE['user'];
    }

  else if(isset($_SESSION['user'])){   
    $user=$_SESSION['user'];
    }


  if(!($iden = mysql_connect("localhost", "root", "")))
    die("Error: No se pudo conectar");
  // Selecciona la base de datos
  if(!mysql_select_db("p&i", $iden))
    die("Error: No existe la base de datos");


 $fecha = date('Y-m-dH-i-s');



if($_FILES['uploadedfile']['name'] == 0){


    $target_path = "upload/fotos/";
    $target_path = $target_path . basename( $_FILES['uploadedfile']['name']); 

    if(move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $target_path))
    { 
      echo "El archivo ". basename( $_FILES['uploadedfile']['name']). " ha sido subido";
      rename ("$target_path", "upload/fotos/".$album .$fecha.".jpg");
  


     $fichero = $album. $fecha. ".jpg";

     $sentencia = "INSERT INTO fotos(Titulo, Descripcion, Fecha, Pais, Album, Fichero, FRegistro) 
                  VALUES('$titulo','$descripcion','$Fsubida','$pais','$album','$fichero', '$fecha')";
      // Ejecuta la sentencia SQL
      $resultado = mysql_query($sentencia, $iden);
      if(!$resultado)
      {
        die("Error al subir la foto");
      }



       echo "<br>";
       echo "<br>";
       echo "<br>";
       echo "<br>";
       echo "<h1>Foto subida con exito.</h1>";

     echo '<script language="javascript">
        function redireccionarPagina() {
            window.location = "perfil.php";
          }
          setTimeout("redireccionarPagina()", 2000);
        
        </script>';
          } 
    else{
      echo "<h3>No se ha subido la foto, intentelo de nuevo.</h3>";
      echo '<script language="javascript">
        function redireccionarPagina() {
            window.history.back();
          }
          setTimeout("redireccionarPagina()", 3000);
        
        </script>';
    }
}      
else{
    die("ya existe este titulo/foto en este album o hubo un error al subir la foto");
}
