
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="" method="post">

    <input type="checkbox" name="Habsencilla" value="Habsencilla">Hab.sencilla
    <input type="checkbox" name="Habdoble" value="Habdoble">Hab.doble
    <input type="checkbox" name="HabTriple" value="Habtriple">Hab.triple
    <input type="checkbox" name="HabSuite" value="HabSuite">Hab.suite
    <input type="checkbox" name="Eventos" value="Eventos">Eventos <br><br>

    <input type="checkbox" name="ClienteNuevo" value="clienteNuevo">Cliente Nuevo
    <input type="checkbox" name="ClienteAntiguo" value="clenteAntiguo">Cliente antiguo <br><br>

    <input width="10%" type="number" name="numerodeservicios" value="numerodeservicios">Numuero de servicios <br><br>

    <input type="number" name="noches" value="noches">Numuero de noches <br><br>

    <input type="submit" value="Enviar" name="Enviar"> <br>

    <img class="imagen" src="C:\xampp\htdocs\Paginaweb-sweetdreams\imagenes\9.png">  

</form>

</body>

</html>

<?php
//Codigo general o Gloval 
$Habsencilla=50000;
$Habdoble = 75000;
$Habtriple = 100000;
$Habsuite = 300000;
$Eventos = 3000000;
$noches=0;
$Total = 0 ;
$numerodeservicios = 0;
$Valortotal = "";
$ClienteNuevo= 0;
$ClienteAntiguo= 0.17;

if (isset($_POST['Enviar'])) {

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

  if(isset($_POST['habtriple']))
  {
      $Total += $Hab_triple;
      $numerodeservicios += 1;
  }

  if(isset($_POST['habsuite']))
  {
      $Total += $Hab_suite;
      $numerodeservicios += 1;
  }

  if(isset($_POST['Eventos']))
  {
      $Total += $Eventos;
      $numerodeservicios += 1;
  }

  //impuesto sobre las ventas del 19% (IVA)

  $Total = $Total + ($Total * 0.19);

  $noches= $_POST['noches'];

  $Total *= $noches;

  switch ($noches) {
      case $noches <=6:
        $Total=($Total);
        break;

        case ($noches>=7&&$noches<=29):
            $Total = ($Total-($Total*0.05));
            break;

            case ($noches>=30&&$noches<=59):
                $Total = ($Total-($Total*0.10));
                break;

                case ($noches>=60&&$noches<=119):
                    $Total = ($Total-($Total*0.15));
                    break;

                    case ($noches>=120&&$noches<=180):
                        $Total = ($Total-($Total*0.20));
                        break;

                        case ($noches>=181&&$noches<=360):
                            $Total = ($Total-($Total*0.30));
                            break;

                            default:
                            //
                            break;
  }

   if ($numerodeservicios !=0 ) 

   {
    $numerodeservicios= $_POST['numerodeservicios'];

    $Total *= $numerodeservicios;
  

    switch ($numerodeservicios) {
        case $numerodeservicios ==1:
            break;

        case $numerodeservicios ==2:
            $Total= ($Total-($Total * 0.06));
            break;

        case $numerodeservicios ==3:
            $Total= ($Total-($Total * 0.12));
            break;

         case $numerodeservicios ==4:
            $Total= ($Total-($Total * 0.18));
            break;

        case $numerodeservicios >=5:
            $Total= ($Total-($Total * 0.20));
            break;

        default:
            //dd
            break;
    } 
   }

if (isset($_POST['clienteAntiguo'])) {

    $Total= ($Total-($Total*0.17));
//tipo radio
}

else {
    echo "porfavor indique que tipo de cliente que es usted";
}

echo $Valortotal=  $Total; 

}

?>
