<?php
/*
use PHPMailer\PHPMailer\PHPMailer;
require 'extensions/phpmailer/src/PHPMailer.php';
require 'extensions/phpmailer/src/SMTP.php';
*/

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
            .'backgroundColor: "rgba(2,117,216,1)",'
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
            echo "no";
        }
        else {
            echo "si";
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
    public function listaOrdenesController($nivel){

        $respuesta = Datos::listaOrdenesModel("orders");

       

        foreach ($respuesta as $row => $item){
        
        if ($item["inventory"]==="1") {
            $inv = "Yes";
        }
        else{
           $inv = "";  
        }
        
        echo'<tr>
                <td>'.$item["orderNo"].'</td>
                <td>'.$item["author"].'</td>
                <td>'.$item["trailerVin"].'</td>
                <td>'.$item["orderDate"].'</td>
                <td>'.$item["dueDate"].'</td>
                <td>'.$inv.'</td>';
                if ($nivel == 0 || $nivel == 1){
                echo '<td>
                    <button class="btn btn-info btnImprimirOrdenP" codigoOrden = "'.$item["orderNo"].'"><i class="fa fa-usd"></i></button>
                    <button class="btn btn-info btnImprimirOrden" codigoOrden = "'.$item["orderNo"].'"><i class="fa fa-print"></i></button>
                    <a href="index.php?action=editOrder&idEditar='.$item["orderNo"].'"><button class="btn btn-warning">Edit</button></a>

                    
                    <button class="btn btn-danger" btnCerrar data-toggle="modal" data-target="#closeModal" data-cerrar="'.$item["orderNo"].'"><i class="fa fa-lock"></i></button>
                    <a href="index.php?action=ordenes&idCerrar='.$item["orderNo"].'"><button id="'.$item["orderNo"].'" name="'.$item["orderNo"].'" hidden >C</button></a>

                </td>';

                    // --------------------------    Codigo para boton Eliminar orden ----------------------------------------------------------------------------
                    //<button class="btn btn-danger btnBorrar" data-toggle="modal" data-target="#deleteModal" data-borrar="'.$item["orderNo"].'">Delete</button>
                    //<a href="index.php?action=ordenes&idBorrar='.$item["orderNo"].'"><button id="'.$item["orderNo"].'" name="'.$item["orderNo"].'" hidden>X</button></a>
                }
                elseif($nivel == 2) {
                 echo '<td>
                    <button class="btn btn-info btnImprimirOrden" codigoOrden = "'.$item["orderNo"].'"><i class="fa fa-print"></i></button>
                   </td>';   
                }
                elseif ($nivel == 3) {
                 echo '<td>
                    <button class="btn btn-info btnImprimirOrdenP" codigoOrden = "'.$item["orderNo"].'"><i class="fa fa-print"></i></button>
                   </td>';   
                }
            echo '</tr>';
        }

    }


     #LISTADO DE ORDENES CERRADAS
    #------------------------------------
    public function ordenesCerradasController($nivel){

        $respuesta = Datos::ordenesCerradasModel("orders");

       

        foreach ($respuesta as $row => $item){
        
        if ($item["inventory"]==="1") {
            $inv = "Yes";
        }
        else{
           $inv = "";  
        }
        
        echo'<tr>
                <td>'.$item["orderNo"].'</td>
                <td>'.$item["author"].'</td>
                <td>'.$item["trailerVin"].'</td>
                <td>'.$item["orderDate"].'</td>
                <td>'.$item["dueDate"].'</td>
                <td>'.$inv.'</td>';
                if ($nivel == 0 || $nivel == 1){
                echo '<td>
                    <button class="btn btn-info btnImprimirOrdenP" codigoOrden = "'.$item["orderNo"].'"><i class="fa fa-usd"></i></button>
                    <button class="btn btn-info btnImprimirOrden" codigoOrden = "'.$item["orderNo"].'"><i class="fa fa-print"></i></button>
                    

                    
                    <button class="btn btn-success" btnCerrar data-toggle="modal" data-target="#openModal" data-abrir="'.$item["orderNo"].'"><i class="fa fa-unlock"></i></button>
                    <a href="index.php?action=closedOrders&idOpen='.$item["orderNo"].'"><button id="'.$item["orderNo"].'" name="'.$item["orderNo"].'" hidden >O</button></a>

                </td>';

                    // --------------------------    Codigo para boton Eliminar orden ----------------------------------------------------------------------------
                    //<button class="btn btn-danger btnBorrar" data-toggle="modal" data-target="#deleteModal" data-borrar="'.$item["orderNo"].'">Delete</button>
                    //<a href="index.php?action=ordenes&idBorrar='.$item["orderNo"].'"><button id="'.$item["orderNo"].'" name="'.$item["orderNo"].'" hidden>X</button></a>
                    // --------------------------    Codigo para boton Editar orden ----------------------------------------------------------------------------
                    //<a href="index.php?action=editOrder&idEditar='.$item["orderNo"].'"><button class="btn btn-warning">Edit</button></a>
                }
                elseif($nivel == 2) {
                 echo '<td>
                    <button class="btn btn-info btnImprimirOrden" codigoOrden = "'.$item["orderNo"].'"><i class="fa fa-print"></i></button>
                   </td>';   
                }
                elseif ($nivel == 3) {
                 echo '<td>
                    <button class="btn btn-info btnImprimirOrdenP" codigoOrden = "'.$item["orderNo"].'"><i class="fa fa-print"></i></button>
                   </td>';   
                }
            echo '</tr>';
        }

    }




     #BORRAR ORDEN
    #------------------------------------
    public function borrarOrdenController(){
        if (isset($_GET['idBorrar'])){
            $datosController = $_GET['idBorrar'];

            $respuesta = Datos::borrarOrdenModel($datosController,"orders");
            if ($respuesta == "success"){
               

            echo '<script type="text/javascript">swal({
                      title: "Order deleted",
                      type: "error",

                      showCancelButton: false
                    })
                    .then((value) => {
                      if (value) {
                        window.location.href = "index.php?action=ordenes";
                      } 
                    });</script> ';
            }
        }
    }


 #CERRAR ORDEN
    #------------------------------------
    public function cerrarOrdenController(){
        if (isset($_GET['idCerrar'])){
            $datosController = $_GET['idCerrar'];

            $respuesta = Datos::cerrarOrdenModel($datosController,"orders");
            if ($respuesta == "success"){
               

            echo '<script type="text/javascript">swal({
                      title: "Order closed",
                      type: "info",

                      showCancelButton: false
                    })
                    .then((value) => {
                      if (value) {
                        window.location.href = "index.php?action=ordenes";
                      } 
                    });</script> ';
            }
        }
    }

#ABRIR ORDEN
    #------------------------------------
    public function openOrderController(){
        if (isset($_GET['idOpen'])){
            $datosController = $_GET['idOpen'];

            $respuesta = Datos::openOrderModel($datosController,"orders");
            if ($respuesta == "success"){
               

            echo '<script type="text/javascript">swal({
                      title: "Order Open",
                      type: "success",

                      showCancelButton: false
                    })
                    .then((value) => {
                      if (value) {
                        window.location.href = "index.php?action=closedOrders";
                      } 
                    });</script> ';
            }
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


    #LISTADO DE TODAS LAS OPCIONES PARA TRAILERS
    #------------------------------------
    public function exportaOpciones($tabla){
        $respuesta = Datos::listaTablaModel($tabla);
        $data= array();
        foreach ($respuesta as $row => $item){
            $data[] = ["id" => $item["id"], "codigo" => $item["codigo"], "descEnglish" => $item["descEnglish"], "descEspanol" => $item["descEspanol"] , "precio" => $item["precio"], "horas" => $item["horas"]];

           
            }
            $colnames = array(
            'id' => "ID",
            'codigo' => "Code",
            'descEnglish' => "English",
            'descEspanol' => "Espanol",
            'precio' => "Price",
            'horas' => "Hours"
          );

          function map_colnames($input)
          {
            global $colnames;
            return isset($colnames[$input]) ? $colnames[$input] : $input;
          }

          function cleanData(&$str)
          {
            if($str == 't') $str = 'TRUE';
            if($str == 'f') $str = 'FALSE';
            if(preg_match("/^0/", $str) || preg_match("/^\+?\d{8,}$/", $str) || preg_match("/^\d{4}.\d{1,2}.\d{1,2}/", $str)) {
              $str = "'$str";
            }
            if(strstr($str, '"')) $str = '"' . str_replace('"', '""', $str) . '"';
          }

          // filename for download
          $filename = "website_data_" . date('Ymd') . ".csv";

          header("Content-Disposition: attachment; filename=\"$filename\"");
          header("Content-Type: text/csv");

          $out = fopen("php://output", 'w');

          $flag = false;
          foreach($data as $row) {
            if(!$flag) {
              // display field/column names as first row
              $firstline = array_map(__NAMESPACE__ . '\map_colnames', array_keys($row));
              fputcsv($out, $firstline, ',', '"');
              $flag = true;
            }
            array_walk($row, __NAMESPACE__ . '\cleanData');
            fputcsv($out, array_values($row), ',', '"');
          }

          fclose($out);
          exit;

        
    }







    #LISTADO DE TODOS LOS EMPLEADOS
    #------------------------------------
    public function listaEmpleadosController(){

        $respuesta = Datos::listaEmpleadosModel("usuarios");

        foreach ($respuesta as $row => $item){
            if ($item["rol"] == 0) $tipoAcceso = "Administrator";
            if ($item["rol"] == 1 ) $tipoAcceso = "Order Admin";
            if ($item["rol"] == 2 ) $tipoAcceso = "Engineer";
            if ($item["rol"] == 3 ) $tipoAcceso = "Accountant";
        echo'<tr>
                <td>'.$item["nombre"].'</td>
                <td>'.$item["fecha"].'<br><strong style="font-size: 10px;">'.$item["ubicacion"].'</strong></td>
                <td>'.$tipoAcceso.'</td>
                <td>'.$item["email"].'</td>
                <td>'.$item["celular"].'</td>
                <td>
                    <a href="index.php?action=editEmpleados&idEditar='.$item["id"].'"><button class="btn btn-warning">Edit</button></a>
                    <a href="views/modules/accesos.php?usuario='.$item["nombre"].'"><button class="btn btn-info">Log</button></a>
                </td>
                <td>
                    <a href="index.php?action=empleados&idBorrar='.$item["id"].'" onclick="return Confirmation()"><button class="btn btn-danger">Delete</button></a>
                </td>
            </tr>';
        }

    }


    #LISTADO DE ORDENES MODIFICADAS EN EL ULTIMO MES
    #------------------------------------
    public function ordenesCambiadasController(){

        $respuesta = Datos::ordenesCambiadasModel("cambios");

        foreach ($respuesta as $row => $item){
        echo'<tr>
                <td>'.$item["orderNo"].'</td>
                <td>'.$item["usuario"].'</td>
                <td>'.$item["changer"].'</td>
                <td>'.$item["fecha"].'</td>
                <td>'.$item["notes"].'</td>
                <td class="ancho100">
                    <a href="index.php?action=detalleOrdenCambiada&orden='.$item["idCambio"].'"><button class="btn btn-warning">details</button></a>
                </td>
                
            </tr>';
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


#   ----------------------------------------------------------------------------------------
#   Notificacion por email de cambio de ordenes
#   ----------------------------------------------------------------------------------------
/*
    public function notificarAuthor($name, $email, $author,$authorEmail){
        

            

            $toemails = array();

            $toemails[] = array(
                            'email' => 'rickyurbina@gmail.com', // email a quien vas a informar
                            'name' =>  'Sistema'// Su nombre
                        );

            $name = 'Jason';
            $email = 'jason@durahaul.com';
            $author = 'Ricardo Urbina';
            $authorEmail = 'rickyurbina@gmail.com';
            $subject = 'Modificacion de Orden';
            $message = '';


            // Form Processing Messages
            $message_success = 'We have <strong>successfully</strong> received your Message and will get Back to you as soon as possible.';

            // Add this only if you use reCaptcha with your Contact Forms
            $recaptcha_secret = ''; // Your reCaptcha Secret

            $mail = new PHPMailer();

            $mail->SetFrom( $email , $name );
            $mail->AddReplyTo( $email , $name );
            foreach( $toemails as $toemail ) {
                $mail->AddAddress( $toemail['email'] , $toemail['name'] );
            }

            $mail->Subject = $subject;

            $referrer = $_SERVER['HTTP_REFERER'] ? '<br><br><br>This Form was submitted from: ' . $_SERVER['HTTP_REFERER'] : '';

            $body = "$name $email $author $authorEmail $message $referrer";

            $mail->MsgHTML( $body );
            $sendEmail = $mail->Send();

            if( $sendEmail == true ):
                echo '<script>console.log("{ "alert": "success", "message": "' . $message_success . '" });</script>';
            else:
                echo '<script>console.log("{ "alert": "error", "message": "Email <strong>could not</strong> be sent due to some Unexpected Error. Please Try Again later.<br /><br /><strong>Reason:</strong><br />' . $mail->ErrorInfo .'" });</script>';
            endif;


    }
*/



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
                                    "author" => $_POST["author"],
                                    "inventory" => $_POST['inventory'],
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
                //echo '<script type="text/javascript">alert("'.$mensaje.'"); window.open("extensions/tcpdf/pdf/orden.php?codigo='.$_POST["tbd"].'", "Imprimir Orden","toolbar=no,location=0,directories=no, status=0,menubar=0,scrollbars=0,resizable=0,width=1024,height=800,top=0,left=0" )</script>';

                echo '<script type="text/javascript">swal({
                                                      title: "Order Registered",
                                                      text: "Working on order sheet!",
                                                      showCancelButton: false
                                                    })
                                                    .then((print) => {
                                                      if (print) {
                                                        window.open("extensions/tcpdf/pdf/orden.php?codigo='.$_POST["tbd"].'", "Print Order","toolbar=no,location=0,directories=no, status=0,menubar=0,scrollbars=0,resizable=0,width=1024,height=800,top=0,left=0" )
                                                      } 
                                                    }); 
                     </script>';
            }
            else{
                 $mensaje = "Error al registrar";
                echo '<script type="text/javascript">alert("'.$mensaje.'");</script>';

            }

        } // if

    }



#ACTUALIZACION DE ORDENES DE TRAILERS
    #------------------------------------
    public function actualizaOrdenes($oldValues,$order,$author,$authorEmail,$myName,$myEmail){

        // $resultado = self::notificarAuthor($myName, $myEmail, $author,$authorEmail);
        
        //notificarAuthor($myName, $myEmail, $author,$authorEmail);

       // echo '<script>console.log("'.$author.$authorEmail.$myName.$myEmail.'");</script>';

        date_default_timezone_set("America/Chihuahua");
        date_default_timezone_get();
        $cambios=0;

        // recibo los datos antiguos en $oldValues para compararlos, saber cuales cambiaron y grabarlos en el log de cambios
        $oldSpecs = json_decode($oldValues["trailerSpecs"], true);
        $oldOps = json_decode($oldValues["options"], true);
        
        $old = array(); //creamos un array
        $new = new stdClass();

        if(isset($_POST["actualiza"])){

            // ------------------------------------   checa cambios --------------------------------------------------
            if ($oldSpecs["Modelos"] !=  $_POST["Modelos"]){
                $new-> Modelos = $_POST["Modelos"]; 
                $old += ["Modelos" => $oldSpecs["Modelos"]]; 
                $cambios+=1;
            }
            if ($oldSpecs["tLength"] !=  $_POST["tLength"])     {$new-> tLength = $_POST["tLength"]; $old += ["tLength" => $oldSpecs["tLength"]]; $cambios+=1;}
            if ($oldSpecs["tWidth"] !=  $_POST["tWidth"])       {$new-> tWidth = $_POST["tWidth"]; $old += ["tWidth" => $oldSpecs["tWidth"]]; $cambios+=1;}
            if ($oldSpecs["tAxles"] !=  $_POST["tAxles"])       {$new-> tAxles = $_POST["tAxles"]; $old += ["tAxles" => $oldSpecs["tAxles"]]; $cambios+=1;}
            if ($oldSpecs["tSides"] !=  $_POST["tSides"])       {$new-> tSides = $_POST["Modelos"]; $old += ["tSides" => $oldSpecs["tSides"]]; $cambios+=1;}
            if ($oldSpecs["tTop"] !=  $_POST["tTop"])           {$new-> tTop = $_POST["tTop"]; $old += ["tTop" => $oldSpecs["tTop"]]; $cambios+=1;}
            if ($oldSpecs["tRearGate"] !=  $_POST["tRearGate"]) {$new-> tRearGate = $_POST["tRearGate"]; $old += ["tRearGate" => $oldSpecs["tRearGate"]]; $cambios+=1;}
            if ($oldSpecs["tCompartments"] !=  $_POST["tCompartments"]) {$new-> tCompartments = $_POST["tCompartments"]; $old += ["tCompartments" => $oldSpecs["tCompartments"]]; $cambios+=1;}
            if ($oldSpecs["tEscapeGate"] !=  $_POST["tEscapeGate"]) {$new-> tEscapeGate = $_POST["tEscapeGate"]; $old += ["tEscapeGate" => $oldSpecs["tEscapeGate"]]; $cambios+=1;}
            if ($oldSpecs["horasMdl"] !=  $_POST["horasMdl"])   {$new-> horasMdl = $_POST["horasMdl"]; $old += ["horasMdl" => $oldSpecs["horasMdl"]]; $cambios+=1;}
            if ($oldSpecs["precioMdl"] !=  $_POST["precioMdl"]) {$new-> precioMdl = $_POST["precioMdl"]; $old += ["precioMdl" => $oldSpecs["precioMdl"]]; $cambios+=1;}
            if ($oldSpecs["tToolBox"] !=  $_POST["tToolBox"])   {$new-> tToolBox = $_POST["tToolBox"]; $old += ["tToolBox" => $oldSpecs["tToolBox"]]; $cambios+=1;}
            if ($oldSpecs["tSaddleRack"] !=  $_POST["tSaddleRack"]) {$new-> tSaddleRack = $_POST["tSaddleRack"]; $old += ["tSaddleRack" => $oldSpecs["tSaddleRack"]]; $cambios+=1;}
            if ($oldSpecs["tBlanketBars"] !=  $_POST["tBlanketBars"]) {$new-> tBlanketBars = $_POST["tBlanketBars"]; $old += ["tBlanketBars" => $oldSpecs["tBlanketBars"]]; $cambios+=1;}
            if ($oldSpecs["tFloorType"] !=  $_POST["tFloorType"]) {$new-> tFloorType = $_POST["tFloorType"]; $old += ["tFloorType" => $oldSpecs["tFloorType"]]; $cambios+=1;}
            if ($oldSpecs["tFloorSpacing"] !=  $_POST["tFloorSpacing"]) {$new-> tFloorSpacing = $_POST["tFloorSpacing"]; $old += ["tFloorSpacing" => $oldSpecs["tFloorSpacing"]]; $cambios+=1;}
            if ($oldSpecs["tRollers"] !=  $_POST["tRollers"]) {$new-> tRollers = $_POST["tRollers"]; $old += ["tRollers" => $oldSpecs["tRollers"]]; $cambios+=1;}
            if ($oldSpecs["tHinch"] !=  $_POST["tHinch"]) {$new-> tHinch = $_POST["tHinch"]; $old += ["tHinch" => $oldSpecs["tHinch"]]; $cambios+=1;}
            if ($oldSpecs["tHSLength"] !=  $_POST["tHSLength"]) {$new-> tHSLength = $_POST["tHSLength"]; $old += ["tHSLength" => $oldSpecs["tHSLength"]]; $cambios+=1;}
            if ($oldSpecs["tMatting"] !=  $_POST["tMatting"]) {$new-> tMatting = $_POST["tMatting"]; $old += ["tMatting" => $oldSpecs["tMatting"]]; $cambios+=1;}
            if ($oldSpecs["tCalf"] !=  $_POST["tCalf"]) {$new-> tCalf = $_POST["tCalf"]; $old += ["tCalf" => $oldSpecs["tCalf"]]; $cambios+=1;}
            if ($oldSpecs["tRod"] !=  $_POST["tRod"]) {$new-> tRod = $_POST["tRod"]; $old += ["tRod" => $oldSpecs["tRod"]]; $cambios+=1;}
            if ($oldSpecs["tVents"] !=  $_POST["tVents"]) {$new-> tVents = $_POST["tVents"]; $old += ["tVents" => $oldSpecs["tVents"]]; $cambios+=1;}
            if ($oldSpecs["tRhino"] !=  $_POST["tRhino"]) {$new-> tRhino = $_POST["tRhino"]; $old += ["tRhino" => $oldSpecs["tRhino"]]; $cambios+=1;}
            if ($oldSpecs["tSideRails"] !=  $_POST["tSideRails"]) {$new-> tSideRails = $_POST["tSideRails"]; $old += ["tSideRails" => $oldSpecs["tSideRails"]]; $cambios+=1;}
            if ($oldSpecs["tSaddleBox"] !=  $_POST["tSaddleBox"]) {$new-> tSaddleBox = $_POST["tSaddleBox"]; $old += ["tSaddleBox" => $oldSpecs["tSaddleBox"]]; $cambios+=1;}
            if ($oldSpecs["tTires"] !=  $_POST["tTires"]) {$new-> tTires = $_POST["tTires"]; $old += ["tTires" => $oldSpecs["tTires"]]; $cambios+=1;}
            if ($oldSpecs["tExtraTire"] !=  $_POST["tExtraTire"]) {$new-> tExtraTire = $_POST["tExtraTire"]; $old += ["tExtraTire" => $oldSpecs["tExtraTire"]]; $cambios+=1;}
            if ($oldSpecs["tColor"] !=  $_POST["tColor"]) {$new-> tColor = $_POST["tColor"]; $old += ["tColor" => $oldSpecs["tColor"]]; $cambios+=1;}
            if ($oldSpecs["tFrontPlug"] !=  $_POST["tFrontPlug"]) {$new-> tFrontPlug = $_POST["tFrontPlug"]; $old += ["tFrontPlug" => $oldSpecs["tFrontPlug"]]; $cambios+=1;}
            if ($oldSpecs["tRearPlug"] !=  $_POST["tRearPlug"]) {$new-> tRearPlug = $_POST["tRearPlug"]; $old += ["tRearPlug" => $oldSpecs["tRearPlug"]]; $cambios+=1;}
            if ($oldSpecs["tTireCover"] !=  $_POST["tTireCover"]) {$new-> tTireCover = $_POST["tTireCover"]; $old += ["tTireCover" => $oldSpecs["tTireCover"]]; $cambios+=1;}
            if ($oldSpecs["tTarp"] !=  $_POST["tTarp"]) {$new-> tTarp = $_POST["tTarp"]; $old += ["tTarp" => $oldSpecs["tTarp"]]; $cambios+=1;}
            if ($oldSpecs["totWeight"] !=  $_POST["totWeight"]) {$new-> totWeight = $_POST["totWeight"]; $old += ["totWeight" => $oldSpecs["totWeight"]]; $cambios+=1;}
            if ($oldSpecs["floorFt"] !=  $_POST["floorFt"]) {$new-> floorFt = $_POST["floorFt"]; $old += ["floorFt" => $oldSpecs["floorFt"]]; $cambios+=1;}



            if ($oldValues["dueDate"]       != $_POST["dueDate"]) {$new-> dueDate = $_POST["dueDate"]; $old += ["dueDate" => $oldValues["dueDate"]]; $cambios+=1;}
           // if ($oldValues["orderDate"] != date('Y-m-d H:i:s')) {$new-> Modelos = $_POST["Modelos"]; $old += ["Modelos" => $oldSpecs["Modelos"]]; $cambios+=1;}
            if ($oldValues["notes"]         !=   $_POST["notes"]) {$new-> notes = $_POST["notes"]; $old += ["notes" => $oldValues["notes"]]; $cambios+=1;} 
            if ($oldValues["subTotal"]      != $_POST["subTotal"]) {$new-> subTotal = $_POST["subTotal"];$old += ["subTotal" => $oldValues['subTotal']];$cambios+=1;}
            if ($oldValues["discount"]      != $_POST["descuento"]) {$new-> descuento = $_POST["descuento"]; $old += ["descuento" => $oldValues["discount"]]; $cambios+=1;}
            if ($oldValues["totHrs"]        != $_POST["TotalHoras"]) {$new-> TotalHoras = $_POST["TotalHoras"]; $old += ["TotalHoras" => $oldValues["totHrs"]]; $cambios+=1;}
            if ($oldValues["totPrice"]      != $_POST["Total"]) {$new-> Total = $_POST["Total"]; $old += ["Total" => $oldValues["totPrice"]]; $cambios+=1;}
            if ($oldValues["totOpciones"]   != $_POST["TotalOpciones"]) {$new-> TotalOpciones = $_POST["TotalOpciones"]; $old += ["TotalOpciones" => $oldValues["totOpciones"]]; $cambios+=1;}



            if ($oldOps["codigo1"] != $_POST["codigo1"]) {$new-> codigo1 = $_POST["codigo1"]; $old += ["codigo1" => $oldOps["codigo1"]]; $cambios+=1;}
            if ($oldOps["codigo2"] != $_POST["codigo2"]) {$new-> codigo2 = $_POST["codigo2"]; $old += ["codigo2" => $oldOps["codigo2"]]; $cambios+=1;}
            if ($oldOps["codigo3"] != $_POST["codigo3"]) {$new-> codigo3 = $_POST["codigo3"]; $old += ["codigo3" => $oldOps["codigo3"]]; $cambios+=1;}
            if ($oldOps["codigo4"] != $_POST["codigo4"]) {$new-> codigo4 = $_POST["codigo4"]; $old += ["codigo4" => $oldOps["codigo4"]]; $cambios+=1;}
            if ($oldOps["codigo5"] != $_POST["codigo5"]) {$new-> codigo5 = $_POST["codigo5"]; $old += ["codigo5" => $oldOps["codigo5"]]; $cambios+=1;}
            if ($oldOps["codigo6"] != $_POST["codigo6"]) {$new-> codigo6 = $_POST["codigo6"]; $old += ["codigo6" => $oldOps["codigo6"]]; $cambios+=1;}
            if ($oldOps["codigo7"] != $_POST["codigo7"]) {$new-> codigo7 = $_POST["codigo7"]; $old += ["codigo7" => $oldOps["codigo7"]]; $cambios+=1;}
            if ($oldOps["codigo8"] != $_POST["codigo8"]) {$new-> codigo8 = $_POST["codigo8"]; $old += ["codigo8" => $oldOps["codigo8"]]; $cambios+=1;}
            if ($oldOps["codigo9"] != $_POST["codigo9"]) {$new-> codigo9 = $_POST["codigo9"]; $old += ["codigo9" => $oldOps["codigo9"]]; $cambios+=1;}
            if ($oldOps["codigo10"] != $_POST["codigo10"]) {$new-> codigo10 = $_POST["codigo10"]; $old += ["codigo10" => $oldOps["codigo10"]]; $cambios+=1;}
            if ($oldOps["codigo11"] != $_POST["codigo11"]) {$new-> codigo11 = $_POST["codigo11"]; $old += ["codigo11" => $oldOps["codigo11"]]; $cambios+=1;}
            if ($oldOps["codigo12"] != $_POST["codigo12"]) {$new-> codigo12 = $_POST["codigo12"]; $old += ["codigo12" => $oldOps["codigo12"]]; $cambios+=1;}
            if ($oldOps["codigo13"] != $_POST["codigo13"]) {$new-> codigo13 = $_POST["codigo13"]; $old += ["codigo13" => $oldOps["codigo13"]]; $cambios+=1;}
            if ($oldOps["codigo14"] != $_POST["codigo14"]) {$new-> codigo14 = $_POST["codigo14"]; $old += ["codigo14" => $oldOps["codigo14"]]; $cambios+=1;}
            if ($oldOps["codigo15"] != $_POST["codigo15"]) {$new-> codigo15 = $_POST["codigo15"]; $old += ["codigo15" => $oldOps["codigo15"]]; $cambios+=1;}
            if ($oldOps["codigo16"] != $_POST["codigo16"]) {$new-> codigo16 = $_POST["codigo16"]; $old += ["codigo16" => $oldOps["codigo16"]]; $cambios+=1;}

            $oldData = json_encode($old);
            $newData = json_encode($new);

            if ($cambios>0){
                $datosLog = array(  
                    "orderNo"=> $_POST["tbd"],
                    "fecha" => date('Y-m-d H:i:s'), 
                    "usuario" => $_POST["author"], 
                    "changer"=> $_SESSION["nombre"], 
                    "oldData" => $oldData,
                    "newData" => $newData, 
                    "notes" => $_POST["changeNotes"]
                );

                $respuestaLog = Datos::actualizaCambios($datosLog, "cambios");

                echo "<script>console.log($respuestaLog);</script>";
            }


            // ------------------------------------   OPTIONS --------------------------------------------------
            //$specs = new stdClass();
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


            $datosController = array("order"=> $_POST["tbd"],
                                    "trailerNo" => $_POST["trailerNo"],
                                    "trailerVin" => $_POST["trailerVin"],
                                    "dueDate" => $_POST["dueDate"],
                                    "inventory" => $_POST["inventory"],
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
                echo '<script type="text/javascript">swal({
                  title: "Order Updated",
                  type: "success",

                  showCancelButton: false
                })
                .then((value) => {
                  if (value) {
                    window.location.href = "controllers/sendemail.php?order='.$order.'&name='.$myName.'&email='.$myEmail.'&author='.$author.'&authorEmail='.$authorEmail.'";
                  } 
                });</script> ';

            }

        } // if

    }


} // class controller
