
  <?php 
   include('cabecera.inc');
   
  ?>
  

<?php
session_start();
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

   
  if(!($iden = mysql_connect("localhost", "Hector", "")))
    die("Error: No se pudo conectar");
  // Selecciona la base de datos
  if(!mysql_select_db("P&I", $iden))
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
   echo "Album creado con éxito.";


?>

<?php 
    include('pie.inc');
  ?>