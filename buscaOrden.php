<?php
$order = $_GET['order'];
require_once "controllers/controller.php";
require_once "models/crud.php";
$precio = new controller(); 
$precio->buscaOrden("orders",$order);

?>
