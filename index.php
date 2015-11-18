
  <?php 
  session_start();
    include('cabecera.inc');
   include('inicio.inc');
    include('acceso.inc');
  ?>
  <section id="content-index">

  <div id="login-abrir"onclick="action()" >
      <?php
     if(isset($_COOKIE['user']) OR isset($_SESSION['user']) )
      {
        if(isset($_COOKIE['user']))
        {
        echo"<p id='login-abrir-nombre ''>Hola ".$_COOKIE['user']."</p>
         <img id='login-abrir-delante' src='images/delante.png'  alt='foto'>
          <img id='login-abrir-atras' src='images/atras.png'  alt='foto'>";
        }

        else if(isset($_SESSION['user']))
        {
           echo"<p id='login-abrir-nombre ''>Hola ".$_SESSION['user']."</p>
         <img id='login-abrir-delante' src='images/delante.png'  alt='foto'>
          <img id='login-abrir-atras' src='images/atras.png'  alt='foto'>";
        }

      }
      else
      {
         echo "       
         <p id='login-abrir-nombre ''>Login</p>
         <img id='login-abrir-delante' src='images/delante.png'  alt='foto'>
          <img id='login-abrir-atras' src='images/atras.png'  alt='foto'>";
      }
       ?>
  </div>

  <div id="selector-ordenacion">

  <h2>Últimas actualizaciones:</h2>
      <select id="Nordenacion" name="Nordenacion" onchange="ordenar()">
                <option value="" disabled selected>Ordenar por</option>
                <option value="Fecha">Fecha</option>
                <option value="Titulo">Titulo</option>
                <option value="Pais">Pais</option>
            </select>
      <select id="Tordenacion" name="Tordenacion" onchange="ordenar()">
                <option value="Ascendente" disabled selected>Tipo de ordenacion</option>
                <option value="Ascendente">Ascendente</option>
                <option value="Descendente">Descendente</option>
            </select>
          
  </div>
 <div id="fotos">

  </div>
 </section>
  <?php 
    include('pie.inc');
  ?>
  

