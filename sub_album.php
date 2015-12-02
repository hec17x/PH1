
  <?php 
  session_start();
   include('cabecera.inc');


  ?>
  

<?php

   $titulo = $_POST['Titulo'];
   $Fsubida = $_POST['fecha'];
   if(isset($_POST['R_pais'])){
    $pais = $_POST['R_pais'];
   }
   else
   {
    $pais=null;
   }
   
   $descripcion = $_POST['Descripcion'];

   
    $user=$_SESSION['user'];

   
  if(!($iden = mysql_connect("localhost", "root", "")))
    die("Error: No se pudo conectar");
  // Selecciona la base de datos
  if(!mysql_select_db("p&i", $iden))
    die("Error: No existe la base de datos");



 $user=$_SESSION['user'];
  $sentencia1 = "SELECT IdUsuario FROM usuarios WHERE NomUsuario='$user'";
    // Ejecuta la sentencia SQL
    $resultado = mysql_query($sentencia1, $iden);
    if(!$resultado)
    die("Error: no se pudo realizar la consulta");
  
   while($fila = mysql_fetch_assoc($resultado))
  {
    $id=$fila['IdUsuario'];
  }


 $sentencia = "INSERT INTO albumes(Titulo, Descripcion, Fecha, Pais, Usuario) VALUES('$titulo','$descripcion','$Fsubida', '$pais', '$id')";
  // Ejecuta la sentencia SQL
  $resultado = mysql_query($sentencia, $iden);
  if(!$resultado)
  {
    die("Error crear el album");
  }



   echo "<br>";
   echo "<br>";
   echo "<br>";
   echo "<br>";
   echo "<h1>Album creado con éxito.</h1>";

    echo '<script language="javascript">
    function redireccionarPagina() {
        window.location = "perfil.php";
      }
      setTimeout("redireccionarPagina()", 2000);
    
    </script>';  

?>

<?php 

  ?>