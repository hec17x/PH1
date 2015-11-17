<header id="cab_principal">
  <a href="./index.php"><img src="images/logo1.png"  alt="foto"></a>
  <nav>
  
   

        <ul class="menu"> 
          <?php

           $url_actual = $_SERVER["REQUEST_URI"];

         
          if($url_actual=="/PH1/index.php" OR $url_actual=="/PH1/" OR  $url_actual=="/ph1/" OR  $url_actual=="/ph1/index.php")
          {
           echo  "<li><a href='busqueda.php'>Busqueda Avanzada</a></li>";  
          }
          else
          {
             echo  "<li><a href='index.php'>Atras</a></li>";  
          }
          
           ?>
            <li>
                 Apariencia
                 <ul>
                    <li><a href="#" onclick="setActiveStyleSheet('Estilo principal'); return false;">Estilo Principal</a></li>
                    <li><a href="#" onclick="setActiveStyleSheet('Estilo de escala de grises'); return false;">Estilo Alternativo</a></li>    
                </ul>
          
           </li>

        </ul>  
          
       
  </nav> 
  </header>

  </header>
