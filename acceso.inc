<div id='login-lateral'>
<?php
if (isset($_COOKIE['user'])) 
{
   echo "<div id='formulario'>
   <br>
   <br>
   ";

 echo "<p>Ultimo acceso a la plataforma:</p>";
 if(isset($_COOKIE['fecha'])) echo "<p>".$_COOKIE['fecha']."</p>";
  echo "        <a href='perfil.php'> <input type='submit' value='Acceder a Plataforma'></a>
           
       ";

  echo "        <a href='sesionFin.php'> <input type='submit' value='Cerrar Sesion'></a>
            <br>
        </div>";

}
else
{
  if(isset($_SESSION['user']))
  {
     echo "<div id='formulario'>
   <br>
   <br>
   ";
       echo "        <a href='perfil.php'> <input type='submit' value='Acceder a Plataforma'></a>
           
       ";

  echo "        <a href='sesionFin.php'> <input type='submit' value='Cerrar Sesion'></a>
            <br>
        </div>";
  }
  else
  {
    echo"
        <form id='miForm' action='control_acceso.php' method='get' onsubmit='return valida(this)'>
         <p>Ingresa tu cuenta aqui</p>

          <div id='formulario'>
            <div id='user'>
          <input id='L_Usuario'type='text' name='usuario' placeholder='Usuario' metho='post' >
        
            <span class='bar'></span>
            <label for='L_Usuario'>Usuario</label>
             </div>
            </div>
            <div id='formulario'>
            <input id='L_Contrasenya' type='password' name='password' placeholder='Contraseña' >
          
           <span class='bar'></span>
            <label for='L_Contraseña'>Contraseña</label>
            </div>

            <div>
            <input type='checkbox' name='recordar'> Recordarme en este equipo</td>
            </div>

            <br>
            <br>
            <div id='formulario'>
            <input type='submit' value='Enviar'>
            <br>
            <br>
            <p>¿Eres nuevo en Pictures & Images? <a href='registro.php'>Registrate</a></p> 

            </div>
        </form>";
      }
      
    }
  
    ?>
    </div>
