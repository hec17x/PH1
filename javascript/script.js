function valida(){


	var user= document.getElementById("L_Usuario").value;
	var pass = document.getElementById("L_Contraseña").value;
	var esvalido=1;
	var esvalidopass=1;
	var l=0;
	//var msg = "Error"\n;

	if(user===null || user==="" || user===" "){
		alert("¡Tienes que escribir tu numbre de Usuario!");
		return (false);
	}

	else{

		for(l=0;l<user.length;l++){
			
		        if( ( 'A' <= user[l] && user[l] <= 'Z' ) ||
		        	( 'a' <= user[l] && user[l] <= 'z' ) ||
		        	( '0' <= user[l] && user[l] <= '9' ) ) {	
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

	if(pass===null || pass==="" || pass===" "){
		alert("¡Tienes que escribir tu Contraseña!");
		return (false);	
	}

	else{

		for(l=0;l<pass.length;l++){
		
		
	        	if( ( 'A' <= pass[l] && pass[l] <= 'Z' ) ||
	        		( 'a' <= pass[l] && pass[l] <= 'z' ) ||
	        		( '0' <= pass[l] && pass[l] <= '9' ) ) {
	        		//if sin sentensiasss
				}
				else{
					esvalidopass=0; //Si no tienes letra o numero , tienes un un carasfeteryhi erroneo
				}
				
		}
				
		if(esvalidopass==0){
			alert("Espacio o carácter erroneo en Contraseña");
			return (false);
		}

	}

	return (true);
}

