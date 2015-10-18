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

	/*if(contraseña=="" || contraseña==" "){

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
	}*/

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
		alert("Introduzca una fecha");
		return (false);
	}
	else{	

		var validarFecha = validarF("R_Nacimiento");

		if(validarFecha == false){
			alert("La fecha introcida no es correcta");
			return (false);
		}
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








////////////////FUNCIONES VALIDAR FECHA//////////////////////////////////////
function validarF(idFecha)
{
    var fecha = document.getElementById(idFecha).value;
    if(validate_fecha(fecha)==true)
        return (true);
    else
    	return (false);
}

function isValidDate(day,month,year)
{
    var dteDate;
 
    // En javascript, el mes empieza en la posicion 0 y termina en la 11 
    //   siendo 0 el mes de enero
    // Por esta razon, tenemos que restar 1 al mes
    month=month-1;
    // Establecemos un objeto Data con los valore recibidos
    // Los parametros son: año, mes, dia, hora, minuto y segundos
    // getDate(); devuelve el dia como un entero entre 1 y 31
    // getDay(); devuelve un num del 0 al 6 indicando siel dia es lunes,
    //   martes, miercoles ...
    // getHours(); Devuelve la hora
    // getMinutes(); Devuelve los minutos
    // getMonth(); devuelve el mes como un numero de 0 a 11
    // getTime(); Devuelve el tiempo transcurrido en milisegundos desde el 1
    //   de enero de 1970 hasta el momento definido en el objeto date
    // setTime(); Establece una fecha pasandole en milisegundos el valor de esta.
    // getYear(); devuelve el año
    // getFullYear(); devuelve el año
    dteDate=new Date(year,month,day);
 
    //Devuelva true o false...
    return ((day==dteDate.getDate()) && (month==dteDate.getMonth()) && (year==dteDate.getFullYear()));
}
 
/**
 * Funcion para validar una fecha
 * Tiene que recibir:
 *  La fecha en formato ingles yyyy-mm-dd
 * Devuelve:
 *  true-Fecha correcta
 *  false-Fecha Incorrecta
 */
function validate_fecha(fecha)
{
    var patron=new RegExp("^(19|20)+([0-9]{2})([-])([0-9]{1,2})([-])([0-9]{1,2})$");
 
    if(fecha.search(patron)==0)
    {
        var values=fecha.split("-");
        if(isValidDate(values[2],values[1],values[0]))
        {
            return true;
        }
    }
    return false;
}
 
/**
 * Funcion que es ejecutada desde el botón de validar
 */



