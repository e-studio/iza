<?php	
// Procesamos en envio desde el input via POST
$palabraclave = strval($_POST['busqueda']);
$busqueda = "{$palabraclave}%";
// Realizamos la conexión MySQLi
$conexion =new mysqli('localhost', 'root', '' , 'iza');
// Preparamos la consulta para realizar la busqueda del criterio
$consultaDB = $conexion->prepare("SELECT * FROM trailers WHERE codigo LIKE ?");
$consultaDB->bind_param("s",$busqueda);			
$consultaDB->execute();
$resultado = $consultaDB->get_result();
// Condicional para tratar a los resultados encontrados
if ($resultado->num_rows > 0) {
	while($registros = $resultado->fetch_assoc()) {
	// Llamando a la columna Pais_Nombre
	$ResultadoPais[] = $registros["codigo"];
	}
	echo json_encode($ResultadoPais);
	}
// Cerramos la conexión con el servidor
$consultaDB->close();
?>

