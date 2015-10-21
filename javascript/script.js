function valida(f){


	var usuario = f.elements["L_Usuario"].value;
	var contrasenya = f.elements["L_Contrasenya"].value;
	var esvalido=1;
	var esvalidopass=1;
	var l=0;
	//var msg = "Error"\n;

	if(usuario===null || usuario==="" || usuario===" "){
		alert("¡Tienes que escribir tu numbre de Usuario!");
		return (false);
	}

	else{

		for(l=0;l<usuario.length;l++){
			
		        if( ( 'A' <= usuario[l] && usuario[l] <= 'Z' ) ||
		        	( 'a' <= usuario[l] && usuario[l] <= 'z' ) ||
		        	( '0' <= usuario[l] && usuario[l] <= '9' ) ) {	
		        	//if vasio sin sentensias
		        }
		       
		        else{
					esvalido=0;  //Si no tienes letra o numero, tienes un caracter erroneo
				}
					
		}
		if(esvalido==0){
			alert("Espacio o carácter erroneo en Usuario");
			return (false);
		}
		

	}

	if(contrasenya===null || contrasenya==="" || contrasenya===" "){
		alert("¡Tienes que escribir tu Contraseña!");
		return (false);	
	}

	else{

		for(l=0;l<contrasenya.length;l++){
		
		
	        	if( ( 'A' <= contrasenya[l] && contrasenya[l] <= 'Z' ) ||
	        		( 'a' <= contrasenya[l] && contrasenya[l] <= 'z' ) ||
	        		( '0' <= contrasenya[l] && contrasenya[l] <= '9' ) ) {
	        		//if sin sentensiasss
				}
				else{
					esvalidopass=0; //Si no tienes letra o numero , tienes un un carasfeter erroneo
				}
				
		}
				
		if(esvalidopass==0){
			alert("Espacio o carácter erroneo en Contraseña");
			return (false);
		}

	}

	return (true);
}

