	var imgArray = new Object();
	imgArray.datos = new Array();

	var imgArrayAlbum = new Object();
	imgArrayAlbum.datos = new Array();

function iniciarAlbum(tituloF, fichero, fechaF, paisF, num, ide)
{


	//alert(tituloF);

	imgArrayAlbum.datos[num] = new Object();
	imgArrayAlbum.datos[num].imagen = new Image();
	imgArrayAlbum.datos[num].imagen.src = 'upload/fotos/'+fichero;
	imgArrayAlbum.datos[num].titulo= tituloF;
	imgArrayAlbum.datos[num].fecha = new Date(fechaF);
	imgArrayAlbum.datos[num].pais= paisF;
	imgArrayAlbum.datos[num].ordenado = null;
	imgArrayAlbum.datos[num].identificacion = ide;


var imagen='';

	for(var i in imgArrayAlbum.datos)
	{
		
		imagen+='\n\
		<div id="galeria_index" onclick="redireccionar('+imgArrayAlbum.datos[i].identificacion+')">\n\
		<img src=' + imgArrayAlbum.datos[i].imagen.src + ' alt='+ imgArrayAlbum.datos[i].titulo+'>\n\
			<div id="info">\n\
				<p>TITULO: '+imgArrayAlbum.datos[i].titulo+' </p>\n\
				<p>FECHA: '+imgArrayAlbum.datos[i].fecha.toDateString()+'</p>\n\
				<p>PAIS: '+imgArrayAlbum.datos[i].pais+'</p>\n\
			</div>\n\
		</div>'
		;	
	}
if(document.getElementById("fotos")!=null)
{

	document.getElementById("fotos").innerHTML = imagen;
}
}

function iniciar(tituloF, fichero, fechaF, paisF, num, ide)
{


	//alert(tituloF);

	imgArray.datos[num] = new Object();
	imgArray.datos[num].imagen = new Image();
	imgArray.datos[num].imagen.src = 'upload/fotos/'+fichero;
	imgArray.datos[num].titulo= tituloF;
	imgArray.datos[num].fecha = new Date(fechaF);
	imgArray.datos[num].pais= paisF;
	imgArray.datos[num].ordenado = null;
	imgArray.datos[num].identificacion = ide;


var imagen='';

	for(var i in imgArray.datos)
	{
	
		imagen+='\n\
		<div id="galeria_index" onclick="redireccionar('+imgArray.datos[i].identificacion+')">\n\
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
		<div id="galeria_index" onclick="redireccionar('+imgArray.datos[aux].identificacion+')">\n\
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
		<div id="galeria_index" onclick="redireccionar('+imgArray.datos[aux].identificacion+')">\n\
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
					aux=x;
					imgArray.datos[x].ordenado="fecha";
					test=true;
					
				}
			}

			
			imagen+='\n\
		<div id="galeria_index" onclick="redireccionar('+imgArray.datos[aux].identificacion+')">\n\
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
	//iniciar();
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





