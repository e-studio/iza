<?php
require_once "../../../controllers/controller.php";
require_once "../../../models/crud.php";
class imprimirOrden {
public $codigo;

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
$totHrs = $respuestaOrden["totHrs"];
$specs = json_decode($respuestaOrden["trailerSpecs"], true);
$options = json_decode($respuestaOrden["options"], true);


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

		<td style="width:540px"><img src="images/backFact.jpg"></td>

	</tr>

</table>


EOF;

$pdf->writeHTML($bloque2, false, false, false, false, '');



// ---------------------------------------------------------
$i=1;
$renglonOpc='<table width="540" border="1" cellspacing="0" cellpadding="0">
			  <tbody>
			    <tr bgcolor="#d6d8db" style="font-size: 8px; font-weight: bold; text-align: center;">
					<td style="width:100px">Option Code</td>
					<td style="width:200px">Trailer Option</td>
					<td style="width:200px">Notes</td>
					<td style="width:40px">Hours</td>
				</tr>
				<tr style="font-weight: normal; font-size: 7px; fo-color:red; color: red; text-align: center;">';

foreach($options as $claveOp => $valorOp) {
if (($i>=1 && $i<5)||
	($i>5 && $i<10)||
	($i>10 && $i<15)||
	($i>15 && $i<20)||
	($i>20 && $i<25)||
	($i>25 && $i<30)||
	($i>30 && $i<35)||
	($i>35 && $i<40)||
	($i>40 && $i<45)||
	($i>45 && $i<50)||
	($i>50 && $i<55)||
	($i>55 && $i<60)||
	($i>60 && $i<65)||
	($i>65 && $i<70)||
	($i>70 && $i<75)||
	($i>75 && $i<80)||
	($i>80 && $i<85)){
	$renglonOpc .= "<td>".$valorOp."</td>";
}


if (
	($i==4) ||
	($i==9) ||
	($i==14)||
	($i==19)||
	($i==24)||
	($i==29)||
	($i==34)||
	($i==39)||
	($i==44)||
	($i==49)||
	($i==54)||
	($i==59)||
	($i==64)||
	($i==69)||
	($i==74)){
	$renglonOpc .= '</tr>
					<tr style="font-weight: normal; font-size: 7px; fo-color:red; color: red; text-align: center;">';
}

$i++;
}



$bloque3 = <<<EOF

		$renglonOpc
	</tr>
  </tbody>
</table>
<table>



EOF;

$pdf->writeHTML($bloque3, false, false, false, false, '');

// ---------------------------------------------------------
$bloque4 = <<<EOF
<table width="540" border="1" cellspacing="0" cellpadding="0">

	<tr style="font-weight: normal; font-size: 7px; text-align: center;">
		<td style="width:400px"></td>
		<td style="width:100px font-size: 8px; font-weight: bold; text-align: center;">Total Hours</td>
		<td style="width:40px; fo-color:red; color: red;">$totHrs</td>

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