
  <?php 
    include('cabecera.inc');
    include('inicio.inc');
  ?>
  


<h2> Resultado de busqueda</h2>
<h3>Criterios de busqueda:</h3> 
	
    <?php
    /*ESTE SCRIPT IMPRIME TITULO FECHA Y PAIS EN RESULTADO DE BUSQUEDA
        NECESITA UN JAVASCRIP PARA QUE OBLIGUE A RELLENAR TODOS LOS INPUTS*/
        if($_GET['Titulo'] !=null){ 

            $titulo = $_GET['Titulo'];
            echo "TITULO: " .$titulo;  echo " -- ";
            
            }

        //FECHA en formato de la base de datos

        $fecha_inicio= $_GET['fecha_inicio'];
        $fecha_inicio = strtotime("$fecha_inicio");
        //echo "1".$fecha_inicio;
        $fecha_inicio = date("Y-m-d", $fecha_inicio);
        echo "INICIO: ".$fecha_inicio;

        $fecha_fin= $_GET['fecha_fin'];
        $fecha_fin = strtotime("$fecha_fin");
        //echo "1".$fecha_inicio;
        $fecha_fin = date("Y-m-d", $fecha_fin);
        echo "FIN: ".$fecha_fin;



        /////////////

        if( !empty($_GET['R_pais'])){ 
            
            if(!($iden = mysql_connect("localhost", "root", "")))
                    die("Error: No se pudo conectar");
            if(!mysql_select_db("p&i", $iden))
                    die("Error: No existe la base de datos");

            $pais1 = $_GET['R_pais'];     
            $pais = mysql_query("SELECT NomPais FROM paises where IdPais = '$pais1'  ", $iden); ;
            
            //echo "PAIS:" .$pais; //resultado de esta linea muestra Resource id #6
            //echo "PAIS:" .$pais1; //resultado de esta es IdPais el numero
            
            if($pais1==1) echo "PAIS: España";
            if($pais1==2) echo "PAIS: Egipto";
            if($pais1==3) echo "PAIS: Congo";
            if($pais1==4) echo "PAIS: Portugal";
            /*          mysql_query("SET NAMES 'utf8'");
                        $consulta='SELECT * FROM Paises';
                        $resultado=mysql_query($consulta);
                        if ($lista=mysql_fetch_array($resultado)) {
                            if(){
                                echo "<option value=".$lista['IdPais'].">".$lista['NomPais']."</option>";
                            }
                        }*/
            }

        
        echo "<br>";
        echo "<br>";


    ?>

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
	</div>

</section>
  <?php 
    include('pie.inc');
  ?>