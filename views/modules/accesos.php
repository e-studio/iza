<?php
/*
Este codigo genera y descarga un archivo .xls a partir de una consulta a una base de datos MySql

*/

//$conexion = mysqli_connect ("localhost", "root", ""); Local
if(isset($_GET["usuario"])){

    $usuario = $_GET["usuario"];

    $conexion = mysqli_connect ("50.62.209.108:3306", "rick", "B4laj@06");
    mysqli_select_db ($conexion, "ph18408318088_"); // iza
    $sql = "SELECT * FROM logacceso WHERE usuario= '".$usuario."' ORDER BY fecha DESC";
    //$sql = "SELECT * FROM opciones";
    $resultado = mysqli_query ($conexion, $sql) or die (mysql_error ());
    $libros = array();
    while( $rows = mysqli_fetch_assoc($resultado) ) {
     $libros[] = $rows;
    }
    mysqli_close($conexion);



     
     $filename = $usuario."-accessLog.xls";
     header("Content-Type: application/vnd.ms-excel");
     header("Content-Disposition: attachment; filename=".$filename);

     $mostrar_columnas = false;

     foreach($libros as $libro) {
     if(!$mostrar_columnas) {
     echo implode("\t", array_keys($libro)) . "\n";
     $mostrar_columnas = true;
     }
     echo implode("\t", array_values($libro)) . "\n";
     }

     exit;
}

?>




 


