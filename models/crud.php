<?php

require_once "conexion.php";

class Datos extends Conexion{

	/*=============================================
	CONSULTAR ORDENES PARA IMPRESION
	=============================================*/

	static public function mdlMostrarVentas($tabla, $codigo){

		if($codigo != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE orderNo = :codigo LIMIT 1");

			$stmt -> bindParam(":codigo", $codigo, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();

		}

		//$stmt -> close();

		$stmt = null;

	}


	#DATOS PARA GRAFICA 1
	#-------------------------------------

	public function grafica1Model($tabla){

		$stmt = Conexion::conectar()->prepare("SELECT COUNT( * ) AS cantidad , MONTHNAME(orderDate) AS mes FROM $tabla WHERE YEAR(orderDate)='2018' GROUP BY MONTH(orderDate) ORDER BY orderDate");
		$stmt -> execute();
		return $stmt -> fetchALL();

		$stmt->close();
	}

	#DATOS PARA GRAFICA 2
	#-------------------------------------

	public function grafica2Model($tabla){

		$stmt = Conexion::conectar()->prepare("SELECT SUM(totPrice) AS total , MONTHNAME(orderDate) AS mes FROM $tabla WHERE YEAR(orderDate)='2018' GROUP BY MONTH(orderDate) ORDER BY orderDate");
		$stmt -> execute();
		return $stmt -> fetchALL();

		$stmt->close();
	}




	#REGISTRO DE USUARIOS
	#-------------------------------------
	public function registroUsuarioModel($datosModel, $tabla){

		#prepare() Prepara una sentencia SQL para ser ejecutada por el método PDOStatement::execute(). La sentencia SQL puede contener cero o más marcadores de parámetros con nombre (:name) o signos de interrogación (?) por los cuales los valores reales serán sustituidos cuando la sentencia sea ejecutada. Ayuda a prevenir inyecciones SQL eliminando la necesidad de entrecomillar manualmente los parámetros.

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (nombre, usuario, password, email, sistema, rol, activo) VALUES (:nombre,:usuario,:password,:email,:sistema,:rol,:activo)");

		#bindParam() Vincula una variable de PHP a un parámetro de sustitución con nombre o de signo de interrogación correspondiente de la sentencia SQL que fue usada para preparar la sentencia.

		$stmt->bindParam(":nombre", $datosModel["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":usuario", $datosModel["usuario"], PDO::PARAM_STR);
		$stmt->bindParam(":password", $datosModel["password"], PDO::PARAM_STR);
		$stmt->bindParam(":email", $datosModel["email"], PDO::PARAM_STR);
		$stmt->bindParam(":sistema", $datosModel["sistema"], PDO::PARAM_STR);
		$stmt->bindParam(":rol", $datosModel["rol"], PDO::PARAM_INT);
		$stmt->bindParam(":activo", $datosModel["activo"], PDO::PARAM_STR);

		if($stmt->execute()){

			return "success";

		}

		else{

			return "error";

		}

		$stmt->close();

	}


	#REGISTRO DE ORDENES
	#-------------------------------------
	public function registroOrden($datosModel, $tabla){

			$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (orderNo, trailerNo, trailerVin, dueDate, orderDate,notes, trailerHrs, totOpciones, trailerPrice, subTotal, discount, totHrs, totPrice, options, trailerSpecs) VALUES (:orderNo, :trailerNo, :trailerVin, :dueDate,:orderDate, :notes, :horasMdl, :totOpciones, :precioMdl, :subTotal, :discount, :TotalHoras, :Total, :ops, :specifications)");

				$stmt->bindParam(":orderNo", $datosModel["order"], PDO::PARAM_INT);
				$stmt->bindParam(":trailerNo", $datosModel["trailerNo"], PDO::PARAM_INT);
				$stmt->bindParam(":trailerVin", $datosModel["trailerVin"], PDO::PARAM_STR);
				$stmt->bindParam(":dueDate", $datosModel["dueDate"], PDO::PARAM_STR);
				$stmt->bindParam(":orderDate", $datosModel["orderDate"], PDO::PARAM_STR);
				$stmt->bindParam(":notes", $datosModel["notes"], PDO::PARAM_STR);
				$stmt->bindParam(":horasMdl", $datosModel["horasMdl"], PDO::PARAM_STR);
				$stmt->bindParam(":precioMdl", $datosModel["precioMdl"], PDO::PARAM_STR);
				$stmt->bindParam(":subTotal", $datosModel["subTotal"], PDO::PARAM_STR);
				$stmt->bindParam(":discount", $datosModel["descuento"], PDO::PARAM_STR);
				$stmt->bindParam(":totOpciones", $datosModel["totOpciones"], PDO::PARAM_STR);
				$stmt->bindParam(":TotalHoras", $datosModel["TotalHoras"], PDO::PARAM_STR);
				$stmt->bindParam(":Total", $datosModel["Total"], PDO::PARAM_STR);
				$stmt->bindParam(":ops", $datosModel["ops"], PDO::PARAM_STR);
				$stmt->bindParam(":specifications", $datosModel["specifications"], PDO::PARAM_STR);


			if($stmt->execute()){

					return "success";

				}

			else{

					return "error";

				}

			$stmt->close();

		}



	#ACTUALIZACION DE ORDENES
	#-------------------------------------
	public function actualizaOrden($datosModel, $tabla){

			$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET orderNo=:orderNo, trailerNo=:trailerNo, trailerVin=:trailerVin, dueDate=:dueDate, orderDate=:orderDate, notes=:notes, trailerHrs=:horasMdl, trailerPrice=:precioMdl, subTotal=:subTotal, discount=:discount, totHrs=:TotalHoras, totOpciones=:totOpciones, totPrice=:Total, options=:ops, trailerSpecs=:specifications WHERE orderNo = :orderNo");

				$stmt->bindParam(":orderNo", $datosModel["order"], PDO::PARAM_INT);
				$stmt->bindParam(":trailerNo", $datosModel["trailerNo"], PDO::PARAM_INT);
				$stmt->bindParam(":trailerVin", $datosModel["trailerVin"], PDO::PARAM_STR);
				$stmt->bindParam(":dueDate", $datosModel["dueDate"], PDO::PARAM_STR);
				$stmt->bindParam(":orderDate", $datosModel["orderDate"], PDO::PARAM_STR);
				$stmt->bindParam(":notes", $datosModel["notes"], PDO::PARAM_STR);
				$stmt->bindParam(":horasMdl", $datosModel["horasMdl"], PDO::PARAM_STR);
				$stmt->bindParam(":precioMdl", $datosModel["precioMdl"], PDO::PARAM_STR);
				$stmt->bindParam(":subTotal", $datosModel["subTotal"], PDO::PARAM_STR);
				$stmt->bindParam(":discount", $datosModel["descuento"], PDO::PARAM_STR);
				$stmt->bindParam(":totOpciones", $datosModel["totOpciones"], PDO::PARAM_STR);
				$stmt->bindParam(":TotalHoras", $datosModel["TotalHoras"], PDO::PARAM_STR);
				$stmt->bindParam(":Total", $datosModel["Total"], PDO::PARAM_STR);
				$stmt->bindParam(":ops", $datosModel["ops"], PDO::PARAM_STR);
				$stmt->bindParam(":specifications", $datosModel["specifications"], PDO::PARAM_STR);


			if($stmt->execute()){

					return "success";

				}

			else{

					return "error";

				}

			$stmt->close();

		}




		#GUARDA LOS CAMBIOS DE ORDENES EN UNA TABLA CAMBIOS
	#-------------------------------------
	public function actualizaCambios($datosLog, $tabla){


			$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(idCambio, orderNo, fecha, usuario, oldData, newData, notes) VALUES (NULL, :orderNo, :fecha, :usuario, :oldData, :newData, :notes)");
			
			$stmt->bindParam(":orderNo", $datosLog["orderNo"], PDO::PARAM_INT);
            $stmt->bindParam(":fecha", $datosLog["fecha"], PDO::PARAM_STR);
            $stmt->bindParam(":usuario", $datosLog["usuario"], PDO::PARAM_STR);
            $stmt->bindParam(":oldData", $datosLog["oldData"], PDO::PARAM_STR);
            $stmt->bindParam(":newData", $datosLog["newData"], PDO::PARAM_STR);
            $stmt->bindParam(":notes", $datosLog["notes"], PDO::PARAM_STR);


			if($stmt->execute()){

					return "success";

				}

			else{

					return "error";

				}

			$stmt->close();

		}




	#VISTA USUARIOS
	#-------------------------------------

	public function vistaUsuariosModel($tabla){

		$stmt = Conexion::conectar()->prepare("SELECT id, usuario, password, email FROM $tabla");
		$stmt->execute();

		#fetchAll(): Obtiene todas las filas de un conjunto de resultados asociado al objeto PDOStatement.
		return $stmt->fetchAll();

		$stmt->close();

	}


public function llenaLista($tabla){

        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY descEnglish");
		$stmt -> execute();
		return $stmt -> fetchALL();

		$stmt->close();

    }




    public function buscaPrecio($tabla, $codigo){

        $stmt = Conexion::conectar()->prepare("SELECT precio,horas,weight FROM $tabla WHERE codigo=:codigo");

        $stmt->bindParam(":codigo", $codigo, PDO::PARAM_STR);

		$stmt -> execute();

		return $stmt -> fetchALL();

		$stmt->close();

    }


    //busca si existe registrada una orden en la tabla ordenes para evitar duplicar los numeros

    public function buscaOrden($tabla, $codigo){

        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE orderNo=:codigo");

        $stmt->bindParam(":codigo", $codigo, PDO::PARAM_STR);

		$stmt -> execute();

		return $stmt -> fetch();

		$stmt->close();

    }


   //Consulta codigo, descripcion ingles-espanol horas y precio de la tabla de opciones
   public function buscaOpcion($tabla, $codigo){

        $stmt = Conexion::conectar()->prepare("SELECT codigo, descEnglish, descEspanol,horas, precio FROM $tabla WHERE codigo=:codigo");

        $stmt->bindParam(":codigo", $codigo, PDO::PARAM_STR);

        $stmt -> execute();

        return $stmt -> fetchALL();

        $stmt->close();

    }


    //Consulta codigo, descripcion ingles-espanol horas y precio de la tabla de saddles
   public function llenaSaddles($tabla){

        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY codigo");

        $stmt->bindParam(":codigo", $codigo, PDO::PARAM_STR);

        $stmt -> execute();

        return $stmt -> fetchALL();

        $stmt->close();

    }


    #VERIFICA SI UN EMPLEADO YA ESTA REGISTRADO PARA REGISTRARLO DESPUES
	#--------------------------------------------------------------------------

	public function consultaEmpleadosModel($datosModel, $tabla){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE usuario = :usuario and password = :password");

		$stmt->bindParam(":usuario", $datosModel["usuario"], PDO::PARAM_STR);
		$stmt->bindParam(":password", $datosModel["password"], PDO::PARAM_STR);

		$stmt -> execute();
		return $stmt -> fetch();

		$stmt->close();
	}


	#REGISTRO DE EMPLEADOS
	#---------------------------------------------------------------------------
	public function registroEmpleadosModel($datosModel, $tabla){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (usuario, password, nombre, email, celular, rol) VALUES (:usuario,:password,:nombre,:email, :celular, :rol)");

		$stmt->bindParam(":usuario", $datosModel["usuario"], PDO::PARAM_STR);
		$stmt->bindParam(":password", $datosModel["password"], PDO::PARAM_STR);
		$stmt->bindParam(":nombre", $datosModel["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":email", $datosModel["email"], PDO::PARAM_STR);
		$stmt->bindParam(":celular", $datosModel["celular"], PDO::PARAM_STR);
		$stmt->bindParam(":rol", $datosModel["rol"], PDO::PARAM_STR);

		if($stmt->execute()){
			return "ok";
		}

		else{
			return "error";
		}
		$stmt->close();
	}



	#VERIFICA SI UN PRODUCTO YA ESTA REGISTRADO EN LAS TABLAS DE OPCIONES, SADDLES Y VENTS PARA REGISTRARLO DESPUES
	#----------------------------------------------------------------------------------------------------------

	public function consultaProductosModel($datosModel, $tabla){
		$stmt=Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE codigo = :codigo");

		$stmt->bindParam(":codigo", $datosModel["codigo"], PDO::PARAM_STR);
		$stmt -> execute();
		return $stmt -> fetch();

		$stmt->close();


	}


	#REGISTRO DE PRODUCTOS EN LAS TABLAS OPCIONES, SADDLES Y VENTS RESPECTIVAMENTE
	#------------------------------------------------------------------------------------------------------------------
	public function registroProductosModel($datosModel, $tabla){

	$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (id, codigo, descEnglish, descEspanol, precio, horas) VALUES (NULL, :codigo, :descEnglish, :descEspanol, :precio, :horas)");

		$stmt->bindParam(":codigo", $datosModel["codigo"], PDO::PARAM_STR);
		$stmt->bindParam(":descEnglish", $datosModel["descEnglish"], PDO::PARAM_STR);
		$stmt->bindParam(":descEspanol", $datosModel["descEspanol"], PDO::PARAM_STR);
		$stmt->bindParam(":horas", $datosModel["horas"], PDO::PARAM_STR);
		$stmt->bindParam(":precio", $datosModel["precio"], PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";
		}

		else{

			return "error";

		}

		$stmt->close();

	}






	#DEVUELVE UN LISTADO DE TODOS REGISTROS DE CUALQUIER TABLA QUE RECIBA COMO PARAMETRO
	#---------------------------------------------------------------------------------------------------------

	public function listaTablaModel($tabla){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");
		$stmt -> execute();
		return $stmt -> fetchALL();

		$stmt->close();
	}

	#DEVUELVE UN LISTADO DE TODAS LAS ORDENES
	#-------------------------------------

	public function listaOrdenesModel($tabla){

		$stmt = Conexion::conectar()->prepare("SELECT orderNo, trailerNo, trailerVin, dueDate, orderDate FROM $tabla");
		$stmt -> execute();
		return $stmt -> fetchALL();

		$stmt->close();
	}


	#DEVUELVE UN LISTADO DE TODOS LOS EMPLEADOS
	#-------------------------------------

	public function listaEmpleadosModel($tabla){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");
		$stmt -> execute();
		return $stmt -> fetchALL();

		$stmt->close();
	}

	#DEVUELVE UN LISTADO DE TODOS LAS ORDENES MODIFICADAS EN EL ULTIMO MES
	#-------------------------------------

	public function ordenesCambiadasModel($tabla){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE MONTH(`fecha`) = MONTH(CURDATE()) ORDER BY fecha DESC");
		$stmt -> execute();
		return $stmt -> fetchALL();

		$stmt->close();
	}



	#BORRAR ORDEN
	#-------------------------------------
	public function borrarOrdenModel($datosModel,$tabla){
		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE orderNo = :id");
		$stmt -> bindPARAM(":id",$datosModel, PDO::PARAM_INT);
		if ($stmt->execute()){
			return "success";
		} else {
			return "error";
		}
		$stmt -> close();
	}


	#BORRAR OPCION
	#-------------------------------------------------------------------------------------
	public function borrarOpcionModel($datosModel,$tabla){
		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = :id");
		$stmt -> bindPARAM(":id",$datosModel, PDO::PARAM_INT);
		if ($stmt->execute()){
			return "success";
		} else {
			return "error";
		}
		$stmt -> close();
	}


	#BORRAR EMPLEADO
	#-------------------------------------
	public function borrarEmpleadoModel($datosModel,$tabla){
		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = :id");
		$stmt -> bindPARAM(":id",$datosModel, PDO::PARAM_INT);
		if ($stmt->execute()){
			return "success";
		} else {
			return "error";
		}
		$stmt -> close();
	}

	#BUSCA UN EMPLEADO
	#-------------------------------------

	public function buscaEmpleadoModel($usuario, $tabla){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE id = :id");

		$stmt->bindParam(":id", $usuario, PDO::PARAM_INT);

		$stmt -> execute();
		return $stmt -> fetch();

		$stmt->close();
	}


	#BUSCA UNA ORDEN EDITADA EN LA TABLA CAMBIOS
	#-------------------------------------

	public function cambioOrdenModel($orden, $tabla){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE idCambio = :orden");

		$stmt->bindParam(":orden", $orden, PDO::PARAM_INT);

		$stmt -> execute();
		return $stmt -> fetch();

		$stmt->close();
	}






	#BUSCA UN CODIGO EN LA TABLA QUE RECIBA COMO PARAMETRO
	#-------------------------------------

	public function buscaCodigoModel($usuario, $tabla){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE id = :id");

		$stmt->bindParam(":id", $usuario, PDO::PARAM_INT);

		$stmt -> execute();
		return $stmt -> fetch();

		$stmt->close();
	}


	#ACTUALIZA LOS DATOS DE UN EMPLEADO
	#-------------------------------------
	public function actualizaEmpleadoModel($datosModel, $tabla){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET usuario=:usuario, password=:password, nombre=:nombre, email=:email, celular=:celular, rol=:rol WHERE id=:id");

		$stmt->bindParam(":id", $datosModel["id"], PDO::PARAM_INT);
		$stmt->bindParam(":usuario", $datosModel["usuario"], PDO::PARAM_STR);
		$stmt->bindParam(":password", $datosModel["password"], PDO::PARAM_STR);
		$stmt->bindParam(":nombre", $datosModel["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":celular", $datosModel["celular"], PDO::PARAM_STR);
		$stmt->bindParam(":rol", $datosModel["rol"], PDO::PARAM_STR);
		$stmt->bindParam(":email", $datosModel["email"], PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";

		}

		else{

			return "error";

		}

		$stmt->close();

	}


	#ACTUALIZA OPCIONES, SADDLE Y VENTS
	#-------------------------------------
	public function actualizaOpcionesModel($datosModel, $tabla){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET descEnglish=:descEnglish, descEspanol=:descEspanol, horas=:horas, precio=:precio WHERE id=:id");

		$stmt->bindParam(":id", $datosModel["id"], PDO::PARAM_INT);
		$stmt->bindParam(":descEnglish", $datosModel["descEnglish"], PDO::PARAM_STR);
		$stmt->bindParam(":descEspanol", $datosModel["descEspanol"], PDO::PARAM_STR);
		$stmt->bindParam(":horas", $datosModel["horas"], PDO::PARAM_STR);
		$stmt->bindParam(":precio", $datosModel["precio"], PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";

		}

		else{

			return "error";

		}

		$stmt->close();

	}


}