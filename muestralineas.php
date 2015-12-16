
<?php

			if(!($iden = mysql_connect("localhost", "root", "")))
                    die("Error: No se pudo conectar");
            if(!mysql_select_db("p&i", $iden))
                    die("Error: No existe la base de datos");


if(($fichero = @file("seleccionfotos.txt")) == false){

	echo "No se ha podido abrir el fichero";
}

else{

	echo "<br/>";
	mt_srand();
	$random=mt_rand(0,(count($fichero)-1));

	while($fichero[$random]==null || $fichero[$random]=="" || $fichero[$random]==" " ){
		
		$random=mt_rand(0,count($fichero));
	}

	list($idfoto, $critico, $explicacion) = explode("#", $fichero[$random]);

	echo "<br/>";
	echo "<br/>";
	echo "<br/>";
	echo "<br/>";
	echo "<br/>";
	echo "<br/>";

	echo "Foto Seleccionada: ";
	echo "<br/>";

}


$sentencia1 = "SELECT * FROM Fotos where IdFotos='$idfoto'";
// Ejecuta la sentencia SQL
$resultado = mysql_query($sentencia1, $iden);
if(!$resultado)
die("Error: no se pudo realizar la consulta");

while($fila = mysql_fetch_assoc($resultado)){

        $id= $fila['IdFotos'];
        $titulo = $fila['Titulo'];
        $descrip = $fila['Descripcion'];
        echo "<a href='detalle.php?id=$id'>","<img src='./upload/fotos/".$fila['Fichero']."' width='200px'/></a>" ;  
}

echo "<br/>";
echo "Titulo Imagen: ";
echo $titulo;
echo "<br/>";
echo "<br/>";
echo "Descripción: ";
echo $descrip;
echo "<br/>";
echo "<br/>";
echo "Crítico: ";
echo $critico;
echo "<br/>";
echo "<br/>";
echo "Comentario: ";
echo $explicacion;

?>