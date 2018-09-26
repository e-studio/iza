<?php

class controller{

#DATOS PARA GRAFICA 1
    #------------------------------------
    public function grafica1Controller(){

        $respuesta = Datos::grafica1Model("orders");
        $meses = array();
        $cant = array();
        foreach ($respuesta as $row => $item){
            array_push($meses, $item["mes"]);
            array_push($cant, $item["cantidad"]);

        }

        echo '<script type="text/javascript">'
            .'Chart.defaults.global.defaultFontFamily ='."'-apple-system,system-ui,BlinkMacSystemFont,".'"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif'."';"
            ."Chart.defaults.global.defaultFontColor = '#292b2c';"
            .'var ctx = document.getElementById("myAreaChart");'
            .'var myLineChart = new Chart(ctx, {'
            ." type: 'line',"
            .'data: {'
            .' labels:'.json_encode($meses).','
            .'datasets: [{'
            .'label: "Orders",'
            .'lineTension: 0.3,'
            .'backgroundColor: "rgba(2,117,216,0.2)",'
            .'borderColor: "rgba(2,117,216,1)",'
            .'pointRadius: 5,'
            .'pointBackgroundColor: "rgba(2,117,216,1)",'
            .'pointBorderColor: "rgba(255,255,255,0.8)",'
            .'pointHoverRadius: 5,'
            .'pointHoverBackgroundColor: "rgba(2,117,216,1)",'
            .'pointHitRadius: 20,'
            .'pointBorderWidth: 2,'
            .'data:'. json_encode($cant,JSON_NUMERIC_CHECK).','
            .'}],'
            .'},'
            .'options: {'
            .'legend: {'
            .'display: false'
            .'}'
            .'}'
            .'});'
            .'</script>';
    }

    #DATOS PARA GRAFICA 2
    #------------------------------------
    public function grafica2Controller(){

        $respuesta = Datos::grafica2Model("orders");
        $meses = array();
        $cant = array();
        foreach ($respuesta as $row => $item){
            array_push($meses, $item["mes"]);
            $num = number_format($item["total"], 2, '.', '');
            array_push($cant, $num);

        }

        echo '<script type="text/javascript">'
            .'var ctx = document.getElementById("myBarChart");'
            .'var myLineChart = new Chart(ctx, {'
            ." type: 'bar',"
            .'data: {'
            .' labels:'.json_encode($meses).','
            .'datasets: [{'
            .'label: "$",'
            .'lineTension: 0.3,'
            .'backgroundColor: "rgba(2,117,216,0.2)",'
            .'borderColor: "rgba(2,117,216,1)",'
            .'pointRadius: 5,'
            .'pointBackgroundColor: "rgba(2,117,216,1)",'
            .'pointBorderColor: "rgba(255,255,255,0.8)",'
            .'pointHoverRadius: 5,'
            .'pointHoverBackgroundColor: "rgba(2,117,216,1)",'
            .'pointHitRadius: 20,'
            .'pointBorderWidth: 2,'
            .'data:'. json_encode($cant,JSON_NUMERIC_CHECK).','
            .'}],'
            .'},'
            .'options: {'
            .'legend: {'
            .'display: false'
            .'}'
            .'}'
            .'});'
            .'</script>';
    }





    /*=============================================
    MOSTRAR ORDENES PARA IMPRESION
    =============================================*/

    static public function ctrMostrarVentas($codigo){

        $tabla = "orders";

        $respuesta = Datos::mdlMostrarVentas($tabla, $codigo);

        return $respuesta;

    }




	#REGISTRO DE USUARIOS
	#------------------------------------
	public function registroUsuarioController(){

		if(isset($_POST["usuario"])){

			$datosController = array( "nombre"=>$_POST["nombre"],
									  "usuario"=>$_POST["usuario"],
								      "password"=>$_POST["password"],
								      "email"=>$_POST["email"],
								      "sistema"=>$_POST["sistema"],
								      "rol"=>$_POST["rol"],
								      "activo"=>$_POST["activo"]);

			$respuesta = Datos::registroUsuarioModel($datosController, "usuarios");

			echo $respuesta;

			if($respuesta == "success"){

				
			}

			else{

				
			}

		}

	}



	#VISTA DE USUARIOS
	#------------------------------------

	public function vistaUsuariosController(){

		$respuesta = Datos::vistaUsuariosModel("usuarios");

		foreach($respuesta as $row => $item){
		echo'<tr>
				<td>'.$item["usuario"].'</td>
				<td>'.$item["password"].'</td>
				<td>'.$item["email"].'</td>
				<td><a href="index.php?action=editar&id='.$item["id"].'"><button>Editar</button></a></td>
				<td><a href="index.php?action=usuarios&idBorrar='.$item["id"].'"><button>Borrar</button></a></td>
			</tr>';

		}

	}



// BUSCA EL NUMERO DE ORDEN EN LA TABLA ORDERS PARA EVITAR DUPLICIDAD
    public function buscaOrden($tabla, $codigo){

        $res = Datos::buscaOrden($tabla, $codigo);

        if ($res==""){
            echo "no se encontro nada";
        }
        else {
            echo "si se encontro";
        }

    }

// BUSCA EL PRECIO Y HORAS DE UN PRODUCTO EN LA TABLA TRAILERS
    public function buscaPrecio($tabla, $codigo){

        $res = Datos::buscaPrecio($tabla, $codigo);

        foreach ($res as $row => $val) {

            echo $val['precio'];
            echo " || ";
            echo $val['horas'];
            echo " || ";
            echo $val['weight'];

        }

    }

    // BUSCA DATOS DE LAS OPCIONES (codigo,descriocion ingles-espanol, horas y precio)
    public function buscaOpcion($tabla, $codigo){

        $res = Datos::buscaOpcion($tabla, $codigo);

        foreach ($res as $row => $val) {

            echo $val['codigo'];
            echo " || ";
            echo $val['descEnglish'];
            echo " || ";
            echo $val['descEspanol'];
            echo " || ";
            echo $val['horas'];
            echo " || ";
            echo $val['precio'];
        }

    }


    // BUSCA DATOS DE LAS OPCIONES (codigo,descriocion espanol, horas y precio)
    public function buscaOpcion2($tabla, $codigo){

        $res = Datos::buscaOpcion($tabla, $codigo);

        foreach ($res as $row => $val) {

            echo $val['codigo'];
            echo " || ";
            echo $val['descEspanol'];
            echo " || ";
            echo $val['horas'];
            echo " || ";
            echo $val['precio'];
        }

    }


    public function llenaModelos(){

        $respuesta = Datos::llenaLista("trailers");

        foreach ($respuesta as $row => $valor) {
            echo '<option value="'.$valor["codigo"].'">'.$valor["codigo"].'</option>';
        }

    }
	public function llenaOpciones(){

        $respuesta = Datos::llenaLista("opciones");

			  echo '<option value="">Trailer Options</option>';

        foreach ($respuesta as $row => $valor) {
            echo '<option value="'.$valor["codigo"].'">'.$valor["descEnglish"].'</option>';
        }

    }


    public function llenaSaddles(){

        $respuesta = Datos::llenaSaddles("saddles");

        foreach ($respuesta as $row => $valor) {
            echo '<option value="'.$valor["codigo"].'">'.$valor["descEnglish"].'</option>';
        }

    }

    public function llenaVents(){

        $respuesta = Datos::llenaLista("vents");

			  echo '<option value="">Seleccione:</option>';

        foreach ($respuesta as $row => $valor) {
            echo '<option value="'.$valor["codigo"].'">'.$valor["codigo"].'</option>';
        }

    }

    public function llenaLonas(){

        $respuesta = Datos::llenaLista("lonas");

        foreach ($respuesta as $row => $valor) {
            echo '<option value="'.$valor["codigo"].'">'.$valor["lnTrailerSize"].'</option>';
        }
    }


    # REGISTRO DE EMPLEADOS
    #------------------------------------

    public function registroEmpleadosController(){

        if(isset($_POST["usuario"])){

            $datosController = array( "usuario"=>$_POST["usuario"],
                                      "password"=>$_POST["password"],
                                      "nombre"=>$_POST["nombre"],
                                      "celular"=>$_POST["celular"],
                                      "rol"=>$_POST["rol"],
                                      "email"=>$_POST["email"]);

            $respuesta = Datos::consultaEmpleadosModel($datosController, "usuarios");

            if ($respuesta["usuario"]==""){
                $respuesta = Datos::registroEmpleadosModel($datosController, "usuarios");

                if ($respuesta=="ok"){
                    echo '<div class="alert alert-success">';
                    echo 'Empleado Registrado Exitosamente!.';
                    echo '</div>';
                }
                else {
                    echo "error al insertar";
                }
            }
            else{

                    echo '<div class="alert alert-danger">';
                    echo "<strong>Error!</strong> esos datos ya estan registrados.";
                    echo "</div>";
                }

        }

    }


    # REGISTRO DE OPCIONES, SADDLES Y VENTS
    #---------------------------------------------------------------------------------------

    public function registroProductosController(){

        if(isset($_POST["codigo"])){

            $datosController = array( "codigo"=>$_POST["codigo"],
                                      "descEnglish"=>$_POST["descEnglish"],
                                      "descEspanol"=>$_POST["descEspanol"],
                                      "horas"=>$_POST["horas"],
                                      "tabla"=>$_POST['tabla'],
                                      "precio"=>$_POST["precio"]);
            //echo $datosController['codigo'].' - '. $datosController['tabla'].'<br>';

            $respuesta = Datos::consultaProductosModel($datosController, $_POST['tabla']);

                if ($respuesta['codigo'] == ""){

                    $inserta = Datos::registroProductosModel($datosController, $_POST['tabla']);

                    if ($inserta=="ok"){
                        echo '<div class="alert alert-success">';
                        echo 'Code saved succesfully!.';
                        echo '</div>';
                    }
                    else{
                        echo '<div class="alert alert-danger">';
                        echo "<strong>Error!</strong> al insertar.";
                        echo "</div>";

                    }
                }
                else{
                    echo '<div class="alert alert-danger">';
                    echo "<strong>Error!</strong> code already exists.";
                    echo "</div>";
                }

        }

    }


    #LISTADO DE TODAS LAS ORDENES
    #------------------------------------
    public function listaOrdenesController(){

        $respuesta = Datos::listaOrdenesModel("orders");

        foreach ($respuesta as $row => $item){
        echo'<tr>
                <td>'.$item["orderNo"].'</td>
                <td>'.$item["trailerNo"].'</td>
                <td>'.$item["trailerVin"].'</td>
                <td>'.$item["orderDate"].'</td>
                <td>'.$item["dueDate"].'</td>
                <td>
                    <button class="btn btn-info btnImprimirOrden" codigoOrden = "'.$item["orderNo"].'"><i class="fa fa-print"></i></buttn>
                    <a href="index.php?action=editOrder&idEditar='.$item["orderNo"].'"><button class="btn btn-warning">Edit</button></a>
                    <a href="index.php?action=ordenes&idBorrar='.$item["orderNo"].'" onclick="return Confirmation()"><button class="btn btn-danger">Delete</button></a>
                </td>
            </tr>';
        }

    }

    #LISTADO DE TODAS LAS OPCIONES PARA TRAILERS
    #------------------------------------
    public function listaOpcionesController($tabla){

        switch ($tabla) {
            case 'vents':
                $tablaLink = 'Vents';
                break;
            case 'opciones':
                $tablaLink = 'Opciones';
                break;
            case 'saddles':
                $tablaLink = 'Saddles' ;
                break;
        }

        $respuesta = Datos::listaTablaModel($tabla);

        foreach ($respuesta as $row => $item){
        echo'<tr>
                <td>'.$item["codigo"].'</td>
                <td>'.$item["descEnglish"].'</td>
                <td>'.$item["descEspanol"].'</td>
                <td>'.$item["horas"].'</td>
                <td>'.$item["precio"].'</td>
                <td class="ancho150"><a href="index.php?action=editOpciones&idEditar='.$item["id"].'&a='.$tabla.'"><button class="btn btn-warning">Edit</button></a>
                    <a href="index.php?action='.$tabla.'&idBorrar='.$item["id"].'" onclick="return Confirmation()"><button class="btn btn-danger">Delete</button></a>
                </td>
            </tr>';
        }

    }

    #LISTADO DE TODOS LOS EMPLEADOS
    #------------------------------------
    public function listaEmpleadosController(){

        $respuesta = Datos::listaEmpleadosModel("usuarios");

        foreach ($respuesta as $row => $item){
        echo'<tr>
                <td>'.$item["nombre"].'</td>
                <td>'.$item["usuario"].'</td>
                <td>'.$item["password"].'</td>
                <td>'.$item["email"].'</td>
                <td>'.$item["celular"].'</td>
                <td>
                    <a href="index.php?action=editEmpleados&idEditar='.$item["id"].'"><button class="btn btn-warning">Edit</button></a>
                </td>
                <td>
                    <a href="index.php?action=empleados&idBorrar='.$item["id"].'" onclick="return Confirmation()"><button class="btn btn-danger">Delete</button></a>
                </td>
            </tr>';
        }

    }



    #BORRAR ORDEN
    #------------------------------------
    public function borrarOrdenController(){
        if (isset($_GET['idBorrar'])){
            $datosController = $_GET['idBorrar'];
            $respuesta = Datos::borrarOrdenModel($datosController,"orders");
            if ($respuesta == "success"){
                echo "<script type='text/javascript'>window.location.href='index.php?action=ordenes'</script>";
            }
        }
    }

    #BORRAR OPCION
    #-------------------------------------------------------------------------------------------------------------------
    public function borrarOpcionController($tabla){
        if (isset($_GET['idBorrar'])){
            $datosController = $_GET['idBorrar'];
            echo $_GET['idBorrar'];
            $respuesta = Datos::borrarOpcionModel($datosController,$tabla);
            if ($respuesta == "success"){
                echo "<script type='text/javascript'>window.location.href='index.php?action=opciones</script>";
            }
        }
    }



    #BORRAR EMPLEADO
    #------------------------------------
    public function borrarEmpleadoController(){
        if (isset($_GET['idBorrar'])){
            $datosController = $_GET['idBorrar'];
            $respuesta = Datos::borrarEmpleadoModel($datosController,"usuarios");
            if ($respuesta == "success"){
                echo "<script type='text/javascript'>window.location.href='index.php?action=empleados'</script>";
            }
        }
    }


    # ACTUALIZA EMPLEADOS
    #------------------------------------

    public function actualizaEmpleadoController(){

        if(isset($_POST["usuario"])){

            $datosController = array("id"=>$_POST["id"],
                                  "usuario"=>$_POST["usuario"],
                                  "password"=>$_POST["password"],
                                  "nombre"=>$_POST["nombre"],
                                  "rol"=>$_POST["rol"],
                                  "celular"=>$_POST["celular"],
                                  "email"=>$_POST["email"]);

            $respuesta = Datos::actualizaEmpleadoModel($datosController, "usuarios");

            if ($respuesta=="ok"){

                $mensaje = "Actualizacion correcta";
                echo "<script type='text/javascript'>alert('$mensaje'); window.location.href='index.php?action=empleados'</script>";
            }
            else{

                echo '<div class="alert alert-danger">';
                    echo "<strong>Error!</strong> esos datos ya estan registrados.";
                echo "</div>";
            }

        }

    }

    # ACTUALIZA CAMBIOS DE OPCIONES, SADDLES Y VENTS
    #------------------------------------

    public function actualizaOpcionesController($tabla){

        if(isset($_POST["id"])){

            $datosController = array("id"=>$_POST["id"],
                                  "codigo"=>$_POST["codigo"],
                                  "descEnglish"=>$_POST["descEnglish"],
                                  "descEspanol"=>$_POST["descEspanol"],
                                  "horas"=>$_POST["horas"],
                                  "precio"=>$_POST["precio"]);

            $respuesta = Datos::actualizaOpcionesModel($datosController, $tabla);

            if ($respuesta=="ok"){

                $mensaje = "Actualizacion correcta";
                echo "<script type='text/javascript'>alert('$mensaje'); window.location.href='index.php?action=".$tabla."'</script>";
            }
            else{

                echo '<div class="alert alert-danger">';
                    echo "<strong>Error!</strong> al actualizar.";
                echo "</div>";
            }

        }

    }


#REGISTRO DE ORDENES DE TRAILERS
    #------------------------------------
    public function registroOrdenes(){

        if(isset($_POST["envia"])){

            // ------------------------------------   OPTIONS --------------------------------------------------
            $specs = new stdClass();
            $std = new stdClass();
            $std-> codigo1 = $_POST["codigo1"];
            $std-> descEnglish1 = $_POST["descEnglish1"];
            $std-> descEspanol1 = $_POST["descEspanol1"];
            $std-> horas1 = $_POST["horas1"];
            $std-> precio1 = $_POST["precio1"];
            $std-> codigo2 = $_POST["codigo2"];
            $std-> descEnglish2 = $_POST["descEnglish2"];
            $std-> descEspanol2 = $_POST["descEspanol2"];
            $std-> horas2 = $_POST["horas2"];
            $std-> precio2 = $_POST["precio2"];
            $std-> codigo3 = $_POST["codigo3"];
            $std-> descEnglish3 = $_POST["descEnglish3"];
            $std-> descEspanol3 = $_POST["descEspanol3"];
            $std-> horas3 = $_POST["horas3"];
            $std-> precio3 = $_POST["precio3"];
            $std-> codigo4 = $_POST["codigo4"];
            $std-> descEnglish4 = $_POST["descEnglish4"];
            $std-> descEspanol4 = $_POST["descEspanol4"];
            $std-> horas4 = $_POST["horas4"];
            $std-> precio4 = $_POST["precio4"];
            $std-> codigo5 = $_POST["codigo5"];
            $std-> descEnglish5 = $_POST["descEnglish5"];
            $std-> descEspanol5 = $_POST["descEspanol5"];
            $std-> horas5 = $_POST["horas5"];
            $std-> precio5 = $_POST["precio5"];
            $std-> codigo6 = $_POST["codigo6"];
            $std-> descEnglish6 = $_POST["descEnglish6"];
            $std-> descEspanol6 = $_POST["descEspanol6"];
            $std-> horas6 = $_POST["horas6"];
            $std-> precio6 = $_POST["precio6"];
            $std-> codigo7 = $_POST["codigo7"];
            $std-> descEnglish7 = $_POST["descEnglish7"];
            $std-> descEspanol7 = $_POST["descEspanol7"];
            $std-> horas7 = $_POST["horas7"];
            $std-> precio7 = $_POST["precio7"];
            $std-> codigo8 = $_POST["codigo8"];
            $std-> descEnglish8 = $_POST["descEnglish8"];
            $std-> descEspanol8 = $_POST["descEspanol8"];
            $std-> horas8 = $_POST["horas8"];
            $std-> precio8 = $_POST["precio8"];
            $std-> codigo9 = $_POST["codigo9"];
            $std-> descEnglish9 = $_POST["descEnglish9"];
            $std-> descEspanol9 = $_POST["descEspanol9"];
            $std-> horas9 = $_POST["horas9"];
            $std-> precio9 = $_POST["precio9"];
            $std-> codigo10 = $_POST["codigo10"];
            $std-> descEnglish10 = $_POST["descEnglish10"];
            $std-> descEspanol10 = $_POST["descEspanol10"];
            $std-> horas10 = $_POST["horas10"];
            $std-> precio10 = $_POST["precio10"];
            $std-> codigo11 = $_POST["codigo11"];
            $std-> descEnglish11 = $_POST["descEnglish11"];
            $std-> descEspanol11 = $_POST["descEspanol11"];
            $std-> horas11 = $_POST["horas11"];
            $std-> precio11 = $_POST["precio11"];
            $std-> codigo12 = $_POST["codigo12"];
            $std-> descEnglish12 = $_POST["descEnglish12"];
            $std-> descEspanol12 = $_POST["descEspanol12"];
            $std-> horas12 = $_POST["horas12"];
            $std-> precio12 = $_POST["precio12"];
            $std-> codigo13 = $_POST["codigo13"];
            $std-> descEnglish13 = $_POST["descEnglish13"];
            $std-> descEspanol13 = $_POST["descEspanol13"];
            $std-> horas13 = $_POST["horas13"];
            $std-> precio13 = $_POST["precio13"];
            $std-> codigo14 = $_POST["codigo14"];
            $std-> descEnglish14 = $_POST["descEnglish14"];
            $std-> descEspanol14 = $_POST["descEspanol14"];
            $std-> horas14 = $_POST["horas14"];
            $std-> precio14 = $_POST["precio14"];
            $std-> codigo15 = $_POST["codigo15"];
            $std-> descEnglish15 = $_POST["descEnglish15"];
            $std-> descEspanol15 = $_POST["descEspanol15"];
            $std-> horas15 = $_POST["horas15"];
            $std-> precio15 = $_POST["precio15"];
            $std-> codigo16 = $_POST["codigo16"];
            $std-> descEnglish16 = $_POST["descEnglish16"];
            $std-> descEspanol16 = $_POST["descEspanol16"];
            $std-> horas16 = $_POST["horas16"];
            $std-> precio16 = $_POST["precio16"];
            $ops = json_encode($std);
            //echo $ops;


            // ------------------------------------   ESPECS --------------------------------------------------
            $specs = new stdClass();
             $specs -> Modelos = $_POST["Modelos"];
             $specs -> tLength = $_POST["tLength"];
             $specs -> tWidth = $_POST["tWidth"];
             $specs -> tAxles = $_POST["tAxles"];
             $specs -> tSides = $_POST["tSides"];
             $specs -> tTop = $_POST["tTop"];
             $specs -> tRearGate = $_POST["tRearGate"];
             $specs -> tCompartments = $_POST["tCompartments"];
             $specs -> tEscapeGate = $_POST["tEscapeGate"];
             $specs -> horasMdl = $_POST["horasMdl"];
             $specs -> precioMdl = $_POST["precioMdl"];
             $specs -> tToolBox = $_POST["tToolBox"];
             $specs -> tSaddleRack = $_POST["tSaddleRack"];
             $specs -> tBlanketBars = $_POST["tBlanketBars"];
             $specs -> tFloorType = $_POST["tFloorType"];
             $specs -> tFloorSpacing = $_POST["tFloorSpacing"];
             $specs -> tRollers = $_POST["tRollers"];
             $specs -> tHinch = $_POST["tHinch"];
             $specs -> tHSLength = $_POST["tHSLength"];
             $specs -> tMatting = $_POST["tMatting"];
             $specs -> tCalf = $_POST["tCalf"];
             $specs -> tRod = $_POST["tRod"];
             $specs -> tVents = $_POST["tVents"];
             $specs -> tRhino = $_POST["tRhino"];
             $specs -> tSideRails  = $_POST["tSideRails"];
             $specs -> tSaddleBox = $_POST["tSaddleBox"];
             $specs -> tTires = $_POST["tTires"];
             $specs -> tExtraTire = $_POST["tExtraTire"];
             $specs -> tColor = $_POST["tColor"];
             $specs -> tFrontPlug = $_POST["tFrontPlug"];
             $specs -> tRearPlug = $_POST["tRearPlug"];
             $specs -> tTireCover = $_POST["tTireCover"];
             $specs -> tTarp = $_POST["tTarp"];
             $specs -> totWeight = $_POST["totWeight"];
             $specs -> floorFt = $_POST["floorFt"];

             $specifications = json_encode($specs);
            //echo $specifications;



            $datosController = array("order"=> $_POST["tbd"],
                                    "trailerNo" => $_POST["trailerNo"],
                                    "trailerVin" => $_POST["trailerVin"],
                                    "dueDate" => $_POST["dueDate"],
                                    "orderDate" => date('Y-m-d H:i:s'),
                                    "notes" => $_POST["notes"],
                                    "subTotal" => $_POST["subTotal"],
                                    "descuento" => $_POST["descuento"],
                                    "TotalHoras" => $_POST["TotalHoras"],
                                    "Total" => $_POST["Total"],
                                    "ops" => $ops,
                                    "totOpciones" => $_POST["TotalOpciones"],
                                    "specifications" => $specifications);

            $respuesta = Datos::registroOrden($datosController, "orders");

            if ($respuesta=="success"){

                $mensaje = "Order Registered";
                echo '<script type="text/javascript">alert("'.$mensaje.'"); window.open("extensions/tcpdf/pdf/orden.php?codigo='.$_POST["tbd"].'", "Imprimir Orden","toolbar=no,location=0,directories=no, status=0,menubar=0,scrollbars=0,resizable=0,width=1024,height=800,top=0,left=0" )</script>';
            }

        } // if

    }



#ACTUALIZACION DE ORDENES DE TRAILERS
    #------------------------------------
    public function actualizaOrdenes(){

        if(isset($_POST["actualiza"])){

            // ------------------------------------   OPTIONS --------------------------------------------------
            $specs = new stdClass();
            $std = new stdClass();
            $std-> codigo1 = $_POST["codigo1"];
            $std-> descEnglish1 = $_POST["descEnglish1"];
            $std-> descEspanol1 = $_POST["descEspanol1"];
            $std-> horas1 = $_POST["horas1"];
            $std-> precio1 = $_POST["precio1"];
            $std-> codigo2 = $_POST["codigo2"];
            $std-> descEnglish2 = $_POST["descEnglish2"];
            $std-> descEspanol2 = $_POST["descEspanol2"];
            $std-> horas2 = $_POST["horas2"];
            $std-> precio2 = $_POST["precio2"];
            $std-> codigo3 = $_POST["codigo3"];
            $std-> descEnglish3 = $_POST["descEnglish3"];
            $std-> descEspanol3 = $_POST["descEspanol3"];
            $std-> horas3 = $_POST["horas3"];
            $std-> precio3 = $_POST["precio3"];
            $std-> codigo4 = $_POST["codigo4"];
            $std-> descEnglish4 = $_POST["descEnglish4"];
            $std-> descEspanol4 = $_POST["descEspanol4"];
            $std-> horas4 = $_POST["horas4"];
            $std-> precio4 = $_POST["precio4"];
            $std-> codigo5 = $_POST["codigo5"];
            $std-> descEnglish5 = $_POST["descEnglish5"];
            $std-> descEspanol5 = $_POST["descEspanol5"];
            $std-> horas5 = $_POST["horas5"];
            $std-> precio5 = $_POST["precio5"];
            $std-> codigo6 = $_POST["codigo6"];
            $std-> descEnglish6 = $_POST["descEnglish6"];
            $std-> descEspanol6 = $_POST["descEspanol6"];
            $std-> horas6 = $_POST["horas6"];
            $std-> precio6 = $_POST["precio6"];
            $std-> codigo7 = $_POST["codigo7"];
            $std-> descEnglish7 = $_POST["descEnglish7"];
            $std-> descEspanol7 = $_POST["descEspanol7"];
            $std-> horas7 = $_POST["horas7"];
            $std-> precio7 = $_POST["precio7"];
            $std-> codigo8 = $_POST["codigo8"];
            $std-> descEnglish8 = $_POST["descEnglish8"];
            $std-> descEspanol8 = $_POST["descEspanol8"];
            $std-> horas8 = $_POST["horas8"];
            $std-> precio8 = $_POST["precio8"];
            $std-> codigo9 = $_POST["codigo9"];
            $std-> descEnglish9 = $_POST["descEnglish9"];
            $std-> descEspanol9 = $_POST["descEspanol9"];
            $std-> horas9 = $_POST["horas9"];
            $std-> precio9 = $_POST["precio9"];
            $std-> codigo10 = $_POST["codigo10"];
            $std-> descEnglish10 = $_POST["descEnglish10"];
            $std-> descEspanol10 = $_POST["descEspanol10"];
            $std-> horas10 = $_POST["horas10"];
            $std-> precio10 = $_POST["precio10"];
            $std-> codigo11 = $_POST["codigo11"];
            $std-> descEnglish11 = $_POST["descEnglish11"];
            $std-> descEspanol11 = $_POST["descEspanol11"];
            $std-> horas11 = $_POST["horas11"];
            $std-> precio11 = $_POST["precio11"];
            $std-> codigo12 = $_POST["codigo12"];
            $std-> descEnglish12 = $_POST["descEnglish12"];
            $std-> descEspanol12 = $_POST["descEspanol12"];
            $std-> horas12 = $_POST["horas12"];
            $std-> precio12 = $_POST["precio12"];
            $std-> codigo13 = $_POST["codigo13"];
            $std-> descEnglish13 = $_POST["descEnglish13"];
            $std-> descEspanol13 = $_POST["descEspanol13"];
            $std-> horas13 = $_POST["horas13"];
            $std-> precio13 = $_POST["precio13"];
            $std-> codigo14 = $_POST["codigo14"];
            $std-> descEnglish14 = $_POST["descEnglish14"];
            $std-> descEspanol14 = $_POST["descEspanol14"];
            $std-> horas14 = $_POST["horas14"];
            $std-> precio14 = $_POST["precio14"];
            $std-> codigo15 = $_POST["codigo15"];
            $std-> descEnglish15 = $_POST["descEnglish15"];
            $std-> descEspanol15 = $_POST["descEspanol15"];
            $std-> horas15 = $_POST["horas15"];
            $std-> precio15 = $_POST["precio15"];
            $std-> codigo16 = $_POST["codigo16"];
            $std-> descEnglish16 = $_POST["descEnglish16"];
            $std-> descEspanol16 = $_POST["descEspanol16"];
            $std-> horas16 = $_POST["horas16"];
            $std-> precio16 = $_POST["precio16"];
            $ops = json_encode($std);
            //echo $ops;


            // ------------------------------------   ESPECS --------------------------------------------------
            $specs = new stdClass();
             $specs -> Modelos = $_POST["Modelos"];
             $specs -> tLength = $_POST["tLength"];
             $specs -> tWidth = $_POST["tWidth"];
             $specs -> tAxles = $_POST["tAxles"];
             $specs -> tSides = $_POST["tSides"];
             $specs -> tTop = $_POST["tTop"];
             $specs -> tRearGate = $_POST["tRearGate"];
             $specs -> tCompartments = $_POST["tCompartments"];
             $specs -> tEscapeGate = $_POST["tEscapeGate"];
             $specs -> horasMdl = $_POST["horasMdl"];
             $specs -> precioMdl = $_POST["precioMdl"];
             $specs -> tToolBox = $_POST["tToolBox"];
             $specs -> tSaddleRack = $_POST["tSaddleRack"];
             $specs -> tBlanketBars = $_POST["tBlanketBars"];
             $specs -> tFloorType = $_POST["tFloorType"];
             $specs -> tFloorSpacing = $_POST["tFloorSpacing"];
             $specs -> tRollers = $_POST["tRollers"];
             $specs -> tHinch = $_POST["tHinch"];
             $specs -> tHSLength = $_POST["tHSLength"];
             $specs -> tMatting = $_POST["tMatting"];
             $specs -> tCalf = $_POST["tCalf"];
             $specs -> tRod = $_POST["tRod"];
             $specs -> tVents = $_POST["tVents"];
             $specs -> tRhino = $_POST["tRhino"];
             $specs -> tSideRails  = $_POST["tSideRails"];
             $specs -> tSaddleBox = $_POST["tSaddleBox"];
             $specs -> tTires = $_POST["tTires"];
             $specs -> tExtraTire = $_POST["tExtraTire"];
             $specs -> tColor = $_POST["tColor"];
             $specs -> tFrontPlug = $_POST["tFrontPlug"];
             $specs -> tRearPlug = $_POST["tRearPlug"];
             $specs -> tTireCover = $_POST["tTireCover"];
             $specs -> tTarp = $_POST["tTarp"];
             $specs -> totWeight = $_POST["totWeight"];
             $specs -> floorFt = $_POST["floorFt"];

             $specifications = json_encode($specs);
            //echo $specifications;



            $datosController = array("order"=> $_POST["tbd"],
                                    "trailerNo" => $_POST["trailerNo"],
                                    "trailerVin" => $_POST["trailerVin"],
                                    "dueDate" => $_POST["dueDate"],
                                    "orderDate" => date('Y-m-d H:i:s'),
                                    "notes" => $_POST["notes"],
                                    "subTotal" => $_POST["subTotal"],
                                    "descuento" => $_POST["descuento"],
                                    "TotalHoras" => $_POST["TotalHoras"],
                                    "Total" => $_POST["Total"],
                                    "ops" => $ops,
                                    "totOpciones" => $_POST["TotalOpciones"],
                                    "specifications" => $specifications);

            $respuesta = Datos::actualizaOrden($datosController, "orders");

            if ($respuesta=="success"){

                $mensaje = "Order Updated";
                echo "<script type='text/javascript'>alert('$mensaje'); window.location.href='index.php?action=ordenes'</script>";
            }

        } // if

    }


} // class controller
