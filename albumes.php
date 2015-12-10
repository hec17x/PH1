<?php 
session_start();
if(!isset($_SESSION['user']) AND !isset($_COOKIE['user']))
{
  header("Location: index.php");
}

  include('cabecera.inc');
  include('sidebar.inc');   
  ?>
  
  <div id="datos">

       <?php

      $var =0;

      if(!($iden = mysql_connect("localhost", "root", "")))
        die("Error: No se pudo conectar");

       if(!mysql_select_db("p&i", $iden))
       die("Error: No existe la base de datos");
      
      if(isset($_COOKIE['user'])){
          $user = $_COOKIE['user'];
        }

      else if(isset($_SESSION['user'])){   
        $user=$_SESSION['user'];
        }

    $consulta1='SELECT * FROM Usuarios WHERE NomUsuario="'.$user.'"';
                            $resultado1=mysql_query($consulta1);
                             while ($lista1=mysql_fetch_array($resultado1)) {
                                $usuario=$lista1['IdUsuario'];
                             }

         $consulta2='SELECT * FROM Albumes WHERE Usuario="'.$usuario.'"';
                          $resultado2=mysql_query($consulta2);
         
    

        if($resultado2){
            while ($lista2=mysql_fetch_array($resultado2)) {
                                 
           $array[] = $lista2["IdAlbum"]; 
                 }
    }
    //numero de albumes en el array:
    $contarAlbum = count($array);

if($contarAlbum!=0){ //Creo que este if soluciona el problema de error si el usuario no tiene fotos.
      
  if($contarAlbum == 1)   
      $sentencia="SELECT * FROM fotos WHERE Album=".$array[0]."        ORDER BY FRegistro DESC";
     
  if($contarAlbum == 2)   
      $sentencia="SELECT * FROM fotos WHERE Album=".$array[0]." or Album = ".$array[1]."       ORDER BY FRegistro DESC";
    if($contarAlbum == 3)   
      $sentencia="SELECT * FROM fotos WHERE Album=".$array[0]." or Album = ".$array[1]."  or Album = ".$array[2]."     ORDER BY FRegistro DESC";
      


      $resultado = mysql_query($sentencia, $iden);
        if(!$resultado)
          die("Error: no se pudo realizar la consulta");
         
         
}

  ?>
      

    <h3>Éstos son tus álbumes:</h3>

      <?php
        while ($lista1=mysql_fetch_array($resultado1)) {
           
             $usuario=$lista1['IdUsuario'];
              }
         
          $consulta='SELECT * FROM Albumes WHERE Usuario="'.$usuario.'"';
          $resultado=mysql_query($consulta, $iden);

        while ($lista=mysql_fetch_array($resultado)) {
          $idbm= $lista['IdAlbum'];
            echo "<a href='verAlbum.php?id=$idbm'>","<input type='submit' name='Album' value=".$lista['Titulo']."></input></a>
        <b> Descripcion:</b> ".$lista['Descripcion']."
                  <br>"."<br>";
             }
             ?>

  </div>

<?php 

  ?>