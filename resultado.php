
  <?php 
    include('cabecera.inc');
    include('inicio.inc');
  ?>
  


<h2> Resultado de busqueda</h2>
<h3>Criterios de busqueda:</h3> 
	
    <?php
    /*ESTE SCRIPT IMPRIME TITULO FECHA Y PAIS EN RESULTADO DE BUSQUEDA
        NECESITA UN JAVASCRIP PARA QUE OBLIGUE A RELLENAR TODOS LOS INPUTS*/
        $titulo = $_GET['Titulo'];
        

        $fechadia = $_GET['B_Dia'];
        $fechames = $_GET['B_Mes'];
        $fechaaño = $_GET['B_Año'];

        $pais = $_GET['R_pais'];

        echo "TITULO: " .$titulo;  echo " -- ";
        echo "FECHA: " .$fechadia; echo "/" .$fechames; echo "/" .$fechaaño; echo " -- ";
        echo "PAIS:" .$pais;
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