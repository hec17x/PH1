<!DOCTYPE html>
<html lang="es">
<!-- La cabecera -->
<head>
<meta charset="UTF-8" />
<meta name="generator" content="Sublime-Text" />
<meta name="author" content="Héctor - Roberto "/>
<meta name="keywords" content="HTML5, web" />
<meta name="description" content="PI - HOME" />

<link rel="stylesheet" type="text/css" href="css/home.css" title="Estilo principal" />
<link rel="alternate stylesheet" type="text/css" href="css/contrast.css"
 title="Estilo de escala de grises" />
<link rel="alternate stylesheet" type="text/css" href="css/big.css"
 title="Estilo de tamaño grande" />
<link rel="stylesheet" type="text/css" href="css/print.css" media="print" />

<script src="javascript/script.js"></script>
<script src="javascript/scriptOrdenacion.js"></script>
<script src="javascript/cookies.js"></script>

<title>PI - HOME</title>
</head>
<!-- El cuerpo -->


<body onload="iniciar(); readStyle();" onunload="saveStyle();">
<!--<body onload="iniciar()";>-->


	<br>
	<header id="cab_principal">
	<a href="index.php"><img src="images/logo1.png"  alt="foto"></a>
  
	<nav>
        <ul class="menu">
            <li><a href="#" onclick="setActiveStyleSheet('Estilo principal'); return false;">Estilo Principal</a></li>
            <li><a href="#" onclick="setActiveStyleSheet('Estilo de escala de grises'); return false;">Estilo alternativo</a></li>
            <li><a href="busqueda.php">Busqueda Avanzada</a></li>      
            
        </ul>    
	</nav> 
	</header>

	<section id="content-index">
		
			<form id="miForm" action="" method="get" onsubmit="return valida(this)" onclick="Desplegar()">
				  <div id="Flogin">
        <img src="images/logo2.png"  alt="foto">
		  	<h2><b>Login</b></h2>
        <div id="datosPer">
				<div id="formulario">

					<div id="user">
				<input id="L_Usuario"type="text" name="Usuario" placeholder="Usuario" >
				
     			<span class="bar"></span>
  				<label for="L_Usuario">Usuario</label>
  					</div>
  				</div>
  				<div id="formulario">
  				<input id="L_Contrasenya" type="password" name="Constraseña" placeholder="Contraseña" >
  				
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
  				</div>
          </div>
			</form>
    

	<h2>Últimas actualizaciones:</h2>
	<div>
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
	<footer>
	<p>Esta página ha sido creada para la asignatura Programación Hipermedia I.<p>
	</footer>
	
</body>



</html>
