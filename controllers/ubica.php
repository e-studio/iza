<?php

require_once "models/crud.php";
require_once('geoplugin.class.php');


class RegistraLog{
	public function registraLogin($usuario){

		$geoplugin = new geoPlugin();

		//locate the IP
		$geoplugin->locate();

		date_default_timezone_set("America/Chihuahua");
		date_default_timezone_get();

		$fecha =  date('Y-m-d H:i:s');
		$ubicacion = $geoplugin->city.','.$geoplugin->regionCode.','.$geoplugin->countryCode ;
		//$usuario= "Ricardo Urbina N.";


		$datosController = array("usuario" => $usuario,
								"ubicacion"=>$ubicacion,
			 					 "fecha" => $fecha);

		$respuesta = Datos::logUsuarioModel($datosController, "logacceso");

		//echo '<script> alert('.$respuesta.');</script>';
		//echo "<br>";
		//echo $usuario.' => '.$fecha.' => '.$ubicacion;
	}
}

?>