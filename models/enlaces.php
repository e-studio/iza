<?php

class EnlacesModels{

	public function enlacesModel($enlaces){

		if($enlaces == "inicio" ||
		   $enlaces == "ingreso" ||
		   $enlaces == "cotizador" ||
		   $enlaces == "registroUsuario" ||
		   $enlaces == "vacio" ||
		   $enlaces == "empleados" ||
		   $enlaces == "ordenes" ||
		   $enlaces == "cambiosOrdenes" ||
		   $enlaces == "editOpciones" ||
		   $enlaces == "detalleOrdenCambiada" ||
		   $enlaces == "editOrder" ||
		   $enlaces == "editSaddles" ||
		   $enlaces == "editVents" ||
		   $enlaces == "addEmpleado" ||
		   $enlaces == "addProducto" ||
		   $enlaces == "editEmpleados" ||
		   $enlaces == "lostPassword"){

			$module = "views/modules/".$enlaces.".php";
		}

		else if ($enlaces == "opciones" ||
				 $enlaces == "saddles" ||
				 $enlaces == "vents"){
			$module = "views/modules/opciones.php";

		}

		else if($enlaces == "index"){
			$module = "views/modules/login.php";
		}

		else{
			$module = "views/modules/login.php";
		}

		return $module;

	}


}