
  <?php 
    include('cabecera.inc');
    include('inicio.inc');

  ?>
  


<h2> Resultado de busqueda</h2>
<h3>Criterios de busqueda:</h3> 
	
    <?php

    /*ESTE SCRIPT IMPRIME TITULO FECHA Y PAIS EN RESULTADO DE BUSQUEDA
        NECESITA UN JAVASCRIP PARA QUE OBLIGUE A RELLENAR TODOS LOS INPUTS*/
        if($_POST['Titulo'] !=null){ 

            $titulo = $_POST['Titulo'];
            echo "TITULO: " .$titulo;  echo "  ";
            
            }

        //FECHA en formato de la base de datos

        if(!empty($_POST['fecha_inicio']) AND !empty($_POST['fecha_fin']))
        {
        $fecha_inicio= $_POST['fecha_inicio'];
        echo "INICIO: ".$fecha_inicio;

        $fecha_fin= $_POST['fecha_fin'];
        echo "   FIN: ".$fecha_fin;

        }

            if(!($iden = mysql_connect("localhost", "root", "")))
                    die("Error: No se pudo conectar");
            if(!mysql_select_db("p&i", $iden))
                    die("Error: No existe la base de datos");
        /////////////

        if( !empty($_POST['R_pais'])){ 
            

            $pais1 = $_POST['R_pais'];     
            $pais = mysql_query("SELECT NomPais FROM paises where IdPais = '$pais1'  ", $iden); ;
            
            //echo "PAIS:" .$pais; //resultado de esta linea muestra Resource id #6
            //echo "PAIS:" .$pais1; //resultado de esta es IdPais el numero
             mysql_query("SET NAMES 'utf8'");
            if($pais1==1) echo "   PAIS: España";
            if($pais1==2) echo "   PAIS: Egipto";
            if($pais1==3) echo "   PAIS: Congo";
            if($pais1==4) echo "   PAIS: Portugal";
            }

        
        echo "<br>";
        echo "<br>";

/////////////////////////CONSULTAS////////////////////////////////////

    //si solo existe el titulo
    if(isset($titulo) AND !isset($fecha_inicio) AND !isset($fecha_fin) AND !isset($pais1))
    {

    $sentencia1 = "SELECT * FROM Fotos WHERE Titulo like '%$titulo%' ";
    // Ejecuta la sentencia SQL
    $resultado = mysql_query($sentencia1, $iden);
    if(!$resultado)
    die("Error: no se pudo realizar la consulta");
    
    while($fila = mysql_fetch_assoc($resultado))
        {

            $fe=$fila['Pais'];
            $sentencia3 = "SELECT * FROM Paises WHERE IdPais='$fe'";
            // Ejecuta la sentencia SQL
             $resultado2 = mysql_query($sentencia3, $iden);
             if(!$resultado2)
                 die("Error : no se pudo realizar la consulta");
    
            while($fila1 = mysql_fetch_assoc($resultado2))
            {

                $pais=$fila1['NomPais'];
            }


            $id= $fila['IdFotos'];

            echo "<a href='detalle.php?di=$id'>","<img src='./upload/fotos/".$fila['Fichero']."' width='100px'/></a>" ;
            echo "<ul>";
            echo "<li><b>Titulo</b>".": ".$fila['Titulo']."</li>";
            echo "<li><b>Fecha</b>".": ".$fila['Fecha']."</li>";
            echo "<li><b>Pais</b>".": ".$pais."</li>";
            echo "<li><b>ID</b>".": ".$id."</li>";
            echo "</ul>";
        }
    }

    //si solo existe la fecha
    if(!isset($titulo) AND isset($fecha_inicio) AND isset($fecha_fin) AND !isset($pais1))
    {

    $sentencia1 = "SELECT * FROM Fotos WHERE Fecha>='$fecha_inicio' AND Fecha<='$fecha_fin' ";
    // Ejecuta la sentencia SQL
    $resultado = mysql_query($sentencia1, $iden);
    if(!$resultado)
    die("Error: no se pudo realizar la consulta");
    
    while($fila = mysql_fetch_assoc($resultado))
        {

            $fe=$fila['Pais'];
            $sentencia3 = "SELECT * FROM Paises WHERE IdPais='$fe'";
            // Ejecuta la sentencia SQL
             $resultado2 = mysql_query($sentencia3, $iden);
             if(!$resultado2)
                 die("Error : no se pudo realizar la consulta");
    
            while($fila1 = mysql_fetch_assoc($resultado2))
            {

                $pais=$fila1['NomPais'];
            }



            $id= $fila['IdFotos'];

            echo "<a href='detalle.php?di=$id'>","<img src='./upload/fotos/".$fila['Fichero']."' width='100px'/></a>" ;            
            echo "<ul>";
            echo "<li><b>Titulo</b>".": ".$fila['Titulo']."</li>";
            echo "<li><b>Fecha</b>".": ".$fila['Fecha']."</li>";
            echo "<li><b>Pais</b>".": ".$pais."</li>";
            echo "</ul>";
        }
    }

    //si solo existe el pais
    if(!isset($titulo) AND !isset($fecha_inicio) AND !isset($fecha_fin) AND isset($pais1))
    {

    $sentencia1 = "SELECT * FROM Fotos WHERE Pais='$pais1'";
    // Ejecuta la sentencia SQL
    $resultado = mysql_query($sentencia1, $iden);
    if(!$resultado)
    die("Error: no se pudo realizar la consulta");
    
    while($fila = mysql_fetch_assoc($resultado))
        {

            $fe=$fila['Pais'];
            $sentencia3 = "SELECT * FROM Paises WHERE IdPais='$fe'";
            // Ejecuta la sentencia SQL
             $resultado2 = mysql_query($sentencia3, $iden);
             if(!$resultado2)
                 die("Error : no se pudo realizar la consulta");
    
            while($fila1 = mysql_fetch_assoc($resultado2))
            {

                $pais=$fila1['NomPais'];
            }



            $id= $fila['IdFotos'];

            echo "<a href='detalle.php?di=$id'>","<img src='./upload/fotos/".$fila['Fichero']."' width='100px'/></a>" ;            
            echo "<ul>";
            echo "<li><b>Titulo</b>".": ".$fila['Titulo']."</li>";
            echo "<li><b>Fecha</b>".": ".$fila['Fecha']."</li>";
            echo "<li><b>Pais</b>".": ".$pais."</li>";
            echo "</ul>";
        }
    }

    // si existe titulo y fecha pero no pais
    if(isset($titulo) AND isset($fecha_inicio) AND isset($fecha_fin) AND !isset($pais1))
    {

    $sentencia1 = "SELECT * FROM Fotos WHERE Fecha>='$fecha_inicio' AND Fecha<='$fecha_fin' AND Titulo like '%$titulo%'";
    // Ejecuta la sentencia SQL
    $resultado = mysql_query($sentencia1, $iden);
    if(!$resultado)
    die("Error: no se pudo realizar la consulta");
    
    while($fila = mysql_fetch_assoc($resultado))
        {

            $fe=$fila['Pais'];
            $sentencia3 = "SELECT * FROM Paises WHERE IdPais='$fe'";
            // Ejecuta la sentencia SQL
             $resultado2 = mysql_query($sentencia3, $iden);
             if(!$resultado2)
                 die("Error : no se pudo realizar la consulta");
    
            while($fila1 = mysql_fetch_assoc($resultado2))
            {

                $pais=$fila1['NomPais'];
            }



            $id= $fila['IdFotos'];

            echo "<a href='detalle.php?di=$id'>","<img src='./upload/fotos/".$fila['Fichero']."' width='100px'/></a>" ;            
            echo "<ul>";
            echo "<li><b>Titulo</b>".": ".$fila['Titulo']."</li>";
            echo "<li><b>Fecha</b>".": ".$fila['Fecha']."</li>";
            echo "<li><b>Pais</b>".": ".$pais."</li>";
            echo "</ul>";
        }
    }


    //si existe titulo y pais pero no fecha 
    if(isset($titulo) AND !isset($fecha_inicio) AND !isset($fecha_fin) AND isset($pais1))
    {

    $sentencia1 = "SELECT * FROM Fotos WHERE  Titulo like '%$titulo%' AND Pais='$pais1'";
    // Ejecuta la sentencia SQL
    $resultado = mysql_query($sentencia1, $iden);
    if(!$resultado)
    die("Error: no se pudo realizar la consulta");
    
    while($fila = mysql_fetch_assoc($resultado))
        {

            $fe=$fila['Pais'];
            $sentencia3 = "SELECT * FROM Paises WHERE IdPais='$fe'";
            // Ejecuta la sentencia SQL
             $resultado2 = mysql_query($sentencia3, $iden);
             if(!$resultado2)
                 die("Error : no se pudo realizar la consulta");
    
            while($fila1 = mysql_fetch_assoc($resultado2))
            {

                $pais=$fila1['NomPais'];
            }



            $id= $fila['IdFotos'];

            echo "<a href='detalle.php?di=$id'>","<img src='./upload/fotos/".$fila['Fichero']."' width='100px'/></a>" ;            
            echo "<ul>";
            echo "<li><b>Titulo</b>".": ".$fila['Titulo']."</li>";
            echo "<li><b>Fecha</b>".": ".$fila['Fecha']."</li>";
            echo "<li><b>Pais</b>".": ".$pais."</li>";
            echo "</ul>";
        }
    }

    //si existe pais y fecha pero no titulo:
    if(!isset($titulo) AND isset($fecha_inicio) AND isset($fecha_fin) AND isset($pais1))
    {

    $sentencia1 = "SELECT * FROM Fotos WHERE Fecha>='$fecha_inicio' AND Fecha<='$fecha_fin' AND Pais='$pais1'";
    // Ejecuta la sentencia SQL
    $resultado = mysql_query($sentencia1, $iden);
    if(!$resultado)
    die("Error: no se pudo realizar la consulta");
    
    while($fila = mysql_fetch_assoc($resultado))
        {

            $fe=$fila['Pais'];
            $sentencia3 = "SELECT * FROM Paises WHERE IdPais='$fe'";
            // Ejecuta la sentencia SQL
             $resultado2 = mysql_query($sentencia3, $iden);
             if(!$resultado2)
                 die("Error : no se pudo realizar la consulta");
    
            while($fila1 = mysql_fetch_assoc($resultado2))
            {

                $pais=$fila1['NomPais'];
            }



            $id= $fila['IdFotos'];

            echo "<a href='detalle.php?di=$id'>","<img src='./upload/fotos/".$fila['Fichero']."' width='100px'/></a>" ;            
            echo "<ul>";
            echo "<li><b>Titulo</b>".": ".$fila['Titulo']."</li>";
            echo "<li><b>Fecha</b>".": ".$fila['Fecha']."</li>";
            echo "<li><b>Pais</b>".": ".$pais."</li>";
            echo "</ul>";
        }
    }
    //si existe fecha, titulo y pais
    if(isset($titulo) AND isset($fecha_inicio) AND isset($fecha_fin) AND isset($pais1))
    {

    $sentencia1 = "SELECT * FROM Fotos WHERE Fecha>='$fecha_inicio' AND Fecha<='$fecha_fin' AND Titulo like '%$titulo%' AND Pais='$pais1'";
    // Ejecuta la sentencia SQL
    $resultado = mysql_query($sentencia1, $iden);
    if(!$resultado)
    die("Error: no se pudo realizar la consulta");
    
    while($fila = mysql_fetch_assoc($resultado))
        {

            $fe=$fila['Pais'];
            $sentencia3 = "SELECT * FROM Paises WHERE IdPais='$fe'";
            // Ejecuta la sentencia SQL
             $resultado2 = mysql_query($sentencia3, $iden);
             if(!$resultado2)
                 die("Error : no se pudo realizar la consulta");
    
            while($fila1 = mysql_fetch_assoc($resultado2))
            {

                $pais=$fila1['NomPais'];
            }



            $id= $fila['IdFotos'];

            echo "<a href='detalle.php?di=$id'>","<img src='./upload/fotos/".$fila['Fichero']."' width='100px'/></a>" ;            
            echo "<ul>";
            echo "<li><b>Titulo</b>".": ".$fila['Titulo']."</li>";
            echo "<li><b>Fecha</b>".": ".$fila['Fecha']."</li>";
            echo "<li><b>Pais</b>".": ".$pais."</li>";
            echo "</ul>";
        }
    }




    

    ?>
<!--
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
	</div>-->

</section>
  <?php 
    include('pie.inc');
  ?>