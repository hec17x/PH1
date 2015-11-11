  <?php 
    include('cabecera.inc');
    include('inicio.inc');
  ?>

<h2> Registro:</h2> 
			<div>
				<form class="Registro" action="#" method="post" onsubmit="return validaRegistro(this)" novalidate="true">
                    <p>Rellene los siguientes campos:</p>
                    <div id="formulario">	
                    <div id="user">			
					<input id="R_usuario" name="Nombre de usuario" type="text" placeholder="Nombre de usuario"/>
                    <span class="bar"></span>
					<label for="R_usuario" > Usuario: </label>
                    </div>  
                    </div>
                    <div id="formulario">
					<input id="R_contrasenya" name="Contraseña" type="password" placeholder="Contraseña"/>
                    <span class="bar"></span>
                    <label for="R_contrasenya" > Contraseña: </label>
					</div>
                    <div id="formulario">
					<input id="R_rep_contrasenya" name="Contraseña" type="password" placeholder="Contraseña"/>
                    <span class="bar"></span>
					<label for="R_rep_contrasenya" > Repetir contraseña: </label>
                    </div>
                    <div id="formulario">
					
					<input id="R_email" name="Email" type="text" placeholder="Email"/>
					<span class="bar"></span>
                    <label for="R_email"> Email:</label>
                    </div>
                    <br>
                    <div id="busqueda">
					<label for="R_sexo"> Sexo:</label>
                    <br>
						<select id="R_sexo" name="R_sexo">
                            <option value="" disabled selected>Sexo</option>
    						<option value="Masculino">Masculino</option>
    						<option value="Femenino">Femenino</option>
  						</select>
					</div>
                    <br>
                    <div id="busqueda">

					<label for="R_Nacimiento">Fecha de Nacimiento:</label>
					<br>
                    <input type="date"  name="Fecha Nacimiento" id="R_Nacimiento"/>
					</div>
					
					<div id="formulario">
					<input id="R_ciudad" name="Ciudad"  type="text" placeholder="Ciudad"/>
                    <span class="bar"></span>
					<label for="R_ciudad"> Ciudad:</label>
                    </div>
                    <br>
                    <div id="busqueda">
					<label for="R_pais">Pais:</label>
					<br>
					<select id="R_pais" name="R_Nacimiento_Mes">
                        <option value="" disabled selected>Pais</option>
                            <option value="España">España</option>
                            <option value="Egipto">Egipto</option>
                            <option value="Congo">Congo</option>
                            <option value="Portugal">Portugal</option>
                        </select>
					</div>
                    <br>
                    <div id="busqueda">
					<label for="R_imagen"> Imagen:</label>
					<br>
					<input id="R_imagen" name="imagen" type="file" />
					
					</div>
                    <br>
                    <div id="formulario">
					<input type="submit" value="Registrate" /> 
                    </div>
                    <br>
			</form>
			</div>

  <?php 
    include('pie.inc');
  ?>
  
