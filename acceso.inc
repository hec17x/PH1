<section id="content-index">
      
      <form id="miForm" action="control_acceso.php" method="get" onsubmit="return valida(this)">
        <img src="images/logo2.png"  alt="foto">
        <p>Ingresa tu cuenta aqui</p>
        <div id="formulario">
          <div id="user">
        <input id="L_Usuario"type="text" name="usuario" placeholder="Usuario" metho="post" >
        
          <span class="bar"></span>
          <label for="L_Usuario">Usuario</label>
            </div>
          </div>
          <div id="formulario">
          <input id="L_Contrasenya" type="password" name="password" placeholder="Contraseña" >
          
          <span class="bar"></span>
          <label for="L_Contraseña">Contraseña</label>
          </div>
          <br>
          <br>
          <div id="formulario">
          <input type="submit" value="Enviar">
          <br>
          <br>
          <p>¿Eres nuevo en Pictures & Images? <a href="registro.php">Registrate</a></p> 

          </div>
      </form>