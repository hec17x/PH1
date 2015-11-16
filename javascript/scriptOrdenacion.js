	var imgArray = new Object();
	imgArray.datos = new Array();

function iniciar()
{



	imgArray.datos[0] = new Object();
	imgArray.datos[0].imagen = new Image();
	imgArray.datos[0].imagen.src = 'images/129H.jpg';
	imgArray.datos[0].titulo= "Vintage car";
	imgArray.datos[0].fecha = new Date("August 24, 2014");
	imgArray.datos[0].pais= "España";
	imgArray.datos[0].ordenado = null;


	imgArray.datos[1] = new Object();
	imgArray.datos[1].imagen = new Image();
	imgArray.datos[1].imagen.src= 'images/CK2252.jpg';
	imgArray.datos[1].titulo= "Flash Autovia";
	imgArray.datos[1].fecha = new Date("December 13, 2014");
	imgArray.datos[1].pais= "Alemania";
	imgArray.datos[1].ordenado = null;
	
	imgArray.datos[2] = new Object();
	imgArray.datos[2].imagen = new Image();
	imgArray.datos[2].imagen.src = 'images/CK1741.jpg';
	imgArray.datos[2].titulo= "Inside";
	imgArray.datos[2].fecha  = new Date("December 1, 2014");
	imgArray.datos[2].pais= "Italia";
	imgArray.datos[2].ordenado = null;


	imgArray.datos[3] = new Object();
	imgArray.datos[3].imagen = new Image();
	imgArray.datos[3].imagen.src = 'images/IMG_3556.jpg';
	imgArray.datos[3].titulo= "Marcador";
	imgArray.datos[3].fecha = new Date("April 5, 2010");
	imgArray.datos[3].pais = "España";
	imgArray.datos[3].ordenado = null;


	imgArray.datos[4] = new Object();
	imgArray.datos[4].imagen = new Image();
	imgArray.datos[4].imagen.src = 'images/6e609595.jpg';
	imgArray.datos[4].titulo= "Traffic Light";
	imgArray.datos[4].fecha = new Date("July 20, 2015");
	imgArray.datos[4].pais = "Francia";
	imgArray.datos[4].ordenado = null;


	imgArray.datos[5] = new Object();
	imgArray.datos[5].imagen = new Image();
	imgArray.datos[5].imagen.src = 'images/05502b_o.jpg';
	imgArray.datos[5].titulo= "Country";
	imgArray.datos[5].fecha = new Date("November 12, 2011");
	imgArray.datos[5].pais = "Inglaterra";
	imgArray.datos[5].ordenado = null;


	imgArray.datos[6] = new Object();
	imgArray.datos[6].imagen = new Image();
	imgArray.datos[6].imagen.src = 'images/IMG_3822.jpg';
	imgArray.datos[6].titulo= "Iphone 5";
	imgArray.datos[6].fecha = new Date("February 6, 2013");
	imgArray.datos[6].pais = "Italia";
	imgArray.datos[6].ordenado = null;

	imgArray.datos[7] = new Object();
	imgArray.datos[7].imagen = new Image();
	imgArray.datos[7].imagen.src = 'images/KgqDYXR.jpg';
	imgArray.datos[7].titulo= "Traveler";
	imgArray.datos[7].fecha = new Date("January 6, 2015");
	imgArray.datos[7].pais = "Estados Unidos";
	imgArray.datos[7].ordenado = null;
	//mostrar();
var imagen='';

	for(var i in imgArray.datos)
	{
	
		imagen+='\n\
		<div id="galeria_index" onclick="redireccionar('+i+')">\n\
		<img src=' + imgArray.datos[i].imagen.src + ' alt='+ imgArray.datos[i].titulo+'>\n\
			<div id="info">\n\
				<p>TITULO: '+imgArray.datos[i].titulo+' </p>\n\
				<p>FECHA: '+imgArray.datos[i].fecha.toDateString()+'</p>\n\
				<p>PAIS: '+imgArray.datos[i].pais+'</p>\n\
			</div>\n\
		</div>'
		;	
	}
if(document.getElementById("fotos")!=null)
{

	document.getElementById("fotos").innerHTML = imagen;
}
}

function ordenar()
{

	var Nord = document.getElementById("Nordenacion").value;
	var Tord = document.getElementById("Tordenacion").value;
	var ordenTitulo= new Array();
	var ordenPais = new Array();
	var ordenFecha = new Array();

	for(var i in imgArray.datos)
	{

		ordenTitulo[i]=imgArray.datos[i].titulo;
		ordenPais[i]=imgArray.datos[i].pais;
		ordenFecha[i]=imgArray.datos[i].fecha;
		imgArray.datos[i].ordenado="";
	}


	if(Tord=="Ascendente")
	{

		ordenTitulo.sort();
		ordenPais.sort();
		ordenFecha.sort(function (lhs, rhs)  { return lhs > rhs ? 1 : lhs < rhs ? -1 : 0; });
	}

	if(Tord=="Descendente")
	{

		ordenTitulo.sort();
		ordenPais.sort();
		ordenFecha.sort(function (lhs, rhs)  { return lhs > rhs ? 1 : lhs < rhs ? -1 : 0; });
		ordenTitulo.reverse();
		ordenPais.reverse();
		ordenFecha.reverse();
	}

	var aux;
	var ss;
	var test=false;
	var imagen='';

	if(Nord=="Titulo")
	{
		for(var j in ordenTitulo)
		{
			for(var x in imgArray.datos)
			{
				if(imgArray.datos[x].ordenado!="titulo"&&ordenTitulo[j]==imgArray.datos[x].titulo&&Boolean(test)==false)
				{
					aux=x;
					imgArray.datos[x].ordenado="titulo";
					test=true;
					
				}
			}

			imagen+='\n\
		<div id="galeria_index" onclick="redireccionar('+aux+')">\n\
		<img src=' + 	imgArray.datos[aux].imagen.src  + ' alt='+imgArray.datos[aux].titulo+'>\n\
			<div id="info">\n\
				<p>TITULO: '+imgArray.datos[aux].titulo+' </p>\n\
					<p>FECHA: '+imgArray.datos[aux].fecha.toDateString()+'</p>\n\
					<p>PAIS: '+imgArray.datos[aux].pais+'</p>\n\
				</div>\n\
			</div>'
			;	
			test=false;
		}
		
		document.getElementById("fotos").innerHTML = imagen;
	}


	if(Nord=="Pais")
	{
		for(var j in ordenPais)
		{
			for(var x in imgArray.datos)
			{
				//alert(imgArray.datos[x].ordenado+" "+ordenPais[j]+" "+imgArray.datos[x].pais);
				if(imgArray.datos[x].ordenado!="pais"&&ordenPais[j]==imgArray.datos[x].pais&&Boolean(test)==false)
				{
					aux=x
					imgArray.datos[x].ordenado="pais";
					test=true;
					
				}
			}


		if(imgArray.datos[aux].imagen!=null)
		{
			imagen+='\n\
		<div id="galeria_index" onclick="redireccionar('+aux+')">\n\
		<img src=' + 	imgArray.datos[aux].imagen.src  + ' alt='+imgArray.datos[aux].titulo+'>\n\
			<div id="info">\n\
				<p>TITULO: '+imgArray.datos[aux].titulo+' </p>\n\
					<p>FECHA: '+imgArray.datos[aux].fecha.toDateString()+'</p>\n\
					<p>PAIS: '+imgArray.datos[aux].pais+'</p>\n\
				</div>\n\
			</div>';	
			test=false;
		}
		}
		
		document.getElementById("fotos").innerHTML = imagen;
	}

	if(Nord=="Fecha")
	{
		for(var j in ordenFecha)
		{
			for(var x in imgArray.datos)
			{
	
				if(imgArray.datos[x].ordenado!="fecha"&&ordenFecha[j]==imgArray.datos[x].fecha&&Boolean(test)==false)
				{
					aux=x
					imgArray.datos[x].ordenado="fecha";
					test=true;
					
				}
			}

	
			imagen+='\n\
		<div id="galeria_index" onclick="redireccionar('+aux+')">\n\
		<img src=' + 	imgArray.datos[aux].imagen.src  + ' alt='+imgArray.datos[aux].titulo+'>\n\
			<div id="info">\n\
				<p>TITULO: '+imgArray.datos[aux].titulo+' </p>\n\
					<p>FECHA: '+imgArray.datos[aux].fecha.toDateString()+'</p>\n\
					<p>PAIS: '+imgArray.datos[aux].pais+'</p>\n\
				</div>\n\
			</div>'
			;	
			test=false;
		}
		
		document.getElementById("fotos").innerHTML = imagen;
	}


}

function redireccionar(x)
{
	location.href="detalle.php?id="+x;
}

function cargar()
{
	iniciar();
	 var loc = document.location.href;
   var getString = loc.split('?')[1];
   var GET = getString.split('&');
   var get = {};

   
   for(var i = 0, l = GET.length; i < l; i++){
      var tmp = GET[i].split('=');
      get[tmp[0]] = unescape(decodeURI(tmp[1]));
   }
   var imagen='';
   imagen+='<img src=' + 	imgArray.datos[get[tmp[0]]].imagen.src  + ' alt='+imgArray.datos[get[tmp[0]]].titulo+'>\n\
   ';
	document.getElementById("detalle_foto").innerHTML = imagen;
   var info='';
			info+='\n\
		<div id="dfoto" ">\n\
				<p>TITULO: '+imgArray.datos[get[tmp[0]]].titulo+' </p>\n\
					<p>FECHA: '+imgArray.datos[get[tmp[0]]].fecha.toDateString()+'</p>\n\
					<p>PAIS: '+imgArray.datos[get[tmp[0]]].pais+'</p>\n\
					<p>ID: '+get[tmp[0]]+'</p>\n\
					'
		
			;	
		
		
		
		document.getElementById("dfoto").innerHTML = info;
  
}





