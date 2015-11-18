  <?php 
    include('cabecera.inc');
    include('inicio.inc');
  ?>
  
<section id="content-busqueda">

	
	       
			 <form id = "busqueda" action="resultado.php" method="get" onsubmit="return validaBusqueda(this)" novalidate="true">

                <div id= "formularioB">
                    <h3>Criterios de busqueda:</h3> 
                </div>
                <div id="formularioB">
                <label for="B_titulo" > Titulo: </label>
                <br>
                <br>
                <input id="B_titulo" name="Titulo" required="required" type="text" placeholder="Titulo"/>
               
                <span class="bar"></span>
				</div>
				 <div id="formularioB">
	               <br>
						
					<label for="B_Fecha">Fecha de publicación:</label>
                    <br>
						<select id="B_Dia" name="B_Dia">
                             <option value="" disabled selected>Dia</option>
    						<option value="1">1</option>
    						<option value="2">2</option>
    						<option value="3">3</option>
    						<option value="4">4</option>
    						<option value="5">5</option>
    						<option value="6">6</option>
    						<option value="7">7</option>
    						<option value="8">8</option>
    						<option value="9">9</option>
    						<option value="10">10</option>
    						<option value="11">11</option>
    						<option value="12">12</option>
    						<option value="13">13</option>
    						<option value="14">14</option>
    						<option value="15">15</option>
    						<option value="16">16</option>
    						<option value="17">17</option>
    						<option value="18">18</option>
    						<option value="19">19</option>
    						<option value="20">20</option>
    						<option value="21">21</option>
    						<option value="22">22</option>
    						<option value="23">23</option>
    						<option value="24">24</option>
    						<option value="25">25</option>
    						<option value="26">26</option>
    						<option value="27">27</option>
    						<option value="28">28</option>
    						<option value="29">29</option>
    						<option value="30">30</option>
  						</select>
  						<select id="B_Mes" name="B_Mes">
                            <option value="" disabled selected>Mes</option>
    						<option value="1">1</option>
    						<option value="2">2</option>
    						<option value="3">3</option>
    						<option value="4">4</option>
    						<option value="5">5</option>
    						<option value="6">6</option>
    						<option value="7">7</option>
    						<option value="8">8</option>
    						<option value="9">9</option>
    						<option value="10">10</option>
    						<option value="11">11</option>
    						<option value="12">12</option>
  						</select>
  						<select name="B_Año" id="B_Año">
                            <option value="" disabled selected>Año</option>
    						<option value="1980">1980</option>
    						<option value="1981">1981</option>
    						<option value="1982">1982</option>
    						<option value="1983">1983</option>
    						<option value="1984">1984</option>
    						<option value="1985">1985</option>
    						<option value="1986">1986</option>
    						<option value="1987">1987</option>
    						<option value="1988">1988</option>
    						<option value="1989">1989</option>
    						<option value="1990">1990</option>
    						<option value="1991">1991</option>
    						<option value="1992">1992</option>
    						<option value="1993">1993</option>
    						<option value="1994">1994</option>
    						<option value="1995">1995</option>
    						<option value="1996">1996</option>
    						<option value="1997">1997</option>
    						<option value="1998">1998</option>
    						<option value="1999">1999</option>
    						<option value="2000">2000</option>
    						<option value="2001">2001</option>
    						<option value="2002">2002</option>
    						<option value="2003">2003</option>
    						<option value="2004">2004</option>
    						<option value="2005">2005</option>
    						<option value="2006">2006</option>
    						<option value="2007">2007</option>
    						<option value="2008">2008</option>
    						<option value="2009">2009</option>
    						<option value="2010">2010</option>
    						<option value="2011">2011</option>
    						<option value="2012">2012</option>
    						<option value="2013">2013</option>
    						<option value="2014">2014</option>
    						<option value="2015">2015</option>
  						</select>

                        
                    </div>
                    <br>
					 <div id="busqueda">

					<label for="R_pais">Pais:</label>
					<br>
                    <select id="R_pais" name="R_pais">
                        <option value="" disabled selected>Pais</option>
                            <option value="España">España</option>
                            <option value="Egipto">Egipto</option>
                            <option value="Congo">Congo</option>
                            <option value="Portugal">Portugal</option>
                        </select>					
                  </div>
				<div id="formulario">
				<input type="submit" value="Buscar"/> </a>
                </div>
                </form>
	</div>
</section>
  <?php 
    include('pie.inc');
  ?>
  

