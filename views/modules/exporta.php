<?php
/*
Este codigo genera y descarga un archivo .xls a partir de una consulta a una base de datos MySql

*/

$conexion = mysqli_connect ("localhost", "root", "");
mysqli_select_db ($conexion, "iza");
$sql = "SELECT * FROM opciones";
$resultado = mysqli_query ($conexion, $sql) or die (mysql_error ());
$libros = array();
while( $rows = mysqli_fetch_assoc($resultado) ) {
 $libros[] = $rows;
}
mysqli_close($conexion);



 
 $filename = "opciones.xls";
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

?>




 


