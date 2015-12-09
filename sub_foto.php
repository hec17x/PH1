
  <?php 
   include('cabecera.inc');
   
  ?>
  

<?php
session_start();
   $titulo = $_POST['Titulo'];
   $Fsubida = $_POST['fecha'];
   

    //Validamos si hemos seleccionado un sexo y un album///////////////////////////////////////////////******************

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
   


   $descripcion = $_POST['Descripcion'];
   $archivo = $_FILES['archivo']; 
          if (!isset($archivo)) 
             { die("Debes Elejir un archivo para cargar!"); } 
  $directorio  = './upload/fotos/';
   $nombre = $_FILES['archivo']['name'];

    $user=$_SESSION['user'];

   move_uploaded_file($_FILES['archivo']['tmp_name'], $directorio.$nombre);

  if(!($iden = mysql_connect("localhost", "root", "")))
    die("Error: No se pudo conectar");
  // Selecciona la base de datos
  if(!mysql_select_db("p&i", $iden))
    die("Error: No existe la base de datos");


 $fecha = date('Y-m-d H:i:s');

 $sentencia = "INSERT INTO fotos(Titulo, Descripcion, Fecha, Pais, Album, Fichero, FRegistro) VALUES('$titulo','$descripcion','$Fsubida','$pais','$album','$nombre', '$fecha')";
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

?>

<?php 

  ?>