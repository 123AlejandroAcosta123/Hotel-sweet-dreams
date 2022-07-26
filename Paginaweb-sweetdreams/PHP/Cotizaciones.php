
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cotizacion</title>
    <link rel="stylesheet" href="css/codigo_3.css">

</head>
<header>
<nav>

<ul class="menu">

<li> <div class="i"> 

<img  src="imagenes/10.PNG"width="10%"> 

</div> </li>

<li><a href="inicio.html"> inicio</a></li>

 <li> <a  href="Ofertas y planes.html">ofertas y planes</a></li>

   <li> <a> Destinos </a>

    <ul class="submenu">

        <li>

             <a href="Cartagena.html"> Cartagena </a>

            <a href="Medellin.html"> Medellin </a>

            <a href="Tunja.html"> Tunja </a>

            <a href="cali.html"> Cali </a>

        </li>
        

    </ul>

   <li> <a  href="Eventos.html">  Eventos </a></li>

   <li><a>NIT:567158348-5 </a> </li>

</ul>

</nav>

</header>

<body>

<div class="container">
  
<center> <img src="imagenes/vacaciones.JPG" width="100%" ></center>
</div>
    

    <form action="" method="post" class="formulario">

    
    <h3 class="titulos">ELIJA 1 TIPO DE CLIENTE</h3><br>

    <div class="radio"> <!-- abre input radio -->

    <input type="radio" name="ClienteNuevo" id="cn">
    <label for="cn">Cliente Nuevo.</label>

    <input type="radio" name="ClienteAntiguo" id="ca"> 
    <label for="ca">Cliente Antiguo.</label><br>

    </div> <!-- Cierra input radio -->

<hr>

    <h3 class="titulos">ELIJA EL TIPO DE HABITACION QUE DESEA.</h3><br>

     <div class="checkbox"> <!-- abre input checkbox -->

    <input type="checkbox" name="Habsencilla" value="Habsencilla" id="1" >
    <label for="1">Hab.sencilla.</label>
    <input type="checkbox" name="Habdoble" id="2" >
    <label for="2">Hab.doble.</label>
    <input type="checkbox" name="Habtriple" id="3" >
    <label for="3">Hab.trple.</label>
    <input type="checkbox" name="Habsuite" id="4">
    <label for="4">Hab.suite.</label>

    <input type="checkbox" name="Eventos" id="5">
    <label for="5">Eventos. </label> <br><br>
    
     </div> <!-- Cierra input de checkbox -->


    <div class="formulario11"> <!-- abre dvi formulario11 -->
    <div class="formulario1"> <!-- abre dvi formulario1 -->

    <label for="n">Numero de Noches. </label> 
    <input type="number" name="noches" id="n" ><br><br>

    <input type="submit" value="Enviar" name="Enviar"> <br><br>



<?php
//Codigo general o Gloval 
$Habsencilla=50000;
$Habdoble = 75000;
$Habtriple = 100000;
$Habsuite = 300000;
$Eventos = 3000000;
$noches= 0;
$Total = 0;
$Total1 = 0;
$Total2 = 0;
$Total3 = 0;
$Total4 = 0;
$numerodeservicios = 0;
$unservicio = 0;
$dosservicios= 0.06;
$tresservicios = 0.12;
$cuatroservicios = 0.18;
$cincomasservicios = 0.20;
$Valortotal = "";
$ClienteNuevo= 0;
$ClienteAntiguo= 0.17;

if (isset($_POST['Enviar'])) {

    $noches = $_POST['noches'];

        //Cuando las noches a cotizar equivale cero y 365 dias
        if ($noches == 0) {
            exit("<i> <center>Por favor ingrese el numero de noches que desea hospedaje</i>");
        } else if ($noches > 365) {
            
            exit("<i> <center>El hotel no ofrece servicios superiores a un año, por favor ingrese un numero de noches menor a 1 año</i>");
        }

  if(isset($_POST['Habsencilla']))
  {
      $Total += $Habsencilla;
      $numerodeservicios += 1;
  }

  if(isset($_POST['Habdoble']))
  {
      $Total += $Habdoble;
      $numerodeservicios += 1;
  }

  if(isset($_POST['Habtriple']))
  {
      $Total += $Habtriple;
      $numerodeservicios += 1;
  }

  if(isset($_POST['Habsuite']))
  {
      $Total += $Habsuite;
      $numerodeservicios += 1;
  }

  if(isset($_POST['Eventos']))
  {
      $Total += $Eventos;
      $numerodeservicios += 1;
  }

  //impuesto sobre las ventas del 19% (IVA)

  $Total1 = $Total + ($Total * 0.19);

 $noches= $_POST['noches'];

  $Total2 *= $noches;
  
  switch ($noches) {

      case ($noches<=6&&$noches>=1):
        $noches=0;
        break;

        case ($noches>=7&&$noches<=28):
            $noches=0.05;
            break;

            case ($noches>=29&&$noches<=58):
                $noches=0.10;
                break;

                case ($noches>=59&&$noches<=179):
                    $noches=0.15;
                    break;

                    case ($noches>=180&&$noches<=364):
                        $noches=0.20;
                        break;

                        case ($noches==365):
                            $noches=0.30;
                            break;

                            default:
                            //
                            break;
  }
  
  $Total2 = $Total1 - ($Total * $noches);


   if ($numerodeservicios !=0 ) 

   {
    

    if ($numerodeservicios == 2) {
        $Total = ($Total - ($Total * $dosservicios));
    } //Descuento por tres servicios
    else if ($numerodeservicios == 3) {
        $Total = ($Total - ($Total * $tresservicios));
    } //Descuento por cuatro servicios
    else if ($numerodeservicios == 4) {
        $Total = ($Total - ($Total * $cuatroservicios));
    } //Descuento por cinco servicios
    else if ($numerodeservicios >= 5) {
        $Total = ($Total - ($Total * $cincomasservicios));
    }

   }


   if (isset($_POST['ClienteAntiguo']))
    {
        $Total4=$Total*$ClienteAntiguo;
    }

    if (isset($_POST['ClienteNuevo']))
    {
        $Total4=$Total*$ClienteNuevo;
    }


}

echo $valorTotal =  "<i> <center> El valor total es: $ </i>" . number_format($Total2-$Total4);

?>

</div> <!-- Cierra formilario11 -->
</div><!-- cierra fomulario1 -->
</form>

<div class="todo" >

<h1 class="titulos"> Cotizaciones </h1>

    <p class="parrafos"> Coordial saludo querido usuario a continuacion usted encontrar la seccion donde podra cotizar su hospedaeje en cualquiera de nuestros hoteles.<b>recuerde que puede ver las diferentes 
        intalaciones en la parte superior en DESTINOS </b> donde podra indagar acerca de cada uno de las instalaciones.
    </p>

    <hr>

<h2 class="titulos2">Importante</h2>

<p class="parrafos"> Querido usuario asegurese de llenar el formato correctamente con cada uno de los datos que se le piden,no olvide llenar cada uno de los recuadros que encontrara a continuacion 
     <b> antes de darle aceptar verifique que sus datos sean correctos.</b>
    
     <br> <br>
</p>

<h3>Tener en cuenta</h3>

         <p class="parrafos">para realizar su debida cotizacion tenga en cuenta que dependiendo del numero de noches y servicios 
             se le hara algunos descuentos, tambien es de recordar que si el cotizante es un <b>usuario antiguo</b> resevira un descuento del 17%.</p><br>

             <table>
             <div class="tablas">
    
            <tr>
                <th>Numero de servicios</th>
                <th>Descuentos</th>
                <th>Noches</th>
                <th>Descuentos</th>
            </tr>
            <tr>
                <td>1</td><td>0%</td><td>1-6</td><td>0%</td>
            </tr>
            <tr>
                <td>2</td><td>6%</td><td>7-28</td><td>6%</td>
            </tr>
            <tr>

                <td>3</td><td>12%</td><td>29-58</td><td>12%</td>
            </tr>
            <tr>
                <td>4</td><td>18%</td><td>59-179</td><td>18%</td>
            </tr>
            <tr>
                <td>5 </td><td>20%</td><td>180-364</td><td>20%</td>
            </tr>
            <tr>
                <td>mas de 5 servicios </td><td>20%</td><td>365</td><td>30%</td>
            </tr>

            <hr class="divisiones">

            </div> <!-- cierra div de "tabalas" -->

            </table>

            <br><br>


</body>



</div> <!-- Cierra div de "todo" -->

<footer> <!-- Inicio del footer -->

<section class="pantalla_dividida"> <!-- Inicio de la seccion del footer -->

    <div class="izquierda"> <!-- parte izquierda de la seccion"div" -->

    
        <center> <h1 ><i>Contactanos</i></h1>

            <H1> Direccion </H1>
             
            <p> ***** # ****** *******</p>
         
            <H1> Redes sociales </H1>
         <ul>
             <li> Instagram : *Sweet-dreams_Hotel* </li> <br> <br>
             <li> Facebook : *Sweet Dremams official* </li> <br> <br>
             <li> TikTok : *Sweet-dreamsHotel* </li> <br>      <br>
         </ul>
         <p> para mas informacion al respecto de nuestro hotel por favor escribanos al siguiente whatsAPP 3002437719 y con gutos los atenderemos.</p> <br>
         
        </center>
 <br>

 <br>

</div> <!-- Cierra div de parte izquierda -->

<div class="derecha"> <!-- abre div parte derecha -->

<h3>Programadores</h3><br>

<aling="center"><img src="imagenes/yo ajiaco.jpg" width="25%">&nbsp &nbsp &nbsp &nbsp <aling="center"><img src="imagenes/katherin.jpeg" width="20%" ><br>

<h3>Informacion</h3>

<br>

<b>Nombres</b>: Manuel Alejandro Acosta Chiquiza / Katherin Chacon <br>
<b>Titulos de estudios</b>: Desarrollador de software / Desarrolladora de software<br>
<b>Universidad</b>: UNAD / UNAD<br>
<b>Años de Experencia</b>: Ninguna / Ninguna

<h3>Formas de contacto</h3> <br>
<b>celular</b>:3002437719 / 3208289153<br>


</div> <!-- Cierra div parte derecha -->

</section> <!-- Cierra seccion -->

</footer> <!-- Cierra el footer -->

</html>