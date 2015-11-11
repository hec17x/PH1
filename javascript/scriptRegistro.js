//Funciones validar Registro completo

//Valida en busqueda.php que se rellene el formulario completo para mostrarlo en resultado.php
function validaBusqueda(f){

	var titulo = document.getElementById("B_titulo").value;
	var fechadia =document.getElementById("B_Dia").value;
	var fechames = document.getElementById("B_Mes").value;
	var fechaaño = document.getElementById("B_Año").value;
	var pais = document.getElementById("R_pais").value;

	if(titulo=="" || titulo==" " || titulo ==null){

		alert("Introduzca un titulo.");
		return(false);
	}

	if(fechadia=="" || fechames=="" || fechaaño==""){
		alert("Introduzca una fecha correcta.");
		return(false);
	}
	if(pais == ""){
		alert("Introduzca un pais");
		return (false);
	}

}


function validaRegistro(f){

	//recogemos todos los datos
	var usuario = document.getElementById("R_usuario").value;
	var contrasenya = document.getElementById("R_contrasenya").value;
	var rep_contrasenya = document.getElementById("R_rep_contrasenya").value;
	var email1 = document.getElementById("R_email").value;
	var sexo = document.getElementById("R_sexo").value;

	var fecha = document.getElementById("R_Nacimiento").value;

	var ciudad = document.getElementById("R_ciudad").value;
	var pais = document.getElementById("R_pais").value;
	//variables auxiliares:
	var contUsu = 0;
	var numMayus = 0;
	var numMin = 0;
	var numNum = 0;
	var aux = 1;
	var validaContrasenya = false;



	//VERIFICAMOS USUARIO ****************************************************************************************************
	if(usuario=="" || usuario==" " || usuario ==null){

		alert("Introduzca un usuario.");
		/*document.getElementById("user").innerHTML='<input id="R_usuario" name="Nombre de usuario" type="text" placeholder="Nombre de usuario"/>\n\
                    <span class="bar"></span>\n\
                    <p id="error">Introduzca un usuario</p>\n\
					<label for="R_usuario" > Usuario: </label>';*/
		return(false);
	}
	else {
		var validarUsu = validateUsuario("R_usuario");
		
		if(validarUsu == false){
			alert("Usuario incorrecto.");
			/*document.getElementById("user").innerHTML='<input id="R_usuario" name="Nombre de usuario" type="text" placeholder="Nombre de usuario"/>\n\
                    <span class="bar"></span>\n\
                    <p id="error">Usuario incorrecto</p>\n\
					<label for="R_usuario" > Usuario: </label>';*/
			return (false);
		}
		/**else
		{
			var error = document.getElementById("error");	

			var padre = error.parentNode;
			padre.removeChild(error);
		}**/
	}


	//VERIFICAMOS CONTRASEÑA *************************************************************************************************
	/*contraseña: sólo puede contener letras del alfabeto inglés (en mayúsculas y minúsculas), números
	y el subrayado; al menos debe contener una letra en mayúsculas, una letra en minúsculas
	y un número; longitud mínima 6 caracteres y máxima 15.*/

	if(contrasenya=="" || contrasenya==" "){

		alert("Introduzca una contraseña");

	/**	document.getElementById("formulario").innerHTML='<input id="R_contrasenya" name="Contraseña" type="password" placeholder="Contraseña"/>\n\
                    <span class="bar"></span>\n\
                    <p id="error1">Introduzca una contraseña</p>\n\
                    <label for="R_contrasenya" > Contraseña: </label>';**/

		return (false);
	}
	else {
		var validarPass = validatePassword("R_contrasenya");

		if(validarPass == false){
			alert("La contraseña introducida es incorrecta.");
			
			contrasenya = document.getElementById("R_contrasenya").value = '';
			contrasenya = document.getElementById("R_contrasenya").focus();

			return (false);
		}
	}


	//VERIFICAMOS REP_CONTRASEÑA *******************************************************************

	if(contrasenya != rep_contrasenya){
		alert("Las contraseñas no coinciden");
		
		rep_contrasenya = document.getElementById("R_rep_contrasenya").value = '';
		rep_contrasenya = document.getElementById("R_rep_contrasenya").focus();
			
		return(false);
	}



	//Verificamos el EMAIL **************************************************************************************
	/*no puede estar vacío, hay que comprobar que cumple el patrón de una
	dirección de email (no permitir dominios principales de menos de 2 caracteres y más de 4
	caracteres).*/
	if(email1=="" || email1==" "){

		alert("Introduzca su Email");
		return(false);
	}
	else{
		var validar = validateEmail("R_email");

		if(validar ==false){
			alert("El email introcido es incorrecto");
			return (false);
		}
	}
	
	
	//VERIFICAMOS EL SEXO INTRODUCIDO*********************************************************************
	if(sexo == "") {

		alert("Seleccione su sexo");
		return (false);
	}
	

	//VERIFICAMOS FECHA DE NACIMIENTO***********************************************************************

	if(fecha == null || fecha == ""){
		alert("La fecha introducida es incorrecta.");
		return (false);
	}


	//VERIFICAMOS CIUDAD **********************************************************************************
	if(ciudad==""){
		
		alert("Introduzca una Ciudad");
		return(false);
	}
	//VERIFICAMOS PAIS *********************************************************************************
	if(pais == ""){

		alert("Introduce un Pais");
		return (false);
	}



	//Eliminar estas dos linear cuando acabemos!!!!!*******
	//son para realizar varais cmprobaciones a la vez
	//alert("Todo Funca bien ");
	//return (false);
	//*****************************************************
}



// FUNCIONES CON EXPRESIONES REGULARES ********************
function validateUsuario(idUsu){
	
	object= document.getElementById(idUsu);
	valueForm=object.value;
 
	// Patron para el usuario
	var patron=/^[a-zA-Z0-9]{3,15}$/;
	
	if(valueForm.search(patron)==0){

		//Usuario correcto

		return (true);
	}
	//Usuario incorrecto

	return (false);
}

function validatePassword(idPass){

	object= document.getElementById(idPass);
	valueForm=object.value;
 
	// Patron para la contraseña
	//var patron=/(^(?=.*[a-z])(?=.*[A-Z])(?=.*\d){6,15}.+$)/;
	var patron = /(^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])[a-zA-Z0-9_]{6,15}$)/

	if(valueForm.search(patron)==0){

		//Contraseña correcta
		return (true);
	}
	//Contraseña incorrecta

	return (false);
}

function validateEmail(idMail){	
	
	//Creamos un objeto 
	object= document.getElementById(idMail);
	valueForm=object.value;
 
	// Patron para el correo
	//var patron=/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/;
	var patron = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/;

	if(valueForm.search(patron)==0){

		//Mail correcto
		return (true);
	}
	//Mail incorrecto
	return (false);
}