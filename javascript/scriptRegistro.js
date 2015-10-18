//Funciones validar Registro completo


function validaRegistro(){

	//recogemos todos los datos
	var usuario = document.getElementById("R_usuario").value;
	var contraseña = document.getElementById("R_contraseña").value;
	var rep_contraseña = document.getElementById("R_rep_contraseña").value;
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
	var validaContraseña = false;

	//VERIFICAMOS USUARIO ****************************************************

	if(usuario=="" || usuario==" "){

		alert("Introduzca un nombre");
		return(false);
	}
	else if( (usuario.length<3) || (usuario.length>15) ){

		alert("El nombre debe tener entre 3 y 15 caracteres.");
		return(false);
	}
	else {
		
		for(i=0;i<usuario.length;i++){
		
	        if( ( 'A' <= usuario[i] && usuario[i] <= 'Z') ||
	        	( 'a' <= usuario[i] && usuario[i] <= 'z' ) ||
	        	( '0' <= usuario[i] && usuario[i] <= '9' ) ) {
	            	//if sin condicion
				}
				else{
					alert("Has usado un espacio o un carácter erroneo en Usuario, reemplázelo.");
					return(false);
				}
					
		}
	}
	//VERIFICAMOS CONTRASEÑA **************************************************	
	/*contraseña: sólo puede contener letras del alfabeto inglés (en mayúsculas y minúsculas), números
	y el subrayado; al menos debe contener una letra en mayúsculas, una letra en minúsculas
	y un número; longitud mínima 6 caracteres y máxima 15.*/

	if(contraseña=="" || contraseña==" "){

		alert("Introduzca una contraseña");
		return (false);
	}
	else if( (contraseña.length>5) && (contraseña.length<16) ){

		for(i=0; i<contraseña.length; i++){
			
		        if('A' <= contraseña[i] && contraseña[i] <= 'Z'){ // check if you have an uppercase
		            
		            numMayus++;
				}
				else if( 'a' <= contraseña[i] && contraseña[i] <= 'z'){ // check if you have a lowercase
					
					numMin++;
				}
				else if('0' <= contraseña[i] && contraseña[i] <= '9'){ // check if you have a numeric
		            
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
		
			validaContraseña = true;
		}	

		//si entra en este, la contraseña no es valida por esos motivos

		if(validaContraseña == false){
		
			alert("La contraseña debe contener al menos una letra mayuscula, una letra minuscula y un numero");
			return(false);
		}
	
	}
	else{
		alert("La contraseña debe tener un mínimo de 6 carácteres y un máximo de 15");
		return(false);
	}
	


	//VERIFICAMOS REP_CONTRASEÑA *******************************************************************

	if(contraseña != rep_contraseña){

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





//FUNCION VALIDAR EMAIL APARTE PARA MENOR COMPLEJIDAD

function validateMail(idMail){	
	
	//Creamos un objeto 
	object=document.getElementById(idMail);
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