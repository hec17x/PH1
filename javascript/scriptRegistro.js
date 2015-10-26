//Funciones validar Registro completo


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
	if(usuario=="" || usuario==" "){

		alert("Introduzca un nombre");
		return(false);
	}
	else {
		var validarUsu = validateUsuario("R_usuario");
		
		if(validarUsu == false){
			alert("El usuario introcido es incorrecto");
			return (false);
		}
	}
	//VERIFICAMOS CONTRASEÑA *************************************************************************************************
	/*contraseña: sólo puede contener letras del alfabeto inglés (en mayúsculas y minúsculas), números
	y el subrayado; al menos debe contener una letra en mayúsculas, una letra en minúsculas
	y un número; longitud mínima 6 caracteres y máxima 15.*/

	if(contrasenya=="" || contrasenya==" "){

		alert("Introduzca una contraseña");
		return (false);
	}
	else if( (contrasenya.length>5) && (contrasenya.length<16) ){

		for(i=0; i<contrasenya.length; i++){
			
		        if('A' <= contrasenya[i] && contrasenya[i] <= 'Z'){ // si tienes mayuscula
		            
		            numMayus++;
				}
				else if( 'a' <= contrasenya[i] && contrasenya[i] <= 'z'){ // si tienes minuscula

					numMin++;
				}
				else if('0' <= contrasenya[i] && contrasenya[i] <= '9'){ // si tiene sun numero

		            numNum++;
				}
				else{
					aux = 0;
				}			
		}		

		if( aux == 0 ){
			alert("Carácter del Alfabeto Inglés no Encontrado Password");
			return(false);
		}
		
		//Si entra aqui, la contraseña seria correctisima.

		if( (numMayus>0) && (numMin>0) && (numNum>0) ){
		
			validaContrasenya = true;
		}	

		//si entra en este, la contraseña no es valida por esos motivos

		if(validaContrasenya == false){
		
			alert("La contraseña debe contener al menos una letra mayuscula, una letra minuscula y un numero");
			return(false);
		}
	
	}
	else{
		alert("La contraseña debe tener un mínimo de 6 carácteres y un máximo de 15");
		return(false);
	}
	


	//VERIFICAMOS REP_CONTRASEÑA *******************************************************************

	if(contrasenya != rep_contrasenya){

		alert("Las contraseñas no coinciden");
		return(false);
	}

	//Verificamos el EMAIL **************************************************************************************
	/*no puede estar vacío, hay que comprobar que cumple el patrón de una
	dirección de email (no permitir dominios principales de menos de 2 caracteres y más de 4
	caracteres).*/

	var validar = validateMail("R_email");

	if(validar ==false){
		alert("El email introcido no es correcto");
		return (false);
	}
	
	
	
	//VERIFICAMOS EL SEXO INTRODUCIDO*********************************************************************
	
	if(sexo == "") {

		alert("Seleccione su sexo");
		return (false);
	}
	

	//VERIFICAMOS FECHA DE NACIMIENTO***********************************************************************

	if(fecha == null || fecha == ""){
		alert("Introduzca una fecha correcta");
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
	alert("Todo Funca bien ");
	return (false);
	//*****************************************************
}



// ESTA FUNCION CONTIENE UN EXPRESION REGULAR, PARA P5 NO USAR EXPRESIONES REGULARES
function validateUsuario(idUsu){

	object= document.getElementById(idUsu);
	valueForm=object.value;
 
	// Patron para el correo
	var patron=/^[a-zA-Z0-9_-]{3,15}$/;
	
	if(valueForm.search(patron)==0){

		//Usuario correcto
		return (true);
	}
	//Usuario incorrecto

	return (false);
}


function validateEmail(idMail){	
	
	//Creamos un objeto 
	object= document.getElementById(idMail);
	valueForm=object.value;
 
	// Patron para el correo
	var patron=/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/;
	
	if(valueForm.search(patron)==0){

		//Mail correcto
		return (true);
	}
	//Mail incorrecto
	return (false);
}