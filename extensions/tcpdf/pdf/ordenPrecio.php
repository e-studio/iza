<?php
require_once "../../../controllers/controller.php";
require_once "../../../models/crud.php";
class imprimirOrden {
public $codigo;

function toMoney($val,$symbol='',$r=2)
{
    $n = $val;
    $sign = ($n < 0) ? '-' : '';
    $i = number_format(abs($n),$r);

    return  $symbol.$sign.$i;
}


public function traerImpresionOrden(){
//traemos la informacion de la orden

$itemOrden = "codigo";
$valorOrden = $this->codigo;

//$respuestaOrden = Datos::listaTablaModel("orders", $valorOrden);
$respuestaOrden = controller::ctrMostrarVentas($valorOrden);

$dueDate = $respuestaOrden["dueDate"];
$trailerNo = $respuestaOrden["trailerNo"];
$trailerVin = $respuestaOrden["trailerVin"];
$notas = $respuestaOrden["notes"];

$subTotal = $this->toMoney($respuestaOrden["subTotal"]);
$discount = $this->toMoney($respuestaOrden["discount"]);
$totHrs = $respuestaOrden["totHrs"];
$totOpciones = $this->toMoney($respuestaOrden["totOpciones"]);

$totPrice = $this->toMoney($respuestaOrden["totPrice"]);
$trailerVin = $respuestaOrden["trailerVin"];
$specs = json_decode($respuestaOrden["trailerSpecs"], true);
$options = json_decode($respuestaOrden["options"], true);

$trailerHrs = $specs["horasMdl"];
$trailerPrice = $this->toMoney($specs["precioMdl"]);


for ($i=1; $i<=16; $i++){
    ${"codigo" . $i} = $options['codigo'.$i];
    ${"descEnglish" . $i} = $options['descEnglish'.$i];
    ${"descEspanol" . $i} = $options['descEspanol'.$i];
    ${"horas" . $i} = $options['horas'.$i];
    ${"precio" . $i} = $this->toMoney($options['precio'.$i]);

}

//REQUERIMOS LA CLASE TCPDF
require_once('tcpdf_include.php');

$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

$pdf->startPageGroup();

$pdf->AddPage();

// ---------------------------------------------------------

$bloque1 = <<<EOF

  <table width="540" border="1" cellspacing="0" cellpadding="10">
  <tbody>
    <tr>
      <td style="width:200px"><p>Trailer #: $trailerNo</p>
        <p>TRailer Vin: $trailerVin</p>
      <p>Due Date: $dueDate</p></td>
      <td style="width:340px"><p style="font-weight: bold; font-size: 36px; text-align: center;">$valorOrden</p>
      <p style="padding: 10px; font-weight: normal; font-size: 10px; text-align: left;">Notes: $notas</p></td>
    </tr>
  </tbody>
</table>
<table>

	<tr>

		<td style="width:540px"><img src="images/backFact.jpg"></td>

	</tr>

</table>

EOF;

$pdf->writeHTML($bloque1, false, false, false, false, '');


// ---------------------------------------------------------
$i=1;

foreach($specs as $clave => $valor) {
if($i==1){
	$renglon = '<table width="540" border="1" cellspacing="0" cellpadding="0">
			  <tbody>
			    <tr bgcolor="#d6d8db" style="font-weight: normal; font-size: 8px; font-weight: bold; text-align: center;">
					<td>Trailer Model</td>
					<td>Trailer Length</td>
					<td>Trailer Width</td>
					<td>Axles</td>
					<td>Sides</td>
					<td>Top</td>
					<td>Rear Gate</td>
					<td>Compartments</td>
					<td>Escape Gate</td>
				</tr>
				<tr style="font-weight: normal; font-size: 7px; fo-color:red; color: red; text-align: center;">';
		}


if (($i < 10) || ($i>11 && $i<21)||($i>20 && $i<30) || ($i>30)){
	$renglon .= "<td>".$valor."</td>";
	}


if ($i == 11 ){
	$renglon .= '</tr>
				<tr bgcolor="#d6d8db" style="font-weight: normal; font-size: 8px; font-weight: bold; text-align: center;">
					<td>ToolBox Option</td>
                    <td>Saddle Racks</td>
                    <td>Blanket Bars</td>
                    <td>Floor Type</td>
                    <td>Floor Spacing</td>
                    <td>Rollers</td>
                    <td>Receiver Hitch</td>
                    <td>4 High Side</td>
                    <td>Matting p/ft</td>
				</tr>
				<tr style="font-weight: normal; font-size: 7px; fo-color:red; color: red; text-align: center;">';
	//$renglon .= "<td>".$valor."</td>";
	}

if ($i == 20 ){
	$renglon .= '</tr>
				<tr bgcolor="#d6d8db" style="font-weight: normal; font-size: 8px; font-weight: bold; text-align: center;">
					<td>Calf Gates</td>
                    <td>V Rod</td>
                    <td>Air Vents</td>
                    <td>Rhino Liner ft2</td>
                    <td>Side/Rails</td>
                    <td>Saddle Box Type</td>
                    <td>Tires</td>
                    <td>Extra Tire</td>
                    <td>Color</td>
				</tr>
				<tr style="font-weight: normal; font-size: 7px; fo-color:red; color: red; text-align: center;">';
	//$renglon .= "<td>".$valor."</td>";
	}

if ($i == 30){
	$renglon .= '</tr>
				<tr bgcolor="#d6d8db" style="font-weight: normal; font-size: 8px; font-weight: bold; text-align: center;">
                    <td>Front Plug</td>
                    <td>Rear Plug</td>
                    <td>Tire Cover</td>
                    <td>Tarp</td>
                    <td>Trailer Weight</td>
                    <td>Floor/ft</td>
                    <td colspan="3"></td>
				</tr>
				<tr style="font-weight: normal; font-size: 7px; fo-color:red; color: red; text-align: center;">';
	$renglon .= "<td>".$valor."</td>";
}


$i++;
}

$bloque2 = <<<EOF
			$renglon
		</tr>
	</tbody>
</table>
<table>

	<tr>

		<td style="width:540px"><img src="images/5px.jpg"></td>

	</tr>

</table>
<table width="540" border="0" cellspacing="0" cellpadding="0">
    <tr>
        <td style="width:300px"></td>
        <td style="width:200px">
            <table width="200" border="1" cellspacing="0" cellpadding="1" style="font-weight: normal; font-size: 7px; text-align: right;">
                <tbody>
                    <tr bgcolor="#d6d8db" style="font-size: 10px; font-weight: bold; text-align: center;">
                        <td colspan="4" ><strong>Trailer</strong></td>
                    </tr>
                <tr>

                    <td style="width:50px">Trailer Hours</td>
                    <td style="width:50px">$trailerHrs</td>
                    <td style="width:50px">Trailer Price</td>
                    <td style="width:50px">$trailerPrice</td>

                 </tr>
                 
               </tbody>
            </table>
        </td>
    </tr>
</table>
<table>

    <tr>

        <td style="width:540px"><img src="images/5px.jpg"></td>

    </tr>

</table>


EOF;

$pdf->writeHTML($bloque2, false, false, false, false, '');



// ---------------------------------------------------------
$bloque3 = <<<EOF
<table width="540" border="1" cellspacing="0" cellpadding="0" style="font-weight: normal; font-size: 7px; fo-color:red; color: red; text-align: center;">
    <tbody>
    <tr bgcolor="#d6d8db" style="font-size: 10px; font-weight: bold; text-align: center; color: black;">
        <td colspan="5"><strong><h5>Options</h5></strong></td>
    </tr>
     <tr bgcolor="#d6d8db" style="font-size: 8px; font-weight: bold; text-align: center; color: black;">
        <td style="width:100px">Option Code</td>
        <td style="width:180px">Trailer Option</td>
        <td style="width:180px">Notes</td>
        <td style="width:40px">Hours</td>
        <td style="width:40px">Price</td>
     </tr>
     
     <tr>
        <td>$codigo1</td>
        <td>$descEnglish1</td>
        <td>$descEspanol1</td>
        <td>$horas1</td>
        <td>$precio1</td>
     </tr>

     <tr>
        <td>$codigo2</td>
        <td>$descEnglish2</td>
        <td>$descEspanol2</td>
        <td>$horas2</td>
        <td>$precio2</td>
     </tr>

    <tr>
        <td>$codigo3</td>
        <td>$descEnglish3</td>
        <td>$descEspanol3</td>
        <td>$horas3</td>
        <td>$precio3</td>
     </tr>

    <tr>
        <td>$codigo4</td>
        <td>$descEnglish4</td>
        <td>$descEspanol4</td>
        <td>$horas4</td>
        <td>$precio4</td>
     </tr>

    <tr>
        <td>$codigo5</td>
        <td>$descEnglish5</td>
        <td>$descEspanol5</td>
        <td>$horas5</td>
        <td>$precio5</td>
     </tr>

    <tr>
        <td>$codigo6</td>
        <td>$descEnglish6</td>
        <td>$descEspanol6</td>
        <td>$horas6</td>
        <td>$precio6</td>
     </tr>

    <tr>
        <td>$codigo7</td>
        <td>$descEnglish7</td>
        <td>$descEspanol7</td>
        <td>$horas7</td>
        <td>$precio7</td>
     </tr>

    <tr>
        <td>$codigo8</td>
        <td>$descEnglish8</td>
        <td>$descEspanol8</td>
        <td>$horas8</td>
        <td>$precio8</td>
     </tr>

     <tr>
        <td>$codigo9</td>
        <td>$descEnglish9</td>
        <td>$descEspanol9</td>
        <td>$horas9</td>
        <td>$precio9</td>
     </tr>

     <tr>
        <td>$codigo10</td>
        <td>$descEnglish10</td>
        <td>$descEspanol10</td>
        <td>$horas10</td>
        <td>$precio10</td>
     </tr>
     <tr>
        <td>$codigo11</td>
        <td>$descEnglish11</td>
        <td>$descEspanol11</td>
        <td>$horas11</td>
        <td>$precio11</td>
     </tr>

     <tr>
        <td>$codigo12</td>
        <td>$descEnglish12</td>
        <td>$descEspanol12</td>
        <td>$horas12</td>
        <td>$precio12</td>
     </tr>

     <tr>
        <td>$codigo13</td>
        <td>$descEnglish13</td>
        <td>$descEspanol13</td>
        <td>$horas13</td>
        <td>$precio13</td>
     </tr>

     <tr>
        <td>$codigo14</td>
        <td>$descEnglish14</td>
        <td>$descEspanol14</td>
        <td>$horas14</td>
        <td>$precio14</td>
     </tr>

     <tr>
        <td>$codigo15</td>
        <td>$descEnglish15</td>
        <td>$descEspanol15</td>
        <td>$horas15</td>
        <td>$precio15</td>
     </tr>

     <tr>
        <td>$codigo16</td>
        <td>$descEnglish16</td>
        <td>$descEspanol16</td>
        <td>$horas16</td>
        <td>$precio16</td>
     </tr>
    </tbody>
</table>
<table>

    <tr>

        <td style="width:540px"><img src="images/backFact.jpg"></td>

    </tr>

</table>
EOF;
$pdf->writeHTML($bloque3, false, false, false, false, '');




// ---------------------------------------------------------
$bloque4 = <<<EOF

<table width="520" border="0" cellspacing="0" cellpadding="0">
    <tr>
        <td style="width:290px"></td>
        <td style="width:200px">
            <table width="240" border="1" cellspacing="0" cellpadding="1" style="font-weight: normal; font-size: 7px; text-align: right;">
                <tbody>
                    <tr bgcolor="#d6d8db" style="font-size: 10px; font-weight: bold; text-align: center;">
                        <td colspan="4" ><strong>Totals</strong></td>
                    </tr>
                <tr>

                    <td style="width:60px">Total Hours</td>
                    <td style="width:60px">$totHrs</td>
                    <td style="width:60px">Total Options</td>
                    <td style="width:60px">$totOpciones</td>

                 </tr>
                 <tr>
                    <td colspan="2">&nbsp;</td>
                    <td>Sub-Total</td>
                    <td>$subTotal</td>

                 </tr>
                 <tr>
                    <td colspan="2">&nbsp;</td>
                    <td>2% Discount</td>
                    <td>$discount</td>

                 </tr>
                 <tr>
                    <td colspan="2">&nbsp;</td>
                    <td>Total</td>
                    <td>$ $totPrice</td>

                 </tr>
                    </tbody>
            </table>
        </td>
    </tr>
</table>


EOF;
$pdf->writeHTML($bloque4, false, false, false, false, '');



// damos salida a los bloques que hemos creado

$pdf->Output($valorOrden.'.pdf');





}


}

$orden = new imprimirOrden();
$orden -> codigo = $_GET["codigo"];
$orden -> traerImpresionOrden();


?>