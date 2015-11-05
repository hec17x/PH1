<!DOCTYPE html>
<html lang="es">
<!-- La cabecera -->
<head>
<meta charset="UTF-8" />
<meta name="generator" content="Sublime-Text" />
<meta name="author" content="Héctor - Roberto "/>
<meta name="keywords" content="HTML5, web" />
<meta name="description" content="PI - REGISTRO" />

<link rel="stylesheet" type="text/css" href="css/home.css" title="Estilo principal" />
<link rel="alternate stylesheet" type="text/css" href="css/contrast.css"
 title="Estilo de escala de grises" />
<link rel="alternate stylesheet" type="text/css" href="css/big.css"
 title="Estilo de tamaño grande" />
<link rel="stylesheet" type="text/css" href="css/print.css" media="print" />

<script src="javascript/scriptRegistro.js"></script>
<script src="javascript/cookies.js"></script>


<title>PI - REGISTRO</title>
</head>
<!-- El cuerpo -->


<body onload="readStyle();" onunload="saveStyle();">

<header id="cab_principal">
    
    <a href="index.php"><img src="images/logo1.png"  alt="foto"></a>
    <br>
    <li><a href="#" onclick="setActiveStyleSheet('Estilo principal'); return false;">Estilo Principal</a></li>
    <br>
    <li><a href="#" onclick="setActiveStyleSheet('Estilo de escala de grises'); return false;">Estilo alternativo</a></li>
    
    <nav>
        <ul class="menu">  
            <li><a href="index.php">Atras</a></li>         
        </ul>    
    </nav> 
    </header>

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

<footer>
    <p>Esta página ha sido creada para la asignatura Programación Hipermedia I.<p>
</footer>

</body>


</html>
