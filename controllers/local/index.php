<?php

require_once "../../models/crud.php";
require_once('geoplugin.class.php');
$geoplugin = new geoPlugin();

//locate the IP
$geoplugin->locate();



/**/
echo "Geolocation results for {$geoplugin->ip}: <br />\n".
	"City: {$geoplugin->city} <br />\n".
	"Region: {$geoplugin->region} <br />\n".
	"Region Code: {$geoplugin->regionCode} <br />\n".
	"Region Name: {$geoplugin->regionName} <br />\n".
	"DMA Code: {$geoplugin->dmaCode} <br />\n".
	"Country Name: {$geoplugin->countryName} <br />\n".
	"Country Code: {$geoplugin->countryCode} <br />\n".
	"In the EU?: {$geoplugin->inEU} <br />\n".
	"EU VAT Rate: {$geoplugin->euVATrate} <br />\n".
	"Latitude: {$geoplugin->latitude} <br />\n".
	"Longitude: {$geoplugin->longitude} <br />\n".
	"Radius of Accuracy (Miles): {$geoplugin->locationAccuracyRadius} <br />\n".
	"Timezone: {$geoplugin->timezone} <br />\n".
	"Currency Code: {$geoplugin->currencyCode} <br />\n".
	"Currency Symbol: {$geoplugin->currencySymbol} <br />\n".
	"Exchange Rate: {$geoplugin->currencyConverter} <br />\n";


date_default_timezone_set("America/Chihuahua");
date_default_timezone_get();

$fecha =  date('Y-m-d H:i:s');
$ubicacion = $geoplugin->city.','.$geoplugin->regionCode.','.$geoplugin->countryCode ;
$usuario= "Ricardo Urbina N.";


$datosController = array("usuario" => $usuario,
						"ubicacion"=>$ubicacion,
	 					 "fecha" => $fecha);

$respuesta = Datos::logUsuarioModel($datosController, "logacceso");

echo $respuesta;
echo "<br>";
echo $usuario.' => '.$fecha.' => '.$ubicacion;

?>